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

    public function checkUsers()
    {
//        var_dump($_COOKIE);
        if (isset($_COOKIE['id']) && isset($_COOKIE['hash']))
        {
            $id = $this->pdo->quote(($_COOKIE['id']));
            $sql = "SELECT hash FROM users WHERE id=".$id;
            $sth = $this->pdo->prepare($sql);
            $result = $sth->execute();
            if (false === $result)
            {
                throw new PDOException(ERR_QUERY);
            }
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            if ($data[0]['hash'] === $_COOKIE['hash'])
            {
                return true;
            }
            else
            {
                // delete cookies
                setcookie("id", "0", time()-3600*24*30*12, '/');
                setcookie("hash", "0", time()-3600*24*30*12, '/');
                echo 'del';
                return false;
            }
        }
        else
        {
            echo 'TODO - No cookies - you need to login';
            return false;
        }
    }

    /**
     * Login user - set cookie and update hash
     * @param $param
     * @return bool
     */
    public function loginUser($param)
    {
        file_put_contents('tempp.txt', print_r($param, true));
        //header('Access-Control-Allow-Headers: *');
        setcookie("id", 1, time()+60*60*24*30);
        setcookie("hash", 2, time()+60*60*24*30);
        //header('Access-Control-Allow-Origin: *');
        //header("HTTP/1.0 200 OK");
        return $param;

//        $pass = md5(md5(trim($param['pass'])));
//        $login = $this->pdo->quote($param['login']);
//        $sql = "SELECT id, pass FROM users WHERE login=".$login;
//        $sth = $this->pdo->prepare($sql);
//        $result = $sth->execute();
//        if (false === $result)
//        {
////            throw new PDOException(ERR_QUERY);
//            return ERR_QUERY;
//        }
//        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
//        if (empty($data))
//        {
////            throw new PDOException(ERR_AUTH);
//            return ERR_AUTH;
//        }
//        if (is_array($data))
//        {
//            foreach ($data as $val)
//            {
//                if ($pass !== $val['pass'])
//                {
////                    throw new PDOException(ERR_AUTH);
//                    return ERR_AUTH;
//                }
//                else
//                {
//                    $id = $this->pdo->quote($val['id']);
//                }
//            }
//        }
//        $hash = $this->pdo->quote(md5($this->generateHash(10)));
//        $sql = "UPDATE users SET hash=".$hash." WHERE id=".$id;
//        $count = $this->pdo->exec($sql);
//        if ($count === false)
//        {
////            throw new PDOException(ERR_USER);
//            return ERR_USER;
//        }
//        $id = trim($id, "'");
//        $hash = trim($hash, "'");
//        header('Access-Control-Allow-Origin: *');
//        header("HTTP/1.0 200 OK");
//        setcookie("id", $id, time()+60*60*24*30);
//        setcookie("hash", $hash, time()+60*60*24*30);
//      //  header('Location: http://rest/user6/rest_task1/client/api/users/');
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
