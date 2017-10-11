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

    public function checkUsers($param)
    {
       if ($param)
       {
            $id = $this->pdo->quote(($param['id']));
            $sql = "SELECT hash FROM users WHERE id=".$id;
            $sth = $this->pdo->prepare($sql);
            $result = $sth->execute();
            if (false === $result)
            {
//                throw new PDOException(ERR_QUERY);
                return false;
            }
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $data[0]['hash']; 
       }   
       else
       {
           // return ERR_SEARCH;
           return false;
       }
    }

    /**
     * Login user - //set cookie and update hash
     * @param $param
     * @return bool
     */
    public function loginUser($param)
    {
        $pass = md5(md5(trim($param['pass'])));
        $login = $this->pdo->quote($param['login']);
        $sql = "SELECT id, pass FROM users WHERE login=".$login;
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute();
        if (false === $result)
        {
            //throw new PDOException(ERR_QUERY);
            return ERR_QUERY;
        }
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        if (empty($data))
        {
//            throw new PDOException(ERR_AUTH);
            return ERR_AUTH;
        }
        if (is_array($data))
        {
            foreach ($data as $val)
            {
                if ($pass !== $val['pass'])
                {
//                    throw new PDOException(ERR_AUTH);
                    return ERR_AUTH;
                }
                else
                {
                    $id = $this->pdo->quote($val['id']);
                }
            }
        }
        $hash = $this->pdo->quote(md5($this->generateHash(10)));
        $sql = "UPDATE users SET hash=".$hash." WHERE id=".$id;
        $count = $this->pdo->exec($sql);
        if ($count === false)
        {
//            throw new PDOException(ERR_USER);
            return ERR_USER;
        }
        $id = trim($id, "'");
        $hash = trim($hash, "'");
        $arrRes = ['id'=>$id, 'hash'=>$hash];
        return json_encode($arrRes);
    }

    public function logoutUser()
    {
        if (isset($_COOKIE['id']) && isset($_COOKIE['hash']))
        {
            setcookie("id", "0", time()-3600*24*30*12, '/');
            setcookie("hash", "0", time()-3600*24*30*12, '/');
            return true;
        }
        return false;
    }

    /**
     * Registretion - add user to DB
     * @param $param
     * @return int
     */
    public function addUser($param)
    {
        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
        {
            return ERR_LOGIN_NAME;
        }
        if(strlen($_POST['login']) < 3 || strlen($_POST['login']) > 30)
        {
            return ERR_LOGIN_LEN;
        }
        $login = $this->pdo->quote($param['login']);
        $pass = md5(md5(trim($_POST['pass'])));
        $pass = $this->pdo->quote($pass);
        $hash = $this->pdo->quote('firstHash');
        $sql = "INSERT INTO users (login, pass, hash) VALUES (".$login.", ".$pass.", ".$hash.")";
        $count = $this->pdo->exec($sql);
        if ($count === false)
        {
            return ERR_USER;
        }
        return $count;
    }

    /**
     * random hash generate for user
     * @param int $length
     * @return string
     */
    function generateHash($length=6)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length)
        {
            $code .= $chars[mt_rand(0,$clen)];
        }
        return $code;
    }
}
