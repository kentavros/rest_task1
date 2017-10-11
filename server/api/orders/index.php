<?php
include '../../app/lib/function.php';
class Orders extends RestServer
{
    private $model;
    private $response;

    /**
     * create obj - model
     * parent run method
     * Cars constructor.
     */
    public function __construct()
    {
        $this->model = new ModelOrders();
        $this->response = new Response();
        $this->run();
    }

    public function getOrders($data)
    {
        $result = $this->model->getOrders($data);
        if ($result != ERR_QUERY)
        {
            $result = $this->encodedData($result);
            return $this->response->serverSuccess(200, $result);
        }
        else
        {
            return $this->response->serverError(500, $result);
        }

    }

    /**
     * Add user order to db - BUY
     * @param $data
     * @return bool|int
     */
    public function postOrders($data)
    {
        $result = $this->model->addOrder($data);
        if ($result != ERR_QUERY)
        {
            return $this->response->serverSuccess(200, $result);
        }
        else
        {
            return $this->response->serverError(500, $result);
        }
    }

    /**
     * Update status order user by id_car and id_user
     * @param $data
     * @return bool
     */
    public function putOrders($data)
    {
        $result = $this->model->changeStatus($data);
        return $this->response->serverSuccess(200, $result);

    }

    public function deleteOrders($data)
    {

    }
}
$cars = new Orders();
