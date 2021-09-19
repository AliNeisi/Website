<?php

class Config
{
    public $conn;
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=personalwebsite;charset=utf8", 'root', '');
    }

    public function storeComment($name, $email, $msg)
    {
        $sql = "insert into msg values (null, :name, :email, :msg)";
        $query = $this->conn->prepare($sql);
        $query->execute(array(':name' => $name, ':email' => $email, ':msg' => $msg));
    }
}