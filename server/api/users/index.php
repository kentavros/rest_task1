<?php
include '../../app/lib/function.php';
class Users extends RestServer
{
    private $model;
    private $response;

    /**
     * create obj - model
     * run parent method
     * Cars constructor.
     */
    public function __construct()
    {
        $this->model = new ModelUsers();
        $this->response = new Response();
        $this->run();
    }

    /**
     * Check auth user - isset cookie id and hash
     * @return bool
     */
    public function getUsers()
    {
        $result = $this->model->checkUsers();
        return $result;
    }

    /**
     * Registretion - add user to DB
     * @param $data
     * @return int or bool
     */
    public function postUsers($data)
    {
            $result = $this->model->addUser($data);
            return $this->response->serverSuccess(200, $result);
    }

    /**
     * Login user - add hash to db and set cookie id and hash
     * @param $data
     * @return bool
     */
    public function putUsers($data)
    {

//        header('Access-Control-Allow-Origin: *');
//        header("HTTP/1.0 200 OK");
        $result = $this->model->loginUser($data);
        return $result;
//        return $this->response->serverSuccess(200, $result);
    }

    /**
     * Logout user
     * @return bool
     */
    public function deleteUsers($data)
    {

        //$result = $this->model->logoutUser();
        $data = 15;
        return $data;
    }
}
$cars = new Users();
