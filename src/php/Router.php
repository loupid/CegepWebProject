<?php
namespace App;

class Router
{
    /**
     * @var string
     * */
    private $viewPath;

    /**
     * @var /AltoRouter
     */
    private $router;

    public function __construct(string $viewPath){
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
    }

    public function get(string $url, string $view, ?string $name = null):self
    {
        $this->router->map('GET', $url, $view, $name);

        return $this;
    }

    public function run():self
    {
        $match = $this->router->match();
        $params = $match['params'];
        ob_start();
        require '../'.$this->viewPath . '/' . $match['target'] . '.php';
        $view = ob_get_clean();
        require '../elements/layout.php';

        return $this;
    }

    public function generate(string $routeName,array $params = [])
    {
        echo $this->router->generate($routeName, $params);
    }

}