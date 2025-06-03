<?php
    require_once 'Config/Database.php';
    require_once 'Controller/LoginController.php';

    session_start();

    $authController = new AuthController($connection);
    $authController->login();