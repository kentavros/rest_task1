<?php
class RestServer
{
    protected $reqMethod;
    protected $url;

    public function run()
    {
       // $this->url = list($s, $server, $api, $dir, $index, $class, $data) = explode("/", $_SERVER['REQUEST_URI'], 7);
      $this->url = list($s, $user, $REST, $server, $api, $class, $data) = explode("/", $_SERVER['REQUEST_URI'], 7);

        //var_dump($this->url);
        $this->reqMethod = $_SERVER['REQUEST_METHOD'];

        switch ($this->reqMethod)
        {
            case 'GET':
                $this->setMethod('get'.ucfirst($class), explode('/', $data));
                break;
            case 'POST':
                $this->setMethod('post'.ucfirst($class));
                break;
            case 'PUT':
                $this->setMethod('put'.ucfirst($class), explode('/', $data));
                break;
        }
    }

    public function setMethod($classMethod, $param=false)
    {
        if(method_exists($this, $classMethod))
        {
            echo $this->$classMethod($param);
        }
        else
        {
            echo 'ERROR!';
        }
    }
}
