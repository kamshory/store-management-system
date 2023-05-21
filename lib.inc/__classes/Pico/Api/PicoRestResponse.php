<?php
namespace Pico\Api;
class PicoRestResponse{

    /**
     * Send response headers and response body to client
     *
     * @param mixed $data Data to sent to client
     * @param boolean $prettify Flag to prettify JSON
     * @param array $headers Response headers
     * @return void
     */
    public function sendJSON($data, $prettify = false, $headers = null)
    {
        $body = null;
        if($data != null && (is_array($data) || is_object($data)))
        {
            if($prettify)
            {
                $body = json_encode($data, JSON_PRETTY_PRINT);
            }
            else
            {
                $body = json_encode($data);
            }
        }
        $this->sendOutput($body, 'json', $headers);
    }

    /**
     * Sned response headers and response body to client
     *
     * @param string $body Response body
     * @param string $contentType Content type
     * @param array $headers Response headers
     * @return void
     */
    public function sendOutput($body, $contentType = null, $headers = null)
    {
        $contentType = $this->getDefaultContentType($contentType);
        $contentLength = $body == null ? 0 : strlen($body);
        $headers = $this->getDefaultHeaders($headers, $contentType, $contentLength);
        $this->sendHeaders($headers);
        $this->sendBody($body);
    }

    /**
     * Send response headers
     *
     * @param array $headers Response headers
     * @return void
     */
    public function sendHeaders($headers)
    {
        if($headers != null && is_array($headers))
        {
            foreach($headers as $key=>$value)
            {
                header($key.": ".$value);
            }
        }
    }

    /**
     * Send response body
     *
     * @param string $body Response body
     * @return void
     */
    public function sendBody($body)
    {
        if($body != null)
        {
            echo $body;
        }
    }

    /**
     * Get default content type with key given
     *
     * @param string $contentType Content type
     * @return string Fixed content type
     */
    public function getDefaultContentType($contentType)
    {
        if($contentType == null)
        {
            return 'text/html';
        }
        if(stripos($contentType, 'json') !== false)
        {
            return 'application/json';
        }
        return $contentType;
    }

    /**
     * Get default response headers
     *
     * @param array $headers Response headers
     * @param string $contentType Content type
     * @param integer $contentLength Content length
     * @return array Fixed response headers
     */
    public function getDefaultHeaders($headers, $contentType, $contentLength = 0)
    {
        if($headers == null)
        {
            $headers = array();
        }
        $headers['Content-type'] = $contentType;
        if($contentLength != 0)
        {
            $headers['Content-length'] = $contentLength;
        }
        return $headers;
    }
}