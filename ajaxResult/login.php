<?php
include_once("../inc/connect.php");
include_once("../functions.php");

/**
 * Error array to store the errors
 */

$errors = array();

/*** variables ***/
if (!empty($_POST['emailLogin'])) {
    $email = trim($_POST['emailLogin']);
} else {
    $errors[] = "You did not enter Email.";
}
if (isset($email)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
}
if (!empty($_POST['passLogin'])) {
    $pass = trim($_POST['passLogin']);
} else {
    $errors[] = "You did not enter Password.";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
        <?php
    }
} else {

    $checkQuery = "SELECT `userid`, `email`, `password`, `type`, `category` FROM `login` WHERE `email`='$email' LIMIT 1";
    $checkStmt = $pdo->prepare($checkQuery);
    $checkStmt->execute();
    if ($checkStmt->rowCount() > 0) {
        $row = $checkStmt->fetchObject();
        $pass2 = $row->password;
        if (isset($pass)) {
            if (!password_verify($pass, $pass2)) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "Your password is wrong"; ?>
                </div>
                <?php
            } else {
                // session_start();
                $type = $row->type;
                $table = $row->category;
                if ($type == 1) {
                    switch ($table) {
                        case '1':
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['message'] = "login";
                            $_SESSION['type'] = "buyer";
                            $_SESSION['userid'] = $userid;
                            break;
                        case '2':
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['message'] = "login";
                            $_SESSION['type'] = "supplier";
                            $_SESSION['userid'] = $userid;
                            break;
                        case '3':
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['message'] = "login";
                            $_SESSION['type'] = "sales_rep_com";
                            $_SESSION['userid'] = $userid;
                            break;
                        case '4':
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['message'] = "login";
                            $_SESSION['type'] = "sourcingAgent";
                            $_SESSION['userid'] = $userid;
                            break;
                        case '5':
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['message'] = "login";
                            $_SESSION['type'] = "qa";
                            $_SESSION['userid'] = $userid;
                            break;
                        case '6':
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['message'] = "login";
                            $_SESSION['type'] = "logistics";
                            $_SESSION['userid'] = $userid;
                            break;
                        case '7':
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['message'] = "login";
                            $_SESSION['type'] = "eventOrg";
                            break;
                        case '8':
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['message'] = "login";
                            $_SESSION['type'] = "cunsltOther";
                            $_SESSION['userid'] = $userid;
                            break;
                    }
                }
                if ($type == 2) {
                    // do something
                }
            }
        }
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo "This email is not registered."; ?>
        </div>
        <?php
    }
}

