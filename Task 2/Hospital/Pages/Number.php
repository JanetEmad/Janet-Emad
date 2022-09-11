<?php
include("../Layouts/Header.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST) {
    if (!empty($_POST["number"])) {
        $_SESSION['number'] = $_POST["number"];
        header('location:Review.php');
        die;
    }
}
?>
<div class="fullPage">
    <?php include("../Layouts/Navbar.php"); ?>
    <div class="form">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <form action="" method="post">
                            <label class="my-3" for="number">Number</label>
                            <input class="form-control my-3" type="number" name="number" placeholder="Enter Your Number">
                            <button class="form-control my-5 btn btn-primary w-50">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("../Layouts/Scripts.php");
?>