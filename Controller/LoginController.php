<?php
    require_once 'Model/UserModel.php';
    class AuthController {
        private $userModel;
        public $error = [];
        public $user = '';
        public $password = '';

        public function __construct($connection) {
            $this->userModel = new UserModel($connection);
        }
        public function login() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->user = $_POST['username'] ?? '';
                $this->password = $_POST['password'] ?? '';

                if (empty($this->user)) {
                    $this->error['username'] = "Username is required.";
                }
                if (empty($this->password)) {
                    $this->error['password'] = "Password is required.";
                }
                if (empty($this->error)) {
                    $userData = $this->userModel->getUserByUsername($this->user);

                    if ($userData && password_verify($this->password, $userData['Password'])) {
                        $_SESSION['username'] = $userData['Username'];
                        header("Location: view/Dashboard.php");
                        exit();
                    } else {
                        $this->error['general'] = "Invalid username or password.";
                    }
                }
                if (isset($_POST['new'])) {
                    header("Location: View/Register.php");
                    exit();
                }
            }
            $user = $this->user;
            $password = $this->password;
            $errors = $this->error;
            include 'View/Login.php'; 
        }
    }
