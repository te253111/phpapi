<?php
    include "Baseconnect.php";
    include "Basequery.php";
    class Dbquery extends Baseconnect implements Basequery {

        public function findall($table)
        {
            $conn = $this->getconnection();
            $sql = "SELECT * FROM $table";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '[';
                  for ($i=0;$i<mysqli_num_rows($result);$i++) {
                      echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
                  }
                echo ']';
            } else {
                echo "0 results";
            }
            $conn->close();
        }

        public function find($table,$value)
        {
            $filter = $this->getFieldfilter();
            $conn = $this->getconnection();
            $sql = "SELECT * FROM $table WHERE $filter='$value'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '[';
                for ($i=0;$i<mysqli_num_rows($result);$i++) {
                    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
                }
                echo ']';
            } else {
                echo "0 results";
            }
            $conn->close();
        }

        public function insert($table, $value)
        {
            $conn = $this->getconnection();
            $sql = "INSERT INTO $table SET $value";
            $result = $conn->query($sql);
            $conn->close();
            echo  $this->getresult($result);
        }

        public function delete($table, $value)
        {
            $filter = $this->getFieldfilter();
            $conn = $this->getconnection();
            $sql = "DELETE FROM $table WHERE $filter='$value'";
            $result = $conn->query($sql);
            $conn->close();
            echo  $this->getresult($result);
        }

        public function update($table, $value, $key)
        {
            $filter = $this->getFieldfilter();
            $conn = $this->getconnection();
            $sql = "UPDATE $table SET $value WHERE $filter='$key'";
            $result = $conn->query($sql);
            $conn->close();
            echo  $this->getresult($result);
        }

        public function sql($sql)
        {
            $conn = $this->getconnection();
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '[';
                for ($i=0;$i<mysqli_num_rows($result);$i++) {
                    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
                }
                echo ']';
            } else {
                echo "0 results";
            }
            $conn->close();
        }

        public function login($user, $pass)
        {
            $res="false";
            $conn = $this->getconnection();
            $sql = "select * from muser where username='$user' and password='$pass'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $res="true";
            }
            $conn->close();
            echo  $res;
        }
    }
?>