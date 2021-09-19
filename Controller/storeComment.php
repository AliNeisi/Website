<?php
if (isset($_POST['storeComment'])) {
    include "Config.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $config = new Config();
    $config->storeComment($name, $email, $msg);
} else header('location:/My Personal Website/');