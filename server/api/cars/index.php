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
        //var_dump($data);
        $data = $this->encodedData($data);
        return $data;
    }

    public function postCars($data)
    {
        //TODO: add data to db
        return ' The Post method postCars '.var_dump($data);
    }

    public function putCars($data)
    {
        return var_dump($data).'PUTeprst ';
    }

    public function deleteCars($data)
    {
        //todo: if empty data - return msg - input data
        return 'Deleted ..'.var_dump($data);
    }
}
$cars = new Cars();
