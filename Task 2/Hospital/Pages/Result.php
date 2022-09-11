<?php
include("../Layouts/Header.php");
$FinalEvaluation = "";
if ($_SESSION["result"] < 25) {
    $totalReview="Bad";
    $FinalEvaluation .= "We will call you later on this phone  " . $_SESSION["number"] . " to be able to make the service better for you";
} else {
    $totalReview="Good";
    $FinalEvaluation .= "Thank you For Your Time.";
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
                                        <th scope="col">Evaluation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Are you satisfied with the level of hygiene?</th>
                                        <?php $result = "";
                                        $result .= "<td>";
                                        $result .= $_SESSION["evaluation"][0];
                                        $result .= "</td>";
                                        echo $result; ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Are you satisfied with the price of services?</th>
                                        <?php $result = "";
                                        $result .= "<td>";
                                        $result .= $_SESSION["evaluation"][1];
                                        $result .= "</td>";
                                        echo $result; ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Are you satisfied with the nursing service? </th>
                                        <?php $result = "";
                                        $result .= "<td>";
                                        $result .= $_SESSION["evaluation"][2];
                                        $result .= "</td>";
                                        echo $result; ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Are you satisfied with the level of the doctors? </th>
                                        <?php $result = "";
                                        $result .= "<td>";
                                        $result .= $_SESSION["evaluation"][3];
                                        $result .= "</td>";
                                        echo $result; ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Are you satisfied with the calmness in the hospital? </th>
                                        <?php $result = "";
                                        $result .= "<td>";
                                        $result .= $_SESSION["evaluation"][4];
                                        $result .= "</td>";
                                        echo $result; ?>
                                    </tr>
                                    <?php
                                    if($totalReview=="Good"){
                                        $result="";
                                        $result.="<tr class='alert alert-success' >";
                                    }else{
                                        $result="";
                                        $result.="<tr class='alert alert-danger' >";
                                    }   
                                        $result.="<th scope='row'>TOTAL REVIEW </th>";
                                        $result .= "<td>";
                                        $result .= $totalReview;
                                        $result .= "</td>";
                                        echo $result; ?>
                                    <?="</tr>"?>
                                </tbody>
                            </table>
                            <div class="result form-control">
                                <?= ($FinalEvaluation == "") ? " " : $FinalEvaluation; ?>
                            </div>
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