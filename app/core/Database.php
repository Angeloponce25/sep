<?php

class Database {

    private $conn;

    public function __construct() {

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $this->conn = new mysqli("192.168.1.151","webmaster","super","gperu_cmdn");
        $this->conn->set_charset("utf8");
    }

    public function execute($sql) {
        return $this->conn->query($sql);
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function getConnection() {
        return $this->conn;
    }
}