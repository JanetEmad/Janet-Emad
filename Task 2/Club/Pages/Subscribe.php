<?php
include("../Layouts/Header.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST) {
    if (!empty($_POST["name"] && !empty($_POST["members"]))) {
        $_SESSION['name'] = $_POST["name"];
        $_SESSION['members'] = $_POST["members"];
        header('location:Games.php');
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
                            <label class="my-3" for="name">Member Name</label>
                            <input class="form-control my-3" type="text" name="name" placeholder="Enter your name">
                            <p class="disabled">Club subscription starts with 10.000 LE</p>
                            <label class="my-3" for="members">Count of family members</label>
                            <input class="form-control my-3" type="number" name="members" placeholder="Enter the number of members">
                            <p class="disabled">Cost of each member is 2.500 LE</p>
                            <button class="form-control my-5 btn subscribe_btn w-50">subscribe</button>
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