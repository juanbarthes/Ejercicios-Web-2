<?php

class ApiVuelosView
{
    public function response($data, $status)
    {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }

    private function _requestStatus($code)
    {
        $status = array(
            200 => 'Ok',
            404 => 'Not Found',
            500 => 'Internal Server Error'
        );
        return (isset($status[$code])) ? $status[$code] : $status[500];
    }
}
