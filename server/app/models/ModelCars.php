<?php
class ModelCars
{
    private $pdo;

    /**
     * Cars constructor. - connect to DB
     */
    public function __construct()
    {
        $this->pdo = new PDO(DSN_MY, USER_NAME, PASS);
        if (!$this->pdo)
        {
            throw new PDOException(ERR_DB);
        }
    }
    public function test()
    {
        return 1;
    }

    /**
     * Get all cars or by id
     * @param bool $id
     * @return array
     */
    public function getCars($param=false)
    {
        $sql = "SELECT id, brand, model, year, engine, color, max_speed, price FROM cars";
        if ($param !== false)
        {
            if (is_array($param))
            {
                $sql .= " WHERE ";
                foreach ($param as $key => $val)
                {
                    $sql .= $key.'='.$this->pdo->quote($val).' AND ';
                }
                $sql = substr($sql, 0, -5);
            }
        }
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
}