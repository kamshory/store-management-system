<?php
namespace Pico\Api;
class PicoRestResponse{
    public function sendOutput($body, $contentType = null, $headers = null)
    {
        $contentType = $this->getDefaultContentType($contentType);
        $contentLength = $body == null ? 0 : strlen($body);
        $headers = $this->getDefaultHeaders($headers, $contentType, $contentLength);
        $this->sendHeaders($headers);
        $this->sendBody($body);
    }
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
    public function sendBody($body)
    {
        if($body != null)
        {
            echo $body;
        }
    }
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