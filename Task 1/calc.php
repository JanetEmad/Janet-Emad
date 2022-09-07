<?php
$result="";
if ($_SERVER["REQUEST_METHOD"] == 'POST' && $_POST) {
    if ($_POST["operation"] == "+") {
        $result = $_POST["first_number"] + $_POST["second_number"];
    } elseif ($_POST["operation"] == "-") {
        $result = $_POST["first_number"] - $_POST["second_number"];
    } elseif ($_POST["operation"] == "*") {
        $result = $_POST["first_number"] * $_POST["second_number"];
    } elseif($_POST["operation"] == "/") {
        $result = $_POST["first_number"] / $_POST["second_number"];
    }
    else {
        $result = $_POST["first_number"] % $_POST["second_number"];
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
    <style>
        .result {
            text-align: center;
            padding: 10px;
            font-size: 20px;
        }

        .operations {
            display: flex;
            justify-content: space-evenly;
            margin-top: 35px;
        }

        .operations label {
            background-color: #69d669;
            width: 16%;
            align-items: center;
            justify-content: center;
            display: flex;
            height: 50px;
            font-size: 24px;
            border-radius: 20px;
            cursor: pointer;
            
        }

        .operations label:hover{
            background-color: green;
            color: white;
        }

        input{
            appearance: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-success my-5">
                <h1>Simple Calculator</h1>
            </div>
            <div class="col-4 offset-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="first_number">First Number</label>
                        <input class="form-control my-3" type="number" id="first_number" name="first_number" placeholder="First Number">
                        <label for="second_number">Second Number</label>
                        <input class="form-control my=3" type="number" id="second_number" name="second_number" placeholder="Second Number">
                    </div>
                    <div class="form-group operations">
                        <input class="alert-success" type="radio" id="plus" name="operation" value="+">
                        <label for="plus">+</label>
                        <input class="alert-success" type="radio" id="minus" name="operation" value="-">
                        <label for="minus">-</label>
                        <input class="alert-success" type="radio" id="multiply" name="operation" value="*">
                        <label for="multiply">*</label>
                        <input class="alert-success" type="radio" id="divide" name="operation" value="/">
                        <label for="divide">/</label>
                        <input class="alert-success" type="radio" id="modulus" name="operation" value="%">
                        <label for="modulus">%</label>
                    </div>
                    <button class=" btn btn-outline-success form-control  my-3 ">Calculate </button>
                    <?php
                    $result = ($result=="") ? " " : "<div class='result alert-success'>The Result is $result</div>";
                    echo $result; ?>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        for(let op of document.querySelectorAll(".operations label")){
            op.onclick=function(){
                op.style.cssText="color:white; background-color:green;";
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>