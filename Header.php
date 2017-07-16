<?php
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$key = array_shift($request);
?>