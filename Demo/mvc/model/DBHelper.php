<?php

class DBHelper
{

    public $conn;
    public $dbname = "test";
    public $username = "root";
    public $password = "root";
    public $host = "localhost";

    public function __construct()
    {

        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
            die("connect fail" . mysqli_connect_errorno());
        }
        // mysql_select_db($this->dbname, $this->conn);
    }

    public function execute_sql($sql)
    {

        $arr = array();
        $res = mysqli_query($this->conn, $sql) or die(mysqli_connect_errorno());

        while ($row = mysqli_fetch_assoc($res)) {
            $arr[] = $row;
        }
        mysqli_free_result($res);
        return $arr;

    }

    public function close_connect()
    {

        if (!empty($this->conn)) {
            mysqli_close($this->conn);
        }
    }
}

?>
