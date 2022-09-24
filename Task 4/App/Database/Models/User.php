<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Crud;
use App\Database\Models\Model;

class User extends Model implements Crud
{
    private $id, $first_name, $last_name, $email, $phone,
        $password, $gender, $image, $verification_code, $email_verified_at, $status,
        $created_at, $updated_at;

    public function create(): bool
    {
        $query = "INSERT INTO users (first_name,last_name,
        email,phone,password,gender,verification_code) VALUES (? , ? , ? , ? , ? , ?, ?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param(
            'ssssssi',
            $this->first_name,
            $this->last_name,
            $this->email,
            $this->phone,
            $this->password,
            $this->gender,
            $this->verification_code
        );
        return $stmt->execute();
    }

    public function read(): ?\mysqli_result
    {
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

    public function getFirst_name()
    {
        return $this->first_name;
    }

    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getLast_name()
    {
        return $this->last_name;
    }

    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        return $this;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function getVerification_code()
    {
        return $this->verification_code;
    }

    public function setVerification_code($verification_code)
    {
        $this->verification_code = $verification_code;
        return $this;
    }

    public function getEmail_verified_at()
    {
        return $this->email_verified_at;
    }

    public function setEmail_verified_at($email_verified_at)
    {
        $this->email_verified_at = $email_verified_at;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
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

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function verifyCode()
    {
        $query = "SELECT * FROM users WHERE email = ? AND verification_code = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param('si', $this->email, $this->verification_code);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function makeUserVerified(): bool
    {
        $query = "UPDATE users SET email_verified_at = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param('ss', $this->email_verified_at, $this->email);
        return $stmt->execute();
    }

    public function get()
    {
        $query = "SELECT * FROM users WHERE email = ? ";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param('s', $this->email);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function updateCode(): bool
    {
        $query = "UPDATE users SET verification_code = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param('ss', $this->verification_code, $this->email);
        return $stmt->execute();
    }
    public function updatePassword(): bool
    {
        $query = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param('ss', $this->password, $this->email);
        return $stmt->execute();
    }
    public function updateImage(): bool
    {
        $query = "UPDATE users SET image = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param('ss', $this->image, $this->email);
        return $stmt->execute();
    }

    public function updateInformation(): bool
    {
        $query = "UPDATE users SET first_name=?, last_name=?,gender = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param('ssss', $this->first_name, $this->last_name, $this->gender, $this->email);
        return $stmt->execute();
    }
}
