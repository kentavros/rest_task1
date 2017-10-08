<?php
include '../../app/lib/function.php';
class Cars extends RestServer
{
    private $model;
    private $response;

    /**
     * create obj - model & response
     * parent run method
     * Cars constructor.
     */
    public function __construct()
    {
        $this->model = new ModelCars();
        $this->response = new Response();
        $this->run();
    }

    public function getCars($data)
    {
        try
        {
            $result = $this->model->getCars($data);
            $result = $this->encodedData($result);
            return $this->response->serverSuccess(200, $result);
        }
        catch (PDOException $exception)
        {
            return $this->response->serverError(500, $exception->getMessage());
        }
    }

//    public function postCars($data)
//    {
//
//    }
//
//    public function putCars($data)
//    {
//
//    }
//
//    public function deleteCars($data)
//    {
//
//    }
}
$cars = new Cars();
