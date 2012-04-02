<?php

class Request {

    function __construct() {
        $this->parg = array();
        if (isset($_SERVER['PATH_INFO'])) {
            $this->parg = explode('/', $_SERVER['PATH_INFO']);
        }
        $this->verb = $_SERVER['REQUEST_METHOD'];
        switch ($this->verb) {
            case 'GET':
                $this->param = $_GET;
                break;
            case 'POST':
            case 'PUT':
                $this->param = json_decode(file_get_contents('php://input'), TRUE);
                break;
            case 'DELETE':
            default:
                $this->param = array();
        }
    }

    function dispatch() {
        if ($this->parg) {
            $controller_name = ucfirst($this->parg[1]) . 'Controller';
            $controller = new $controller_name();
            $action = strtolower($this->verb);
            $response = $controller->$action($this);
        } else {
            throw_error_page('utter poverty and weakness');
        }
        return $response;
    }

}

?>
