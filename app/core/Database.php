<?php

class Database {

    private $conn;

    public function __construct() {

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $this->conn = mysqli_init();

        // ⏱ aumentar tiempo de espera
        $this->conn->options(MYSQLI_OPT_CONNECT_TIMEOUT, 10);

        $this->conn->real_connect(
            "192.168.1.151",
            "webmaster",
            "super",
            "gperu_cmdn",
            3306
        );

        $this->conn->set_charset("utf8");
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function execute($sql) {
        return $this->conn->query($sql);
    }

    public function getConnection() {
        return $this->conn;
    }
}