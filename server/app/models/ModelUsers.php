<?php
class ModelUsers
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO(DSN_MY, USER_NAME, PASS);
        if (!$this->pdo)
        {
            throw new PDOException(ERR_DB);
        }
    }

    public function getUsers($param=false)
    {
        
    }

    public function addUser($param)
    {
        var_dump($param);
        $login = $this->pdo->quote($param['login']);
        echo $login;
        $pass = $this->pdo->quote($param['pass']);
        echo $pass;
            $hash = $this->pdo->quote('firstHash');
            $sql = "INSERT INTO users (login, pass, hash) VALUES (".$login.", ".$pass.", ".$hash.")";
            echo $sql;
        $count = $this->pdo->exec($sql);
        return $count;
    }
}
