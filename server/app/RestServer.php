<?php
class RestServer
{
    protected $reqMethod;
    protected $url;
    protected $class;
    protected $data;
    protected $encode;

    protected function run()
    {    
        $this->url = $_SERVER['REQUEST_URI'];
        $this->reqMethod = $_SERVER['REQUEST_METHOD'];
        switch ($this->reqMethod)
        {
            case 'GET':
                $this->setMethod('get'.ucfirst($this->getClass()), $this->getData());
                break;
            case 'POST':
                $this->setMethod('post'.ucfirst($this->getClass()), $this->getData());
                break;
            case 'PUT':
                $this->setMethod('put'.ucfirst($this->getClass()), $this->getData());
                break;
            case 'DELETE':
                $this->setMethod('delete'.ucfirst($this->getClass()), $this->getData());
                break;
        }
    }

    protected function setMethod($classMethod, $data=false)
    {
        if(method_exists($this, $classMethod))
        {
            echo $this->$classMethod($data);
        }
        else
        {
            echo 'ERROR!';
        }
    }

    protected function getClass()
    {
        //Cut for /api/
        $clearUrl = explode('/api/', $this->url);
        //Get class
        $clearUrl = explode('/', $clearUrl[count($clearUrl)-1]);
        $this->class = $clearUrl[0];
        return $this->class;
    }

    protected function getData()
    {
        if (($this->reqMethod == 'GET') || ($this->reqMethod == 'DELETE'))
        {
            //Cut for /api/
            $clearUrl = explode('/api/', $this->url);
            $clearUrl = explode('/', $clearUrl[count($clearUrl) - 1], 2);
            //Get data
            $data = $clearUrl[count($clearUrl) - 1];
            //Get encode type
            preg_match('#(\.[a-z]+)#', $data, $match);
            $this->encode = $match[0];
            //Cut extension
            $data = trim($data, $this->encode);
            $data = explode('/', $data);
            if (count($data) % 2) {
                //NE4etnoe
                $id = (int)$data[count($data) - 1];
                $data = [];
                $data['id'] = $id;
            } else {
                //4etnoe
                $arrEven = [];
                $arrOdd = [];
                foreach ($data as $key => $val) {
                    if ($key % 2) {
                        $arrOdd[] = $val;
                    } else {
                        $arrEven[] = $val;
                    }
                }
                $data = array_combine($arrEven, $arrOdd);
            }
            $this->data = $data;
            return $this->data;
        }
        elseif ($this->reqMethod == 'POST') 
        {
            $this->data = $_POST;
            return $this->data;
        }
        elseif ($this->reqMethod == 'PUT')
        {
            parse_str(file_get_contents("php://input"), $putParams);
            $this->data = $putParams;
            return $this->data;
        }
    }

    protected function encodedData($data)
    {
        switch ($this->encode)
        {
            case '.json':
                return json_encode($data);
                break;
            case '.txt':
                return 'TXT';
                break;
            case '.html':
                return 'HTML';
                break;
            case '.xml':
                return 'XML';
                break;
            default:
                return json_encode($data);
        }
    }
}
