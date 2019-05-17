<?php

class App
{
    protected $route = [];
    protected $responseStatus = '200 OK!';
    protected $responseContentType = 'text/html';
    protected $responseBody = 'Hellow World!';

    public function __construct()
    {
    }

    public function addRoute($routePath, $routeCallback)
    {
        //复制当前闭包对象，绑定指定的$this对象和类作用域
        $this->route[$routePath] = $routeCallback->bindTo($this, __CLASS__);
    }

    public function dispatch($currentPath)
    {
        foreach ($this->route as $routePath => $callback) {
            if ($routePath === $routePath) {
                $callback();
            }
        }
        header('HTTP/1.1', $this->responseStatus);
        header('Content-type:'.$this->responseContentType);
        header('Content-length:'.mb_strlen($this->responseBody));
        echo $this->responseBody;
    }
}
$json = json_encode(['name' => 'josh', 'job' => 'phper']);
$app = new App();
$app->addRoute('/users/josh', function () use ($json) {
    $this->responseContentType = 'application/json;charst=utf8';
    $this->responseBody = $json;
});
$app->dispatch('/users/josh');
var_dump($app);
