<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/12
 * Time: 21:21
 */

namespace allowing\web;


use allowing\core\DiInterface;

interface ApplicationInterface
{
    public function __construct(
        RequestInterface $request,
        ResponseInterface $response,
        DiInterface $di
    );

    public function setControllerNamespace($controllerNamespace);

    public function getControllerNamespace();

    public function run();

    public function getControllerClass();

    public function getRequest();

    public function getResponse();

    public function getDi();
}