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
    }
