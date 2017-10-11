<?php
class Response
{
    private function clientErrorType()
    {
        return array(
            405 => "HTTP/1.1 405 Method Not Allowed",
            415 => "HTTP/1.1 415 Unsupported Media Type"
        );
    }

    private function serverOKType()
    {
        return array(
            200 => "HTTP/1.0 200 OK"
        );
    }

    private function serverErrorType()
    {
        return array(
            500 => "HTTP/1.0 500 Internal Server Error"
        );
    }

    public function serverSuccess($type, $msg=null)
    {
        $responseHeader = $this->serverOKType();
        //header('Access-Control-Allow-Origin: *');
        header($responseHeader[$type]);
        return $msg;
    }

    public function serverError($errorType, $msg=null)
    {
        $responseHeader = $this->serverErrorType();
        //header('Access-Control-Allow-Origin: *');
        header($responseHeader[$errorType]);
        return $msg;
    }

    public function clientError($errorType, $msg)
    {
        $responseHeader = $this->clientErrorType();
        //header('Access-Control-Allow-Origin: *');
        header($responseHeader[$errorType]);
        return $msg;
    }
}
