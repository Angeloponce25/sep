<?php

class Database {

    private $conn;

    public function __construct() {

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
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