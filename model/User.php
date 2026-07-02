<?php

require_once __DIR__ . "/../config/database.php";

class User
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Registrasi
    public function register($nama, $username, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (nama, username, password)
                  VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $nama, $username, $password);

        return $stmt->execute();
    }

    // Login
    public function login($username)
    {
        $query = "SELECT * FROM users WHERE username = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);

        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}