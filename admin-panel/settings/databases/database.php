<?php
require __DIR__ . "/../config.php";

abstract class AdminDatabase
{
    protected $conn;
    public function __construct()
    {
        $this->conn = new PDO(DSN, USER, PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
