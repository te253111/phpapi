<?php
interface Basequery{
    public function findall($table);
    public function find($table,$value);
    public function insert($table,$value);
    public function update($table,$value,$key);
    public function delete($table,$value);
    public function sql($sql);
    public function login($user,$pass);
}
?>