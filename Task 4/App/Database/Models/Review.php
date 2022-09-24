<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Crud;

class Review extends Model  implements Crud
{
    private $product_id, $user_id, $rate, $comment, $created_at, $updated_at;
    private const ACTIVE = 1;

    public function create(): bool
    {
        $query = "INSERT INTO reviews (rate,comment,product_id,user_id) VALUES (? ,?, ? , ?)";
        $statement = $this->conn->prepare($query);
        if (!$statement) {
            return false;
        }
        $statement->bind_param(
            'isii',
            $this->rate,
            $this->comment,
            $this->product_id,
            $this->user_id
        );
        return $statement->execute();
    }

    public function read(): ?\mysqli_result
    {
        return $this->conn->query("SELECT id,image FROM brands where status = " . self::ACTIVE . " ORDER BY name_en");
    }

    public function update(): bool
    {
    }

    public function delete(): bool
    {
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

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;
        return $this;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function get()
    {
        $query = "SELECT
                    `reviews`.*,
                    CONCAT(`users`.`first_name` , ' ' , `users`.`last_name`) AS `full_name`
                FROM
                    `reviews`
                JOIN `users`
                ON `users`.`id` = `reviews`.`user_id`
                WHERE
                    `product_id` = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->product_id);
        $stmt->execute();
        return $stmt->get_result();
    }
}
