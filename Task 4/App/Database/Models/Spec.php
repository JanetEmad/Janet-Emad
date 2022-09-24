<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Crud;

class Spec extends Model  implements Crud
{
    private $id, $name_en, $product_id, $name_ar, $value;

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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName_en()
    {
        return $this->name_en;
    }

    public function setName_en($name_en)
    {
        $this->name_en = $name_en;
        return $this;
    }

    public function getName_ar()
    {
        return $this->name_ar;
    }

    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getProduct_id()
    {
        return $this->product_id;
    }

    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;
        return $this;
    }

    public function get()
    {
        $query = "SELECT products_specs.* , specs.name_en FROM specs JOIN products_specs ON specs.id = products_specs.spec_id WHERE product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->product_id);
        $stmt->execute();
        return $stmt->get_result();
    }
}
