<?php
include '../../app/lib/function.php';
class Users extends RestServer
{
    private $model;

    /**
     * create obj - model
     * run parent method
     * Cars constructor.
     */
    public function __construct()
    {
        $this->model = new ModelUsers();
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
        return $result;
    }

    /**
     * Login user - add hash to db and set cookie id and hash
     * @param $data
     * @return bool
     */
    public function putUsers($data)
    {
        $result = $this->model->loginUser($data);
        return $result;
    }

    public function deleteUsers()
    {
        $result = $this->model->logoutUser();
        return $result;
    }
}
$cars = new Users();
