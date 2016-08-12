<?php
/**
 * Created by PhpStorm.
 * User: 黎经维
 * Date: 2016/8/12
 * Time: 21:56
 */

namespace allowing\web;


class Response implements ResponseInterface
{

    private $_data;

    private $_format;

    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }

    public function getData()
    {
        return $this->_data;
    }

    public function setFormat($format)
    {
        $this->_format = $format;
        return $this;
    }

    public function getFormat()
    {
        return $this->_format;
    }

    public function send()
    {
        $data = $this->getData();
        switch ($this->getFormat()) {
            case ResponseInterface::FORMAT_HTML:
                header('Content-Type:text/html;charset=utf-8');
                echo $data;
                return;
            case ResponseInterface::FORMAT_JSON:
                header('Content-Type:application/json;charset=utf-8');
                if (is_array($data)) {
                    echo json_encode($data, JSON_UNESCAPED_UNICODE);
                    return;
                }
                echo $data;
                return;
            case ResponseInterface::FORMAT_RAW:
                header('Content-Type:text/plain;charset=utf-8');
                echo $data;
                return;
        }
    }
}