<?php

include('config.php');

class Database
{
    public function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
            $conn = new PDO($dsn, DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        } catch (PDOException $e) {
            echo 'Connection Failed! Error : ' . $e->getMessage();
            exit();
        }
    }
}
