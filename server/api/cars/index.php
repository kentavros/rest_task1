<?php
include '../../app/RestServer.php';
class Cars extends RestServer
{
    public function __construct()
    {
        $this->run();
    }

    public function getCars($data = false)
    {
        //TODO: if data=false get all cars
        //TODO: if isset id - get detail cars by id
        //todo: if isset $this->encode - zaincodit v format funkciei
        $data = $this->encodedData($data);
        return '<br>Hello! '.var_dump($data);
//        return '<br>Hello! '.var_dump($this->params);

    }

    public function postCars()
    {
        //TODO: add data to db
        return ' The Post method postCars'.var_dump($this->params);
    }

    public function putCars($data = false)
    {
        return var_dump($this->params).'PUTeprst ';
    }

    public function deleteCars()
    {
        //todo: if empty data - return msg - input data
        return 'Deleted ..'.var_dump($this->params);
    }
}
$cars = new Cars();
