<?php
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);
include "Dbquery.php";
$data = new Dbquery();
switch ($method) {
    case 'GET':
        break;
    case 'PUT':
        break;
    case 'POST':
        $data->login($input["username"],$input["password"]);
        break;;
    case 'DELETE':
        break;
}
?>