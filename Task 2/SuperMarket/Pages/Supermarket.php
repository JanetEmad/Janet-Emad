<?php
$result = "";
$result2 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST) {
    $result .= "<div class='result'>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                    <div class='form-group '>";
                    $result.="
        <table class='table'>
  <thead>
    <tr>
      <th scope='col'>Product Name</th>
      <th scope='col'>Product Price</th>
      <th scope='col'>Product Quantity</th>
    </tr>
  </thead>
  <tbody>";
    for ($i = 0; $i < $_POST["products"]; $i++) {
        $result .="
    <tr>
      <td><input type='text' name='productName'></div> <br></td>
      <td><input type='number' name='productPrice'></div> <br></td>
      <td><input type='number' name='productQuantity'></div> <br></td>
    </tr>
  ";
        // $result.="<div class='product'><label class='my-3' for='productName'>Product Name</label>";
        // $result .= "<input type='text' name='productName'></div> <br>";
        // $result.="<div class='product'><label class='my-3' for='productPrice'>Product Price</label>";
        // $result .= "<input type='number' name='productPrice'></div> <br>";
        // $result.="<div class='product'><label class='my-3' for='productQuantity'>Product Quantity</label>";
        // $result .= "<input type='number' name='productQuantity'></div> <br><hr>";
    }
    $result.="</tbody>
    </table><button class='form-control my-5 button w-50'>Receipt</button></div></div></div></div></div>";
}

// if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST) {
//     $result2.="<table class='table'>
//     <tbody>";
//     $result2.="<tr><td>Client Name</td><td>".$_POST["name"]."</td></tr>";
//     $result2.="<tr><td>City</td><td>".$_POST["city"]."</td></tr>";
//     for ($i = 0; $i < $_POST["products"]; $i++) {
//         for ($i = 0; $i < $_POST["productQuantity"]; $i++) {  
//             $totalPrice+=$_POST["productPrice"];
//         } 
//     }
//     $result2.="<tr><td>Total</td><td>".$totalPrice."</td></tr>";
//     if($totalPrice<1000){
//         $discount=0;
//     }
//     else if($totalPrice<3000){
//         $discount=(10/100)*$totalPrice;
//     }
//     else if($totalPrice<4500){
//         $discount=(15/100)*$totalPrice;
//     }
//     else if($totalPrice>4500){
//         $discount=(20/100)*$totalPrice;
//     }
//     $result2.="<tr><td>Discount</td><td>".$discount."</td></tr>";
//     $result2.="<tr><td>Total after Discount</td><td>".$totalPrice-$discount."</td></tr>";
//     if($_POST["city"]=="Cairo"){
//         $delivery=0;
//     }
//     else if($_POST["city"]=="Giza"){
//         $delivery=30;
//     }
//     else if($_POST["city"]=="Alex"){
//         $delivery=50;
//     }
//     else {
//         $delivery=100;
//     }
//     $result2.="<tr><td>Delivery</td><td>".$delivery."</td></tr>";
//     $result2.="<tr><td>Net Total</td><td>".$delivery+$totalPrice-$discount."</td></tr>";
// }
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../Css/style.css">
</head>

<body>

    <div class="fullPage">
        <nav class="navbar">
            <div class="container">
                <div class="left">
                    <span><i class="ri-shopping-bag-line"></i></span>
                    <h1>Super Market</h1>
                </div>
                <div class=" right" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Shopping Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="form">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <form action="" method="post">
                                <label class="my-3" for="name">User Name</label>
                                <input class="form-control my-3" type="text" name="name" placeholder="Enter Your Name..." value="<?= empty($_POST["name"]) ? "" : $_POST["name"] ?>">
                                <label class="my-3" for="city">City</label>
                                <!-- <input class="form-control my-3" type="select" name="city" placeholder="Choose the City..." value="<?= empty($_POST["city"]) ? "" : $_POST["city"] ?>"> -->
                                <select class="form-control" name="city" id="first">
                                    <option value="one">Country</option>
                                    <option value="Cairo">Cairo</option>
                                    <option value="Giza">Giza</option>
                                    <option value="Alex">Alex</option>
                                    <option value="Other">Other</option>
                                </select>
                                <label class="my-3" for="products">Number of Products</label>
                                <input class="form-control my-3" type="number" name="products" placeholder="Enter the Number of Products..." value="<?= empty($_POST["products"]) ? "" : $_POST["products"] ?>">
                                <button class="form-control my-5 button w-50">Submit</button>
                                <!-- <?= empty($result) ? " " : $result; ?> -->
                                <!-- <?= empty($result2) ? " " : $result2; ?> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= empty($result) ? " " : $result; ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>