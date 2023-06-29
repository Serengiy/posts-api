<?php

namespace App\RMVC\Route;

class RouteDispatcher
{
    private string $requestUri = '/';
    private array $paramMap = [];
    private array $params = [];
    private array $paramRequestMap = [];
    private RouteConfiguration $routeConfiguration;

    /**
     * @param RouteConfiguration $routeConfiguration
     */
    public function __construct(RouteConfiguration $routeConfiguration)
    {
        $this->routeConfiguration = $routeConfiguration;
    }

    public function process()
    {
//        $this->setParams();
//        var_dump($this->params);

        $this->saveRequestUri();
        $this->setParamMap();
        $this->makeRegexRequest();
        $this->run();
    }

    private function saveRequestUri()
    {
        if ($_SERVER['REQUEST_URI'] !=='/'){
            $this->requestUri = $this->clean($_SERVER['REQUEST_URI']);
            $this->routeConfiguration->route = $this->clean($this->routeConfiguration->route);
        }
    }

    private function clean($str)
    {
      return preg_replace('/(^\/)|(\/$)/', '', $str);
    }

    private function setParamMap()
    {
        $routeArray = explode('/', $this->routeConfiguration->route);
        foreach ($routeArray as $paramKey =>$param){
            if(preg_match('/{.*}/', $param)){
                $this->paramMap[$paramKey] = preg_replace('/(^{)|(}$)/', '', $param);
            }
        }
    }
    private function makeRegexRequest()
    {
        $requestUriArray = explode('/', $this->requestUri);

        foreach ($this->paramMap as $paramKey =>$param){
            if(!isset($requestUriArray[$paramKey])){
                return;
            }
            $this->paramRequestMap[$param]=$requestUriArray[$paramKey];
            $requestUriArray[$paramKey] = '{.*}';
        }
        $this->requestUri = implode('/', $requestUriArray);
        $this->prepareRegex();
    }

    private function prepareRegex()
    {
        $this->requestUri = str_replace('/','\/', $this->requestUri);
    }

    private function run()
    {
        $URI = $this->requestUri;
        $this->requestUri = explode('?', $URI)[0];
        if(preg_match("/$this->requestUri/", $this->routeConfiguration->route)){
            $this->render();
        }
    }

    private function render()
    {
        $ClassName = $this->routeConfiguration->controller;
        $action = $this->routeConfiguration->action;
        print(new $ClassName)->$action(...$this->paramRequestMap);
        die();
    }
}