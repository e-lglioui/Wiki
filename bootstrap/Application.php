<?php
namespace Core;

class Application
{
    use Router, UrlEngine, View;

    /**
     * @throws \Exception
     */
    public function run()
    {
        //run the match function to get the class and method
        $callable = $this->match($this->method(), $this->path());
        // var_dump($callable);
        // die();
        if (!$callable){
            throw new \Exception('Oops! you are lost', 404);
        }
        //call the class, pass the method
        //add the default namespace to the controller
        $class = "App\\Controllers\\".$callable["class"];
        if (!class_exists($class)){
            throw new \Exception('Class does not exist', 500);
        }

        $method = $callable["method"];

        if (!is_callable($class, $method)){
            throw new \Exception("$method is not a valid method in class $callable[class]", 500);
        }
        $class = new $class();

        //run the method
        $class->$method();
        return;
    }

    private function match($method, $url)
    {
        $controller = self::$map[$method][$url]['class'];
        $methode = self::$map[$method][$url]['method'];

        return ["class" => $controller, 
                "method" => $methode];

    }
}