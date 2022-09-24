<?php
namespace App\Database\Connection;
use mysqli;

class Connection {
    private string $dataBaseName = 'nti_ecommerece';
    private string $hostName = 'localhost';
    private string $username = 'root';
    private string $password = '';
    protected \mysqli $conn;

    public function __construct() {
        $this->conn = new mysqli($this->hostName,$this->username,$this->password,
        $this->dataBaseName);
    }
}
new Connection;