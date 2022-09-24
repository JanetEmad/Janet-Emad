<?php

use App\Database\Models\User;
use App\Services\Media;
use App\Http\Requests\Validation;


$pageName = "MY ACCOUNT";
include "layouts/header.php";
include "App/Http/Middlewares/Auth.php";
if (isset($_POST['update-image'])) {
    if ($_FILES['image']['error'] == 0) {
        $media = new Media;
        $media->setFile($_FILES['image']);
        $media->size(1024 ** 2)->extension(['png', 'jpg', 'jpeg']);
        if (empty($media->getErrors())) {
            if ($media->upload('assets/img/users/')) {
                if ($_SESSION['user']->image != 'default.jpg') {
                    $media->delete('assets/img/users/' . $_SESSION['user']->image);
                }
                $user = new User;
                $user->setImage($media->getFileName())->setEmail($_SESSION['user']->email);
                if ($user->updateImage()) {
                    $_SESSION['user']->image = $media->getFileName();
                }
            }
        }
    }
}
$validation = new Validation;
if (isset($_POST['update_info'])) {
    $validation->setValue($_POST['first_name'] ?? "")->setValueName('first name')
        ->required()->between(2, 32);
    $validation->setValue($_POST['last_name'] ?? "")->setValueName('last name')
        ->required()->between(2, 32);
    $validation->setValue($_POST['gender'] ?? "")->setValueName('gender')
        ->required()->in(['m', 'f']);
    if (empty($validation->getErrors())) {
        $user = new User;
        $user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])
            ->setGender($_POST['gender'])->setEmail($_SESSION['user']->email);
        if ($user->updateInformation()) {
            $_SESSION['user']->first_name = $_POST['first_name'];
            $_SESSION['user']->last_name = $_POST['last_name'];
            $_SESSION['user']->gender = $_POST['gender'];
        }
    }
}

if (isset($_POST['update_password'])) {
    $validation->setValue($_POST['oldPassword'] ?? "")->setValueName('password')
        ->required();
    $validation->setValue($_POST['Password'] ?? "")->setValueName('Newpassword')
        ->required()
        ->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/', "Minimum 8 and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character")
        ->confirmed($_POST['confirmPassword']);
    $validation->setValue($_POST['confirmPassword'] ?? "")->setValueName('Confirm Password')
        ->required();
    if (empty($validation->getErrors())) {
        $user = new User;
        $databaseResult = $user->setEmail($_SESSION['user']->email)->get();
        if ($databaseResult->num_rows == 1) {
            $databaseUser = $databaseResult->fetch_object();
            if (password_verify($_POST['oldPassword'], $databaseUser->password)) {
                if (empty($validation->getErrors())) {
                    $user->setPassword($_POST['Password']);
                    if ($user->updatePassword()) {
                        $_SESSION['user']->password = $user->getPassword();
                    }
                }
            }
        }
    }
}
include "layouts/navbar.php";
include "layouts/breadcrumb.php";

?>
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="row">
                                            <div class="col-4 offset-4">
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <?php
                                                    if ($_SESSION['user']->image == 'default.jpg') {
                                                        if ($_SESSION['user']->gender == 'm') {
                                                            $image = 'male.png';
                                                        } else {
                                                            $image = 'female.png';
                                                        }
                                                    } else {
                                                        $image = $_SESSION['user']->image;
                                                    }
                                                    ?>
                                                    <label for="file">
                                                        <img class="w-100 rounded-circle" style="cursor:pointer" id="image" src="assets/img/users/<?= $image ?>" alt="">
                                                    </label>
                                                    <input type="file" onchange="loadFile(event)" name="image" id="file" class="d-none form-control">
                                                    <button name="update-image" style="cursor:pointer" class="btn btn-success rounded form-control"><i class="fa fa-camera" aria-hidden="true"></i></button>
                                                    <?php
                                                    if (isset($media)) {
                                                        foreach ($media->getErrors() as $errorType => $error) {
                                                            echo $media->getMessage($errorType);
                                                        }
                                                    }
                                                    ?>
                                                </form>
                                            </div>
                                        </div>
                                        <form action="my-account.php" method="post">
                                            <div class="account-info-wrapper">
                                                <h4>My Account Information</h4>
                                                <h5>Your Personal Details</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name" value="<?= $_SESSION['user']->first_name ?>">
                                                    </div>
                                                    <?= $validation->getMessage('first name') ?? "" ?>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" value="<?= $_SESSION['user']->last_name ?>">
                                                    </div>
                                                    <?= $validation->getMessage('last name') ?? "" ?>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Gender</label>
                                                        <select name="gender" id="" class="form-control">
                                                            <option <?= $_SESSION['user']->gender == 'm' ? 'selected' : '' ?> value="m">Male</option>
                                                            <option <?= $_SESSION['user']->gender == 'f' ? 'selected' : '' ?> value="f">Female</option>
                                                        </select>
                                                    </div>
                                                    <?= $validation->getMessage('gender') ?? "" ?>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button name="update_info" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <form action="" method="post">
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>Change Password</h4>
                                                <h5>Your Password</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Old Password</label>
                                                        <input name="oldPassword" type="password">
                                                    </div>
                                                    <?= $validation->getMessage('password') ?? "" ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password</label>
                                                        <input name="Password" type="password">
                                                    </div>
                                                    <?= $validation->getMessage('Newpassword') ?? "" ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Confirm Password</label>
                                                        <input name="confirmPassword" type="password">
                                                    </div>
                                                    <?= $validation->getMessage('Confirm Password') ?? "" ?>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button name="update_password" type="submit">
                                                        Continue
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your address book entries </a></h5>
                        </div>
                        <div id="my-account-3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="billing-information-wrapper">
                                    <div class="account-info-wrapper">
                                        <h4>Address Book Entries</h4>
                                    </div>
                                    <div class="entries-wrapper">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                <div class="entries-info text-center">
                                                    <p>Farhana hayder (shuvo) </p>
                                                    <p>hastech </p>
                                                    <p> Road#1 , Block#c </p>
                                                    <p> Rampura. </p>
                                                    <p>Dhaka </p>
                                                    <p>Bangladesh </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                <div class="entries-edit-delete text-center">
                                                    <a class="edit" href="#">Edit</a>
                                                    <a href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="billing-back-btn">
                                        <div class="billing-back">
                                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                        </div>
                                        <div class="billing-btn">
                                            <button type="submit">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title"><span>4</span> <a href="wishlist.php">Modify your wish list
                                </a></h5>
                        </div>
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
<script>
    var loadFile = function(event) {
        var output = document.getElementById('image');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    };
</script>