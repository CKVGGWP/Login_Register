<?php

require('app/models/login_register.php');

if (isset($_POST['Login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = new Login($email, $password);
    $login->login();
}

if (isset($_POST['Register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $register = new Register($name, $email, $password);
    $register->create();
}
