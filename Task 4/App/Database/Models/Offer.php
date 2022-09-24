<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Crud;

class Offer extends Model  implements Crud
{
    private $id, $title_en, $title_ar, $image, $discount, $discout_type,
        $offer_id, $product_id, $price_after_discount, $start_at, $end_at,
        $created_at, $updated_at;

    public function create(): bool
    {
    }

    public function read(): ?\mysqli_result
    {
        $query = "SELECT  `products`.`id`,
        `products`.`name_en` AS `productName`,`products`.`details_en`,`products`.`price`,`products`.`image`,
        offers_products.price_after_discount AS `priceAfterDiscount`,
        `offers`.`title_en` AS `title` ,
        `offers`.`image` AS `offerImage`,
        `offers`.`id` AS `offerId`
        FROM `products`
        JOIN `offers_products` ON 
        `products`.`id`=`offers_products`.`product_id`
        JOIN `offers` ON `offers_products`.`offer_id` =`offers`.`id`
        GROUP BY `products`.`id`";
        $statement =  $this->conn->prepare($query);
        if (!$statement) {
            return false;
        }
        $statement->execute();
        return $statement->get_result();
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

    public function getTitle_en()
    {
        return $this->title_en;
    }

    public function setTitle_en($title_en)
    {
        $this->title_en = $title_en;

        return $this;
    }

    public function getTitle_ar()
    {
        return $this->title_ar;
    }

    public function setTitle_ar($title_ar)
    {
        $this->title_ar = $title_ar;

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

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    public function getDiscout_type()
    {
        return $this->discout_type;
    }

    public function setDiscout_type($discout_type)
    {
        $this->discout_type = $discout_type;

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

    public function getProduct_id()
    {
        return $this->product_id;
    }

    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;
        return $this;
    }

    public function getPrice_after_discount()
    {
        return $this->price_after_discount;
    }

    public function setPrice_after_discount($price_after_discount)
    {
        $this->price_after_discount = $price_after_discount;
        return $this;
    }

    public function getStart_at()
    {
        return $this->start_at;
    }

    public function setStart_at($start_at)
    {
        $this->start_at = $start_at;
        return $this;
    }

    public function getEnd_at()
    {
        return $this->end_at;
    }

    public function setEnd_at($end_at)
    {
        $this->end_at = $end_at;
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
}
