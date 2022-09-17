<?php
include("../Layouts/Header.php");
$result = "";
define("gamesNumber", 4);
define("subscriptionCost", 10000);
define("memberSubscriptionCost", 2500);
$footballClub = 0;
$swimmingClub = 0;
$volleyballClub = 0;
$othersClub = 0;
$totalPrice = 0;

$result .= "<table class='table'>
<thead class='thead-dark'>
  <tr >
    <th >Subscriber</th>
    <th colspan='6'>" . $_SESSION['name'] . "</th>
  </tr>
</thead>
<tbody>";
for ($i = 0; $i < count($_SESSION['memberNames']); $i++) {
    $totalPriceForMember = 0;
    $result .= "<tr>
    <td >" . $_SESSION['memberNames'][$i] . "</td>";
    for ($j = 0; $j < gamesNumber; $j++) {
        $result .= "<td >"
?>
        <?php
        $result .= isset($_SESSION['memberGames'][$i][$j]) ? $_SESSION['memberGames'][$i][$j] : " ";
        ?>
<?php
        $result .= "</td>";
        if (isset($_SESSION['memberGames'][$i][$j])) {
            if ($_SESSION['memberGames'][$i][$j] == 'football') {
                $footballClub += 300;
                $totalPriceForMember += 300;
            }
            if ($_SESSION['memberGames'][$i][$j] == 'swimming') {
                $swimmingClub += 250;
                $totalPriceForMember += 250;
            }
            if ($_SESSION['memberGames'][$i][$j] == 'volleyball') {
                $volleyballClub += 150;
                $totalPriceForMember += 150;
            }
            if ($_SESSION['memberGames'][$i][$j] == 'others') {
                $othersClub += 100;
                $totalPriceForMember += 100;
            }
        }
    }
    $totalPrice += $totalPriceForMember;
    $result .= "<td >";
    $result .= $totalPriceForMember . " EGP";
    $result .= "</td>";
    $result .= "</tr>";
}
$result .= "<tr class='dark'><td colspan='5'>Total Price</td><td >$totalPrice EGP</td></tr>";
$result .= "<tr class='dark'><td class='sports' colspan='6'>SPORTS</td> </tr>";
$result .= "<tr class='dark'><td colspan='5'>Football Club</td><td>$footballClub EGP</td></tr>";
$result .= "<tr class='dark'><td colspan='5'>Swimming Club</td><td>$swimmingClub EGP</td></tr>";
$result .= "<tr class='dark'><td colspan='5'>Volleyball Club</td><td>$volleyballClub EGP</td></tr>";
$result .= "<tr class='dark'><td colspan='5'>Others Club</td><td>$othersClub EGP</td></tr>";
$result .= "<tr class='dark'><td colspan='5'>Club subscription</td><td>" . (subscriptionCost + ($_SESSION['members'] * memberSubscriptionCost)) . " EGP</td></tr>";
$result .= "<tr class='dark'><td colspan='5'>Total Amount </td><td>" . (subscriptionCost + ($_SESSION['members'] * memberSubscriptionCost)) + $totalPrice . " EGP</td></tr>";
$result .= "</tbody></table>";
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