<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Crud;

class Product extends Model  implements Crud
{
    private $id, $name_en, $name_ar, $price, $product_code, $quantity,
        $status, $details_en, $details_ar, $image, $brand_id, $subcategroy_id, $category_id,
        $created_at, $updated_at, $offer_id;
    private const ACTIVE = 1;

    public function create(): bool
    {
    }

    public function read(): ?\mysqli_result
    {
        $query = "SELECT id,name_en,details_en,price,image FROM products WHERE status = " . self::ACTIVE . " ORDER BY price , name_en";
        return $this->conn->query($query);
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

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getProduct_code()
    {
        return $this->product_code;
    }

    public function setProduct_code($product_code)
    {
        $this->product_code = $product_code;
        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
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

    public function getDetails_en()
    {
        return $this->details_en;
    }

    public function setDetails_en($details_en)
    {
        $this->details_en = $details_en;
        return $this;
    }

    public function getDetails_ar()
    {
        return $this->details_ar;
    }

    public function setDetails_ar($details_ar)
    {
        $this->details_ar = $details_ar;
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

    public function getBrand_id()
    {
        return $this->brand_id;
    }

    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;
        return $this;
    }

    public function getSubcategroy_id()
    {
        return $this->subcategroy_id;
    }

    public function setSubcategroy_id($subcategroy_id)
    {
        $this->subcategroy_id = $subcategroy_id;
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

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

    public function getOffer_id()
    {
        return $this->offer_id;
    }

    public function setOffer_id($offer_id)
    {
        $this->offer_id = $offer_id;
        return $this;
    }

    public function getProductsByBrand(): \mysqli_result
    {
        $query = "SELECT DISTINCT `products`.`id`,`products`.`name_en`,`products`.`details_en`,`products`.`price`,`products`.`image`
            FROM `products`
            JOIN `brands`  ON 
            `products`.`status` = " . self::ACTIVE . " AND `brand_id` = ? 
            GROUP BY products.id
            ORDER BY `price` , `name_en`";
        $stmt =  $this->conn->prepare($query);
        $stmt->bind_param('i', $this->brand_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getProductsBySub(): \mysqli_result
    {
        $query = "SELECT DISTINCT `products`.`id`,`products`.`name_en`,`products`.`details_en`,`products`.`price`,`products`.`image`
            FROM `products`
            JOIN `subcategories` ON 
            `products`.`status` = " . self::ACTIVE . " AND `products`.`subcategory_id` = ? 
            GROUP BY products.id
            ORDER BY `price` , `name_en`";

        $stmt =  $this->conn->prepare($query);
        $stmt->bind_param('i', $this->subcategroy_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getProductsByCat(): \mysqli_result
    {
        $query = "SELECT DISTINCT `products`.`id`,`products`.`name_en`,`products`.`details_en`,`products`.`price`,`products`.`image`
            FROM products
            JOIN `subcategories` ON `subcategories`.`id`=`products`.`subcategory_id`
            JOIN categories ON categories.id=subcategories.category_id
            and `products`.`status` = " . self::ACTIVE . " AND  `categories`.`id` = ?  
            GROUP BY products.id
            ORDER BY `price` , `name_en`";
        $stmt =  $this->conn->prepare($query);
        $stmt->bind_param('i', $this->category_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function mostOrderedProducts(): \mysqli_result
    {
        $query = "SELECT
        `products`.*,
        SUM(`orders_products`.`quantity`) AS `product_order_times` 
    FROM
        `products`
    JOIN `orders_products` ON `products`.`id` = `orders_products`.`product_id`
    GROUP BY
        `products`.`id`
    ORDER BY `product_order_times` DESC
    LIMIT 4";
        $stmt =  $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function mostRecentProducts(): \mysqli_result
    {
        $query = "SELECT
        `products`.*
    FROM
        `products`
    ORDER BY `created_at` DESC,`name_en` ASC
    LIMIT 4";
        $stmt =  $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function find(): \mysqli_result
    {
        $query = " SELECT products.*,
        subcategories.name_en AS `subcategory_name_en`,
        brands.name_en AS `brand_name_en`,
        categories.id AS `category_id`,
        categories.name_en AS `category_name_en`,
        COUNT(reviews.product_id) AS `reviews_count`,
        ROUND(IF(AVG(reviews.rate) IS NULL,0,AVG(reviews.rate))) AS `reviews_avg`
            FROM products
            JOIN `brands`  ON `brands`.`id`=`products`.`brand_id` 
            JOIN `subcategories` ON `subcategories`.`id`=`products`.`subcategory_id`
            JOIN categories ON categories.id=subcategories.category_id
            JOIN reviews ON products.id=reviews.product_id AND `products`.`status`= " . self::ACTIVE . " AND `products`.`id` =?";
        $stmt =  $this->conn->prepare($query);
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getProductsByOffer(): \mysqli_result
    {
        $query = "SELECT  `products`.`id`,`products`.`name_en`,`products`.`details_en`,`products`.`price`,`products`.`image`
        FROM `products`
        JOIN `offers_products` ON 
        `products`.`id`=`offers_products`.`product_id`
        JOIN `offers` ON offers_products.offer_id =?
        GROUP BY `products`.`id`";
        $stmt =  $this->conn->prepare($query);
        $stmt->bind_param('i', $this->offer_id);
        $stmt->execute();
        return $stmt->get_result();
    }
}
