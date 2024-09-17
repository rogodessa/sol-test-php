<?php

namespace Solo\TestPhp;

class Database
{
    private $connection;

    private $host;

    private $databaseName;

    private $username;

    private $password;

    public function __construct()
    {

        $this->host = $_ENV['DB_HOST'] ?? 'localhost';
        $this->databaseName = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];

    }

    public function connection() {
        $this->connection = new \mysqli($this->host, $this->username, $this->password, $this->databaseName);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        return $this->connection;
    }
}