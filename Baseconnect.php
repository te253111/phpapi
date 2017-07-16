<?php

abstract class Baseconnect
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "te2531";
    private $dbname = "db_rest";
    private $fieldfilter = "id";


    public function getconnection()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;

    }

    public function setServername($servername)
    {
        $this->servername = $servername;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }


    public function getFieldfilter()
    {
        return $this->fieldfilter;
    }

    public function setFieldfilter($fieldfilter)
    {
        $this->fieldfilter = $fieldfilter;
    }


    public function getresult($data)
    {
        $res="false";
        if ($data == 1) {
            $res = "true";
        }
        return $res;
    }

    public function getsqldata($data)
    {
        $set = "";
        if ($data != "") {
            $link = $this->getconnection();
            $columns = preg_replace('/[^a-z0-9_]+/i', '', array_keys($data));
            $values = array_map(function ($value) use ($link) {
                if ($value === null) return null;
                return mysqli_real_escape_string($link, (string)$value);
            }, array_values($data));
            for ($i = 0; $i < count($columns); $i++) {
                $set .= ($i > 0 ? ',' : '') . '`' . $columns[$i] . '`=';
                $set .= ($values[$i] === null ? 'NULL' : '"' . $values[$i] . '"');
            }
        }
        return $set;
    }
}

?>