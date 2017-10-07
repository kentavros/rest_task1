<?php
include '../../app/lib/function.php';
class Orders extends RestServer
{
    private $model;

    /**
     * create obj - model
     * parent run method
     * Cars constructor.
     */
    public function __construct()
    {
        $this->model = new ModelOrders();
        $this->run();
    }

    public function getOrders($data)
    {
        $result = $this->model->getOrders($data);
        $result = $this->encodedData($result);
        return $result;
    }

    /**
     * Add user order to db - BUY
     * @param $data
     * @return bool|int
     */
    public function postOrders($data)
    {
        $result = $this->model->addOrder($data);
        return $result;
    }

    /**
     * Update status order user by id_car and id_user
     * @param $data
     * @return bool
     */
    public function putOrders($data)
    {
        $result = $this->model->changeStatus($data);
        return $result;
    }

    public function deleteOrders($data)
    {

    }
}
$cars = new Orders();
