<?php
class ModelOrders
{
    private $pdo;

    /**
     * ModelOrders constructor. - connect to DB.
     */
    public function __construct()
    {
        $this->pdo = new PDO(DSN_MY, USER_NAME, PASS);
        if (!$this->pdo)
        {
            throw new PDOException(ERR_DB);
        }
    }

    public function getOrders($param)
    {
        //Uli polu4it' usera iz cookov.... xz poka
        if (empty($param['id']))
        {
            return false;
        }
        $id_user = $this->pdo->quote($param['id']);
        $sql = "SELECT cars.id, cars.brand, cars.model, cars.price, orders.status".
            " FROM orders, cars WHERE orders.id_car=cars.id AND orders.id_user=".$id_user;
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute();
        if (false === $result)
        {
            throw new PDOException(ERR_QUERY);
        }
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        if (empty($data))
        {
            throw new PDOException(ERR_SEARCH);
        }
        return $data;
    }

    /**
     * Add user order to db
     * @param $param
     * @return bool|int
     */
    public function addOrder($param)
    {
        if (empty($param))
        {
            return false;
        }
        $id_car = $this->pdo->quote($param['id_car']);
        $id_user = $this->pdo->quote($param['id_user']);
        $status = '\'sent\'';
        $sql = "INSERT INTO orders (id_car, id_user, status) VALUES (".$id_car.", ".$id_user.", ".$status.")";
        $count = $this->pdo->exec($sql);
        if ($count === false)
        {
            throw new PDOException(ERR_QUERY);
        }
        return $count;
    }

    /**
     * Change status for order user
     * @param $param
     * @return bool
     */
    public function changeStatus($param)
    {
        if (empty($param['id_car']) && empty($param['id_user']) && empty($param['status']))
        {
            return false;
        }
        if ($param['status'] !== 'sent' && $param['status'] !== 'received')
        {
            return false;
        }
        $id_car = $this->pdo->quote($param['id_car']);
        $id_user = $this->pdo->quote($param['id_user']);
        $status = $this->pdo->quote($param['status']);
        $sql = "UPDATE orders SET status=".$status." WHERE id_car=".$id_car." AND id_user=".$id_user;
        $count = $this->pdo->exec($sql);
        if ($count === false)
        {
            throw new PDOException(ERR_QUERY);
        }
        return true;
    }

}