<?php
include "Header.php";
include "Dbquery.php";
$data = new Dbquery();
$set = $data->getsqldata($input);

switch ($method) {
    case 'GET':
        if($key!=""){
            $data->find($table,$key);
        }else{
            $data->findall($table);
        }
        break;
    case 'PUT':
        $data->update($table,$set,$key);
        break;
    case 'POST':
        $data->insert($table,$set);
        break;
    case 'DELETE':
        $data->delete($table,$key);
        break;
}
?>