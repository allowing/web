<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/12
 * Time: 21:20
 */

namespace allowing\web;


interface RequestInterface
{
    public function getGet($name = '', $defaultValue = null);

    public function getPost($name = '', $defaultValue = null);

    public function getServer($name = '', $defaultValue = null);

    public function getCookie($name = '', $defaultValue = null);

    public function getPathInfo();

    public function getControllerId();

    public function getActionId();
}
