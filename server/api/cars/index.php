<?php
include '../../app/RestServer.php';
class Cars extends RestServer
{
    public function __construct()
    {
        $this->run();
    }

    public function getCars($data = false)
    {

        return var_dump($data) . '<br>Hello!?!?!?!? ';

    }
}
$cars = new Cars();
