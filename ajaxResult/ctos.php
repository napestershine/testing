<?php
/**
 * Created by PhpStorm.
 * User: Shinedoss.com
 * Date: 12/4/2015
 * Time: 12:59 PM
 */

/**
 * Connection file call
 */
include_once("../inc/connect.php");
include_once("../functions.php");

/*** variables ***/
if (!empty($_GET['country']) && $_GET['country'] > 0) {
    $country = trim($_GET['country']);
}

if (isset($country)) {
    $country = test_input($country);
}

?>
    <option value="0">-- Select State --</option>
<?php

$checkQuery = "SELECT `id`, `state` FROM `states` WHERE `countryId`=:country";
$checkStmt = $pdo->prepare($checkQuery);
$checkStmt->bindParam(':country', $country, PDO::PARAM_INT);
$checkStmt->execute();
if ($checkStmt->rowCount() > 0) {
    while ($row = $checkStmt->fetchObject()) {
        ?>
        <option
            value="<?php echo $row->id; ?>"><?php echo $row->state; ?></option>
        <?php
    }
}

?>