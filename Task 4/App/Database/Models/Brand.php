<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Crud;

class Brand extends Model  implements Crud
{

    public function create(): bool
    {
    }

    public function read(): ?\mysqli_result
    {
        return $this->conn->query("SELECT id,image FROM brands where status = 1 ORDER BY name_en");
    }

    public function update(): bool
    {
    }

    public function delete(): bool
    {
    }
}
