<?php
$result = "";
include("../Layouts/Header.php");
$memberGames = array();
$memberNames = array();
for ($i = 0; $i < $_SESSION["members"]; $i++) {
    $games = array();
    $result .= "<div class='form-check'>
    <h1>Member " . ($i + 1) . "<h1>
    <input class='form-control my-3' type='text' name='memberName{$i}'  placeholder='Member Name'>
    <input class='form-check-input' type='checkbox' name='football{$i}' value='football' id='Football{$i}'>
    <label class='form-check-label' for='Football{$i}'>Footbal 300 LE</label>
<br>
    <input class='form-check-input' type='checkbox' name='swimming{$i}' value='swimming' id='Swimming{$i}'>
    <label class='form-check-label' for='Swimming{$i}'>Swimming 250 LE</label>
<br>
    <input class='form-check-input' type='checkbox' name='volleyball{$i}' value='volleyball' id='Volleyball{$i}'>
    <label class='form-check-label' for='Volleyball{$i}'>Volleyball 150 LE</label>
<br>
    <input class='form-check-input' type='checkbox' name='others{$i}' value='others' id='Others{$i}'>
    <label class='form-check-label' for='Others{$i}'>Others 100 LE</label>
    </div> <hr><br>";
    if (isset($_POST['football' . $i])) {
        array_push($games, $_POST['football' . $i]);
    }
    if (isset($_POST['swimming' . $i])) {
        array_push($games, $_POST['swimming' . $i]);
    }
    if (isset($_POST['volleyball' . $i])) {
        array_push($games, $_POST['volleyball' . $i]);
    }
    if (isset($_POST['others' . $i])) {
        array_push($games, $_POST['others' . $i]);
    }
    array_push($memberGames, $games);
    unset($games);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST) {
    $flag = 0;
    for ($i = 0; $i < $_SESSION["members"]; $i++) {
        if (!empty($_POST['memberName' . $i])) {
            array_push($memberNames, $_POST['memberName' . $i]);
            $flag = 1;
        } else {
            $flag = 0;
        }
    }
    if ($flag == 1) {
        $_SESSION['memberGames'] = $memberGames;
        $_SESSION['memberNames'] = $memberNames;
        header('location:Result.php');
        die;
    } else {
        header('location:Games.php');
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
                            <?= ($result == "") ? " " : $result; ?>
                            <button class="form-control my-5 btn check_btn w-50">Check Price</button>
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