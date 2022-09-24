<?php

namespace App\Database\Models;

use App\Database\Connection\Connection;

class Model extends Connection
{
    public function search($table, $column, $value)
    {
        $query = "SELECT * FROM {$table} WHERE {$column} = ?";
        $statement = $this->conn->prepare($query);
        if (!$statement) {
        }
        $statement->bind_param('s', $value);
        $statement->execute();
        return $statement->get_result();
    }
}
