<?php
require_once "../Model/UserModel.php";

class RegisterController {
    private $model;
    public $errors = [];

    public function __construct($db) {
        $this->model = new UserModel($db);
    }

    private function validate($condition, $message, $key) {
        if ($condition) {
            $this->errors[$key] = $message;
        }
    }

    public function handleRequest() {
        $data = ['fullname' => '', 'username' => '', 'email' => '', 'password' => '', 'confirm' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
            $data = [
                'fullname' => $_POST['fullname'],
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm' => $_POST['confirm'],
            ];

            $this->validate(empty($data['fullname']), "Full Name is required.", 'fullname');
            $this->validate(empty($data['username']), "Username is required.", 'username');
            $this->validate(empty($data['email']), "Email is required.", 'email');
            $this->validate(!filter_var($data['email'], FILTER_VALIDATE_EMAIL), "Invalid email format.", 'email');
            $this->validate(empty($data['password']), "Password is required.", 'password');
            $this->validate(strlen($data['password']) < 8, "Password must be at least 8 characters.", 'password');
            $this->validate($data['password'] !== $data['confirm'], "Passwords do not match.", 'confirmPassword');

            if (empty($this->errors)) {
                if ($this->model->userExists($data['username'], $data['email'])) {
                    echo "<script>alert('Username or Email already exists.');</script>";
                } else {
                    if ($this->model->registerAdmin($data['fullname'], $data['username'], $data['email'], $data['password'])) {
                        header("Location: Index.php");
                        exit;
                    }
                }
            }
        }

        return ['errors' => $this->errors, 'data' => $data];
    }
}
