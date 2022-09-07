<?php
define("maxGrade",100);
if ($_SERVER["REQUEST_METHOD"] == 'POST' && $_POST) {
    $all = $_POST["first_grade"] + $_POST["second_grade"] + $_POST["third_grade"] + $_POST["fourth_grade"] + $_POST["fifth_grade"];
    $percentage = ($all / (maxGrade*5)) * 100;
    if ($percentage >= 90) {
        $grade = "A";
    } elseif ($percentage >= 80) {
        $grade = "B";
    } elseif ($percentage >= 70) {
        $grade = "C";
    } elseif ($percentage >= 60) {
        $grade = "D";
    } elseif ($percentage >= 40) {
        $grade = "E";
    } else {
        $grade = "F";
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
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-success my-5">
                <h1>Grade and Percentage Calculator</h1>
            </div>
            <div class="col-4 offset-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="first_grade">Physics</label>
                        <input class="form-control my-3" type="number" id="first_grade" name="first_grade" placeholder="">
                        <label for="second_grade">Chemistry</label>
                        <input class="form-control my=3" type="number" id="second_grade" name="second_grade" placeholder="">
                        <label for="third_grade">Biology</label>
                        <input class="form-control my-3" type="number" id="third_grade" name="third_grade" placeholder="">
                        <label for="fourth_grade">Mathematics</label>
                        <input class="form-control my-3" type="number" id="fourth_grade" name="fourth_grade" placeholder="">
                        <label for="fifth_grade">Computer</label>
                        <input class="form-control my-3" type="number" id="fifth_grade" name="fifth_grade" placeholder="">
                    </div>
                    <button class=" btn btn-outline-success form-control  my-3 ">View the Grade </button>
                    <?= empty($percentage) ?" ":"<div class='result alert-success'>The Percentage is $percentage%</div>"; ?>
                    <?= empty($grade) ?" ":"<div class='result alert-success'>The Grade is $grade</div>";?>
                    
                </form>
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