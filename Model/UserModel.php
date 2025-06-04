<?php
    class UserModel {
        private $connection;

        public function __construct($conn) {
            $this->connection = $conn;
        }

        public function getUserByUsername($username) {
            $query = "SELECT Username, Password FROM admin WHERE username=?";
            $stmt = mysqli_prepare($this->connection, $query);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $user = mysqli_fetch_assoc($result);
                mysqli_stmt_close($stmt);
                return $user;
            }
            return null;
        }

        public function userExists($username, $email) {
            $query = "SELECT * FROM admin WHERE Username = ? OR Email = ?";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_num_rows($result) > 0;
        }
    
        public function registerAdmin($fullname, $username, $email, $password) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO admin (FullName, Username, Email, Password) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param($stmt, "ssss", $fullname, $username, $email, $hashedPassword);
            return mysqli_stmt_execute($stmt);
        }
    }
