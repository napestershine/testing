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
if (!empty($_GET['catOneId']) && $_GET['catOneId'] > 0) {
    $catOneId = trim($_GET['catOneId']);
}

if (isset($catOneId)) {
    $catOneId = test_input($catOneId);
}

?>
    <option value="0">-- Select Category Two --</option>
<?php

$checkQuery = "SELECT `id`, `cattwoname` FROM `cattwo` WHERE `catone_id`=:catOneId";
$checkStmt = $pdo->prepare($checkQuery);
$checkStmt->bindParam(':catOneId', $catOneId, PDO::PARAM_INT);
$checkStmt->execute();
if ($checkStmt->rowCount() > 0) {
    while ($row = $checkStmt->fetchObject()) {
        ?>
        <option
            value="<?php echo $row->id; ?>"><?php echo $row->cattwoname; ?></option>
        <?php
    }
}

?>