<?php
/**
 * Created by PhpStorm.
 * User: 黎经维
 * Date: 2016/8/12
 * Time: 21:41
 */

namespace allowing\web;


class Request implements RequestInterface
{

    public function getGet($name = '', $defaultValue = null)
    {
        if ('' === $name) {
            return $_GET;
        }

        return isset($_GET[$name]) ? $_GET[$name] : $defaultValue;
    }

    public function getPost($name = '', $defaultValue = null)
    {

        if ('' === $name) {
            return $_POST;
        }

        return isset($_POST[$name]) ? $_POST[$name] : $defaultValue;
    }

    public function getServer($name = '', $defaultValue = null)
    {

        if ('' === $name) {
            return $_SERVER;
        }

        return isset($_SERVER[$name]) ? $_SERVER[$name] : $defaultValue;
    }

    public function getCookie($name = '', $defaultValue = null)
    {

        if ('' === $name) {
            return $_COOKIE;
        }

        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : $defaultValue;
    }

    public function getPathInfo()
    {
        return $this->getServer('PATH_INFO');
    }

    public function getControllerId()
    {
        return explode('/', trim($this->getPathInfo()))[0];
    }

    public function getActionId()
    {
        return explode('/', trim($this->getPathInfo()))[1];
    }
}