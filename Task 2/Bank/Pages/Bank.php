<?php
$result = "";
function interest($years)
{
    if ($years <= 3) {
        define("INTEREST", 10);
    } else {
        define("INTEREST", 15);
    }
    return INTEREST;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST) {
    if (!empty($_POST["name"]) && !empty($_POST["loan"]) && !empty($_POST["years"])) {
        $result .= "<div class='result'>
        <div class='container'>
            <div class='row'>
                <div class='col-8'>
                    <div class='form-group'>";
        $result .= "<table class='table'>
            <thead>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>Information</th>
              </tr>
            </thead>
            <tbody>";
        $result .= "<tr><td>User Name</td><td>";
        $result .= $_POST["name"] . "</td></tr>";
        $result .= "<tr><td>Interest Rate</td>";
        $interestRate = (($_POST["loan"] * interest($_POST["years"])) / 100) * $_POST["years"];
        $result .= "<td>" . $interestRate . " EGP</td>";
        $result .= "</tr></td>";
        $result .= "<tr><td>Loan After Interest</td>
        <td>" . $_POST["loan"] + $interestRate . " EGP</td></tr>";
        $result .= "<tr><td>Number of Years</td>
        <td>" . $_POST["years"] . "</td></tr>";
        if ($_POST["years"] <= 3) {
            $rate = "10%";
            $numericRate = 10;
        } else {
            $rate = "15%";
            $numericRate = 15;
        }
        $result .= "<tr><td>Rate of Interest per Year</td>
        <td>" . $rate . "</td></tr>";
        $result .= "<tr><td>The Monthly Installement</td>
        <td>" . ((($_POST["loan"] * $numericRate) / 100) / 12) + ($_POST["loan"] / (12 * $_POST["years"])) . " EGP</td></tr>";
        $result .= "</tbody>
            </table>";
        $result .= "</div>
            </div>
        </div>
    </div>
</div>";
    } else {
        header('location:Bank.php');
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
                    <span><i class="ri-bank-line"></i></span>
                    <h1>Bank</h1>
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
                            <a class="nav-link" href="#">Wallets</a>
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
                                <label class="my-3" for="name">Name</label>
                                <input class="form-control my-3" type="text" name="name" placeholder="Enter Your Name..." value="<?= empty($_POST["name"]) ? "" : $_POST["name"] ?>">
                                <label class="my-3" for="loan">Loan</label>
                                <input class="form-control my-3" type="number" name="loan" placeholder="Enter the Loan..." value="<?= empty($_POST["loan"]) ? "" : $_POST["loan"] ?>">
                                <label class="my-3" for="years">Number of Years</label>
                                <input class="form-control my-3" type="number" name="years" placeholder="Enter the Number of Years..." value="<?= empty($_POST["years"]) ? "" : $_POST["years"] ?>">
                                <button class="form-control my-5 btn btn-primary w-50">Submit</button>
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