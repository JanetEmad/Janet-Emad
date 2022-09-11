<?php
include("../Layouts/Header.php");
$flag = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST) {
    for ($i = 1; $i < 6; $i++) {
        if (empty($_POST["option" . $i])) {
            $flag = 0;
            break;
        } else {
            $flag = 1;
        }
    }
    if ($flag == 0) {
        header('location:Review.php');
        die;
    } else {
        $result = 0;
        $evaluation=array();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST) {
            for ($i = 1; $i < 6; $i++) {
                if ($_POST["option" . $i] == "bad") {
                    $result += 0;
                    array_push($evaluation,"Bad");
                }
                if ($_POST["option" . $i] == "good") {
                    $result += 3;
                    array_push($evaluation,"Good");
                }
                if ($_POST["option" . $i] == "veryGood") {
                    $result += 5;
                    array_push($evaluation,"Very Good");
                }
                if ($_POST["option" . $i] == "excellent") {
                    $result += 10;
                    array_push($evaluation,"Excellent");
                }
            }
        }
        $_SESSION['result'] = $result;
        $_SESSION['evaluation'] = $evaluation;
        header('location:Result.php');
    }
}
?>
<div class="fullPage">
    <?php include("../Layouts/Navbar.php"); ?>
    <div class="form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <form action="" method="post">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col">Bad</th>
                                        <th scope="col">Good</th>
                                        <th scope="col">Very Good</th>
                                        <th scope="col">Excellent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Are you satisfied with the level of hygiene?</th>
                                        <td><input type="radio" name="option1"  value="bad"></td>
                                        <td><input type="radio" name="option1"  value="good"></td>
                                        <td><input type="radio" name="option1"  value="veryGood"></td>
                                        <td><input type="radio" name="option1"  value="excellent"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Are you satisfied with the price of services?</th>
                                        <td><input type="radio" name="option2"  value="bad"></td>
                                        <td><input type="radio" name="option2"  value="good"></td>
                                        <td><input type="radio" name="option2"  value="veryGood"></td>
                                        <td><input type="radio" name="option2"  value="excellent"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Are you satisfied with the nursing service? </th>
                                        <td><input type="radio" name="option3"  value="bad"></td>
                                        <td><input type="radio" name="option3"  value="good"></td>
                                        <td><input type="radio" name="option3"  value="veryGood"></td>
                                        <td><input type="radio" name="option3"  value="excellent"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Are you satisfied with the level of the doctors? </th>
                                        <td><input type="radio" name="option4"  value="bad"></td>
                                        <td><input type="radio" name="option4"  value="good"></td>
                                        <td><input type="radio" name="option4"  value="veryGood"></td>
                                        <td><input type="radio" name="option4"  value="excellent"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Are you satisfied with the calmness in the hospital? </th>
                                        <td><input type="radio" name="option5"  value="bad"></td>
                                        <td><input type="radio" name="option5"  value="good"></td>
                                        <td><input type="radio" name="option5"  value="veryGood"></td>
                                        <td><input type="radio" name="option5"  value="excellent"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="form-control  btn btn-primary w-50">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="result">
    <?= ($result == "") ? " " : $result; ?>
    </div> -->
</div>


<?php
include("../Layouts/Scripts.php");
?>