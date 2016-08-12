<?php
/**
 * Created by PhpStorm.
 * User: 黎经维
 * Date: 2016/8/12
 * Time: 22:16
 */

namespace allowing\web;


use allowing\core\DiInterface;

class Application implements ApplicationInterface
{

    private $_request;

    private $_response;

    private $_di;

    private $_controllerNamespace;

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->_request;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->_response;
    }

    /**
     * @return DiInterface
     */
    public function getDi()
    {
        return $this->_di;
    }

    public function __construct(
        RequestInterface $request,
        ResponseInterface $response,
        DiInterface $di
    ) {
        $this->_request = $request;
        $this->_response = $response;
        $this->_di = $di;
    }

    public function setControllerNamespace($controllerNamespace)
    {
        $this->_controllerNamespace = $controllerNamespace;
        return $this;
    }

    public function getControllerNamespace()
    {
        return $this->_controllerNamespace;
    }

    public function run()
    {
        // TODO: Implement run() method.
    }

    public function getControllerClass()
    {
        $controllerId = $this->getRequest()->getControllerId();
        $controllerId = preg_replace_callback('/-([a-z])/', function (array $matches) {
            return strtoupper($matches[1]);
        }, $controllerId);

        $controllerId = ucfirst($controllerId);
        return $this->getControllerNamespace() . "\\{$controllerId}Controller";
    }

    public function getActionName()
    {
        $actionId = $this->getRequest()->getActionId();
        $actionId = preg_replace_callback('/-([a-z])/', function (array $matches) {
            return strtoupper($matches[1]);
        }, $actionId);

        $actionId = ucfirst($actionId);
        return "action$actionId";
    }
}