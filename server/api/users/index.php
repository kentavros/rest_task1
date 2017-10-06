<?php
include '../../app/lib/function.php';
class Users extends RestServer
{
    private $model;

    /**
     * create obj - model
     * parent run method
     * Cars constructor.
     */
    public function __construct()
    {
        $this->model = new ModelUsers();
        $this->run();
    }

    public function getUsers($data)
    {
        ///$result = 5;
//        $result = $this->model->getCars($data);
//        $result = $this->encodedData($result);
        
    }

    public function postUsers($data)
    {
//        //TODO: add data to db
        //        return ' The Post method postCars '.var_dump($data);
        // echo 'POST user'.var_dump($data);
        $foo = $this->model->addUser($data);
        return $foo;
    }

    public function putUsers($data)
    {
//        return var_dump($data).'PUTeprst ';
    }

    public function deleteUsers($data)
    {
//        //todo: if empty data - return msg - input data
//        return 'Deleted ..'.var_dump($data);
    }
}
$cars = new Users();
