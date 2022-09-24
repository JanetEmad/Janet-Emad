<?php

use App\Database\Models\Brand;
use App\Database\Models\Product;
use App\Database\Models\Offer;


$pageName = "Home";
include "layouts/header.php";
include "layouts/navbar.php";
$brand = new Brand;
$brands = $brand->read()->fetch_all(MYSQLI_ASSOC);
$productObj = new Product;
$mostOrderedProducts = $productObj->mostOrderedProducts()->fetch_all(MYSQLI_ASSOC);
$mostRecentProducts = $productObj->mostRecentProducts()->fetch_all(MYSQLI_ASSOC);
$offer = new Offer;
$offers = $offer->read()->fetch_all(MYSQLI_ASSOC);
?>
<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
        <?php foreach ($offers as $offer) { ?>
            <div class="single-slider ptb-240 bg-img" style="background-image:url(assets/img/offer/<?= $offer['offerImage'] ?>);">
                <div class="container">
                    <div class="slider-content slider-animated-1">
                        <h1 class="animated"><?= $offer['title'] ?></h1>
                        <h1 class="animated"><span class="theme-color font-weight-bold"><?= $offer['productName'] ?></span></h1>
                        <br>
                        <h2 class="animated">Price After Discount <span class="theme-color"><?= $offer['priceAfterDiscount'] ?></span></h2>
                        <a href="shop.php?offer=<?= $offer['offerId'] ?>">
                            Show offer
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="product-area bg-image-1 pt-100 pb-95">
    <div class="container">
        <div class="row">
            <?php foreach ($brands as $brand) { ?>
                <div class="col-3 brand">
                    <div class="product-img">
                        <a href="shop.php?brand=<?= $brand['id'] ?>">
                            <img alt="" src="assets/img/brand-logo/<?= $brand['image'] ?>">
                        </a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<div class="banner-area pt-100 pb-70">
    <div class="container">
        <div class="banner-wrap">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-banner img-zoom mb-30">
                        <a href="#">
                            <img src="assets/img/banner/banner-1.png" alt="">
                        </a>
                        <div class="banner-content">
                            <h4>-50% Sale</h4>
                            <h5>Summer Vacation</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-banner img-zoom mb-30">
                        <a href="#">
                            <img src="assets/img/banner/banner-2.png" alt="">
                        </a>
                        <div class="banner-content">
                            <h4>-20% Sale</h4>
                            <h5>Winter Vacation</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-area gray-bg pt-90 pb-65">
    <div class="container">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Most Ordered Products</h3>
            </div>
        </div>
        <div class="tab-content jump ">
            <div class="tab-pane active">
                <div class="row">
                    <?php foreach ($mostOrderedProducts as $product) { ?>
                        <div class="col-3">
                            <div class="product-wrapper-single">
                                <div class="product-wrapper mb-30">
                                    <div class="product-img ordered-products">
                                        <a href="product-details.php?product=<?= $product['id'] ?>">
                                            <img alt="" src="assets/img/product/<?= $product['image'] ?>">
                                        </a>
                                        <div class="product-action">
                                            <a class="action-wishlist" href="#" title="Wishlist">
                                                <i class="ion-android-favorite-outline"></i>
                                            </a>
                                            <a class="action-cart" href="#" title="Add To Cart">
                                                <i class="ion-ios-shuffle-strong"></i>
                                            </a>
                                            <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                <i class="ion-ios-search-strong"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content text-left">
                                        <div class="product-hover-style">
                                            <div class="product-title">
                                                <h4>
                                                    <a href="product-details.php"><?= $product['name_en'] ?></a>
                                                </h4>
                                            </div>
                                            <div class="cart-hover">
                                                <h4><a href="product-details.php">+ Add to cart</a></h4>
                                            </div>
                                        </div>
                                        <div class="product-price-wrapper">
                                            <span><?= $product['price'] ?> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="product-area gray-bg pt-90 pb-65">
    <div class="container">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Most Recent Products</h3>
            </div>
        </div>
        <div class="tab-content jump ">
            <div class="tab-pane active ">
                <div class="row">
                    <?php foreach ($mostRecentProducts as $product) { ?>
                        <div class="col-3">
                            <div class="product-wrapper-single">
                                <div class="product-wrapper mb-30">
                                    <div class="product-img recent-products">
                                        <a href="product-details.php?product=<?= $product['id'] ?>">
                                            <img alt="" src="assets/img/product/<?= $product['image'] ?>">
                                        </a>
                                        <div class="product-action">
                                            <a class="action-wishlist" href="#" title="Wishlist">
                                                <i class="ion-android-favorite-outline"></i>
                                            </a>
                                            <a class="action-cart" href="#" title="Add To Cart">
                                                <i class="ion-ios-shuffle-strong"></i>
                                            </a>
                                            <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                <i class="ion-ios-search-strong"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content text-left">
                                        <div class="product-hover-style">
                                            <div class="product-title">
                                                <h4>
                                                    <a href="product-details.php"><?= $product['name_en'] ?></a>
                                                </h4>
                                            </div>
                                            <div class="cart-hover">
                                                <h4><a href="product-details.php">+ Add to cart</a></h4>
                                            </div>
                                        </div>
                                        <div class="product-price-wrapper">
                                            <span><?= $product['price'] ?> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="testimonials-area bg-img pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="testimonial-active owl-carousel">
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="assets/img/icon-img/testi.png">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore</p>
                        <h4>Gregory Perkins</h4>
                        <h5>Customer</h5>
                    </div>
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="assets/img/icon-img/testi.png">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore</p>
                        <h4>Khabuli Teop</h4>
                        <h5>Marketing</h5>
                    </div>
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="assets/img/icon-img/testi.png">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore </p>
                        <h4>Lotan Jopon</h4>
                        <h5>Admin</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="tab-content">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src="assets/img/product-details/product-detalis-l1.jpg" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l2.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l3.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l4.jpg" alt="">
                            </div>
                        </div>
                        <div class="product-thumbnail">
                            <div class="thumb-menu owl-carousel nav nav-style" role="tablist">
                                <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/img/product-details/product-detalis-s1.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-2"><img src="assets/img/product-details/product-detalis-s2.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-3"><img src="assets/img/product-details/product-detalis-s3.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-4"><img src="assets/img/product-details/product-detalis-s4.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="modal-pro-content">
                            <h3>Dutchman's Breeches </h3>
                            <div class="product-price-wrapper">
                                <span class="product-price-old">£162.00 </span>
                                <span>£120.00</span>
                            </div>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>
                            <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value="">L</option>
                                    </select>
                                </div>
                                <div class="quickview-color-wrap">
                                    <label>Color*</label>
                                    <div class="quickview-color">
                                        <ul>
                                            <li class="blue">b</li>
                                            <li class="red">r</li>
                                            <li class="pink">p</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-quantity">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                </div>
                                <button>Add to cart</button>
                            </div>
                            <span><i class="fa fa-check"></i> In stock</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "layouts/footer.php";
include "layouts/scripts.php";
?>