<?php
$result = "";
$result2 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && $_POST["submit"] == "Submit") {
    $result .= "
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
        $result .= "
    <tr>
        <td><input type='text' name='productName{$i}'> </td>
        <td><input type='number' name='productPrice{$i}'> </td>
        <td><input type='number' name='productQuantity{$i}'> </td>
    </tr>";
    }
    $result .= "</tbody>
    </table><button class='form-control my-5 button w-50' name='receipt' value='Receipt'>Receipt</button>";
}
$totalPrice = 0;
$productNames = array();
$productPrices = array();
$productQuantitys = array();
$productSubTotals = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["receipt"])) {
    if ($_POST["receipt"] == "Receipt") {
        $result2 .= "<table class='table x'>
            <thead>
                <tr>
                    <th scope='col'>Product Name</th>
                    <th scope='col'>Price</th>
                    <th scope='col'>Quantities</th>
                    <th scope='col'>Sub Total</th>
                </tr>
            </thead>
            <tbody>";
        for ($i = 0; $i < $_POST["products"]; $i++) {
            array_push($productNames, $_POST['productName' . $i]);
            array_push($productPrices, $_POST['productPrice' . $i]);
            array_push($productQuantitys, $_POST['productQuantity' . $i]);
            array_push($productSubTotals, ($_POST['productQuantity' . $i] * $_POST['productPrice' . $i]));
        }
        for ($i = 0; $i < $_POST["products"]; $i++) {
            $result2 .= "
        <tr>
            <td ><input class='col-11' type='text' name='productName{$i}' value='$productNames[$i]'></td>
            <td ><input class='col-11' type='number' name='productPrice{$i}' value='$productPrices[$i]'></td>
            <td ><input class='col-11' type='number' name='productQuantity{$i}' value='$productQuantitys[$i]'></td>
            <td ><input class='col-11' type='number' name='productSubTotal{$i}' value='$productSubTotals[$i]'><br></td>
        </tr>";
        }
        $result2 .= "
            </tbody>
            </table><br><br><br>";

        $result2 .= "<table class='table'>
    <tbody>";
        $result2 .= "<tr><td>Client Name</td><td>" . $_POST["name"] . "</td></tr>";
        $result2 .= "<tr><td>City</td><td>" . $_POST["city"] . "</td></tr>";
        for ($i = 0; $i < $_POST["products"]; $i++) {
            for ($j = 0; $j < $_POST["productQuantity{$i}"]; $j++) {
                $totalPrice += $_POST["productPrice{$i}"];
            }
        }
        $result2 .= "<tr><td>Total</td><td>" . $totalPrice . " EGP</td></tr>";
        if ($totalPrice < 1000) {
            $discount = 0;
        } else if ($totalPrice < 3000) {
            $discount = (10 / 100) * $totalPrice;
        } else if ($totalPrice < 4500) {
            $discount = (15 / 100) * $totalPrice;
        } else if ($totalPrice > 4500) {
            $discount = (20 / 100) * $totalPrice;
        }
        $result2 .= "<tr><td>Discount</td><td>" . $discount . " EGP</td></tr>";
        $result2 .= "<tr><td>Total after Discount</td><td>" . $totalPrice - $discount . " EGP</td></tr>";
        if ($_POST["city"] == "Cairo") {
            $delivery = 0;
        } else if ($_POST["city"] == "Giza") {
            $delivery = 30;
        } else if ($_POST["city"] == "Alex") {
            $delivery = 50;
        } else {
            $delivery = 100;
        }
        $result2 .= "<tr><td>Delivery</td><td>" . $delivery . " EGP</td></tr>";
        $result2 .= "<tr><td>Net Total</td><td>" . $delivery + $totalPrice - $discount . " EGP</td></tr>";
    }
}


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
                    <div class="col-12">
                        <div class="form-group">
                            <form action="" method="post">
                                <label class="my-3" for="name">User Name</label>
                                <input class="form-control my-3" type="text" name="name" placeholder="Enter Your Name..." value="<?= empty($_POST["name"]) ? "" : $_POST["name"] ?>">
                                <label class="my-3" for="city">City</label>
                                <!-- <input class="form-control my-3" type="select" name="city" placeholder="Choose the City..."> -->
                                <select class="form-control" name="city" id="first">
                                    <option value="" disabled selected>Country</option>
                                    <option <?php if (isset($_POST["city"]) && $_POST["city"] == "Cairo") { ?>selected="true" <?php }; ?> value="Cairo">Cairo</option>
                                    <option <?php if (isset($_POST["city"]) && $_POST["city"] == "Giza") { ?>selected="true" <?php }; ?> value="Giza">Giza</option>
                                    <option <?php if (isset($_POST["city"]) && $_POST["city"] == "Alex") { ?>selected="true" <?php }; ?> value="Alex">Alex</option>
                                    <option <?php if (isset($_POST["city"]) && $_POST["city"] == "Other") { ?>selected="true" <?php }; ?> value="Other">Other</option>
                                </select>
                                <label class="my-3" for="products">Number of Products</label>
                                <input class="form-control my-3" type="number" name="products" placeholder="Enter the Number of Products..." value="<?= empty($_POST["products"]) ? "" : $_POST["products"] ?>">
                                <button class="form-control my-5 button w-50" name="submit" value="Submit">Submit</button>
                                <?= empty($result) ? " " : $result; ?>

                                <?= empty($result2) ? " " : $result2; ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>