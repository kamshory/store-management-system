<?php
namespace Pico;
class Router
{

    /**
     * URI
     *
     * @var string $uri
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
     * @var string $module
     */
    public $module = null;

    public $params = array();
    public $arguments = array();

    public function __construct($uri = null, $module = null)
    {
        $this->uri = $uri;
        $this->module = $module;
    }

    public function getParams($name)
    {
        if($name != null && isset($this->params[$name]))
        {
            return trim($this->params[$name]);
        }
        return null;
    }
    public function escapeSql($value)
    {
        if($value == null)
        {
            return null;
        }
        return addslashes($value);
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
        $ch1 = isset($map[$path]) ? $map[$path] : null;
        if($ch1 === null)
        {
            $ch1 = isset($map[$path2]) ? $map[$path2] : null;
        }
        if($ch1 === null)
        {
            $index = $this->getIndex($map, $path2);
            if($index !== null)
            {
                $ch1 = $map[$index];
            }
        }

        if($ch1 === null)
        {
            $parsed = $this->parseRegex($map, $path2);
            if($parsed != null)
            {
                $ch1 = $parsed['module'];
                $this->params = $parsed['params'];
                $this->arguments = $parsed['arguments'];
            }
            
        }

        $this->uri = $path;
        $this->module = $ch1;
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
        // The url part
        //$url     = "/node/123/hello/strText";
        // The pattern part
        //$pattern = "/node/:id/hello/:test";

        // Replace all variables with * using regex
        $buffer = preg_replace("(:[A-Za-z_]+)", "*", $pattern);
        // Explode to get strings at *
        // In this case ['/node/','/hello/']
        $buffer = explode("*", $buffer);
        array_pop($buffer);
        // Control variables for loop execution
        $isMatch = true;
        $capture  = [];
        for ($i=0; $i < sizeof($buffer); $i++) { 
            $slug = $buffer[$i];
            $real_slug = substr($url, 0 , strlen($slug));
            if (!strcmp($slug, $real_slug)) {
                $url = substr($url, strlen($slug));
                $temp = explode("/", $url)[0];
                $capture[sizeof($capture)] = $temp;
                $url = substr($url,strlen($temp));
            }else {
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

    public function getIndex($map, $path2)
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