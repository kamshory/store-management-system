<?php
namespace Pico\Router;
class PicoRouter
{
    /**
     * URI
     *
     * @var string
     */
    public $uri = null;

    /**
     * Full path
     *
     * @var string
     */
    public $full_path = null;

    /**
     * Path
     *
     * @var string
     */
    public $path = null;

    /**
     * Module
     *
     * @var string
     */
    public $module = null;

    public $params = array();
    public $arguments = array();

    public function __construct()
    {
        // Do nothing
    }

    /**
     * Get params parsed from path
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Get param value with param name given
     *
     * @param string $name Parameter name
     * @param bool $escapeSQL Escape SQL
     * @return string|null
     */
    public function getParam($name, $escapeSQL = false)
    {
        if($name != null && isset($this->params[$name]))
        {
            $value = trim($this->params[$name]);
            if($escapeSQL)
            {
                return addslashes($value);
            }
            else
            {
                return $value;
            }
        }
        return null;
    }

    public function parseUri($map, $request_uri, $php_self)
    {
        $arr = explode('?', $request_uri);
        $path_only = $arr[0];
        $this->full_path = $path_only;
        if(!isset($map) || !is_array($map))
        {
            return null;
        }
        $dir_self = dirname($php_self);
        $path = substr($path_only, strlen($dir_self));
        $this->path = $path;

        if($this->endsWith($path, "/"))
        {
            $path = substr($path, 0, strlen($path)-1);
        }
        $path2 = $path . "/";
        $module = isset($map[$path]) ? $map[$path] : null;
        if($module === null)
        {
            $module = isset($map[$path2]) ? $map[$path2] : null;
        }
        if($module === null)
        {
            $index = $this->getWildcard($map, $path2);
            if($index !== null)
            {
                $module = $map[$index];
            }
        }

        if($module === null)
        {
            $parsed = $this->parseRegex($map, $path2);
            if($parsed != null)
            {
                $module = $parsed['module'];
                $this->params = $parsed['params'];
                $this->arguments = $parsed['arguments'];
            }
            
        }

        $this->uri = $path;
        $this->module = $module;
        return $this;
    }

    public function parseRegex($map, $path2)
    {
        $map2 = array();
        $i = 0;
        foreach($map as $key=>$val)
        {
            if(stripos($key, '}') !== false)
            {
                $pattern = $this->createUriPattern($key);
                $map2[$i] = array('key'=>$key, 'value'=>$val, 'regex'=>$pattern);
                $i++;
            }
        }
        foreach($map2 as $key=>$val)
        {
            $pattern = $val['regex']['pattern'];
            $params = $val['regex']['params'];
            $parsed = $this->parsePattern($pattern, $path2);
            if($parsed != null)
            {
                return array(
                    'arguments'=>$parsed,
                    'params'=>$this->getPairs($params, $parsed),
                    'path'=>$path2,
                    'module'=>$val['value']
                );
            }
        }
        return null;
    }

    public function getPairs($keys, $values)
    {
        $result = array();
        foreach($keys as $k=>$val)
        {
            $result[$val] = isset($values[$k])?$values[$k]:null;
        }
        return $result;
    }

    public function parsePattern($pattern, $url)
    {
        $buffer = preg_replace("(:[A-Za-z_]+)", "*", $pattern);
        $buffer = explode("*", $buffer);
        array_pop($buffer);
        $isMatch = true;
        $capture  = [];
        for ($i=0; $i < sizeof($buffer); $i++) 
        { 
            $slug = $buffer[$i];
            $real_slug = substr($url, 0 , strlen($slug));
            if (!strcmp($slug, $real_slug)) 
            {
                $url = substr($url, strlen($slug));
                $temp = explode("/", $url)[0];
                $capture[sizeof($capture)] = $temp;
                $url = substr($url,strlen($temp));
            }
            else 
            {
                $isMatch = false;
            }
        }
        if($isMatch)
        {
            return $capture;
        }
        return null;
    }

    public function createUriPattern($key)
    {
        $arr = explode('}', $key);
        $params = array();
        foreach($arr as $key=>$val)
        {
            $arr2 = explode('{', $val, 2);
            if(count($arr2) == 2)
            {
                $params[] = trim($arr2[1]);
                $arr[$key] = str_replace("{", ":", $val);
            }
        }
        return array('pattern'=>implode('', $arr), 'params'=>$params);
        
    }

    public function getWildcard($map, $path2)
    {
        foreach($map as $key=>$val)
        {
            if(stripos($key, "**") !== false)
            {
                $arr = explode("**", $key);
                if(strpos($path2, $arr[0]) === 0)
                {
                    return $key;
                }
            }
        }
        return null;
    }

    public function startsWith($haystack, $needle)
    {
        $length = mb_strlen($needle);
        return mb_substr($haystack, 0, $length) === $needle;
    }

    public function endsWith($haystack, $needle)
    {
        $length = mb_strlen($needle);
        if(!$length)
        {
        return true;
        }
        
        return mb_substr($haystack, -$length) === $needle;
    }
}