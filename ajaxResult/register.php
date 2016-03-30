<?php
include_once("../inc/connect.php");
require_once '../vendor/swiftmailer/swiftmailer/lib/swift_required.php';
// Create the Transport
$transport = Swift_SmtpTransport::newInstance('localhost', 25)
    ->setUsername('shine@bizzort.com')
    ->setPassword('Shine@123#');

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST['v'])) {
    $v = $_POST['v'];
    $errors = array();
    if (!empty($_POST['fname'])) {
        $fname = $_POST['fname'];
    } else {
        $errors[] = "You did not enter first name";
    }

    if (!empty($_POST['lname'])) {
        $lname = $_POST['lname'];
    } else {
        $errors[] = "You did not enter last name";
    }

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];

    } else {
        $errors[] = "You did not enter email";
    }

    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errors[] = "You did not enter password";
    }

    if (!empty($_POST['password2'])) {
        $password2 = $_POST['password2'];
        if ($password === $password2) {
            $pass = password_hash($password, PASSWORD_BCRYPT);
        } else {
            $errors[] = "Your both passwords did not match";
        }
    } else {
        $errors[] = "You did not enter confirm password";
    }

    if (!empty($_POST['country'])) {
        $country = $_POST['country'];
    } else {
        $errors[] = "You did not select country";
    }

    if (!empty($_POST['state'])) {
        $state = $_POST['state'];
    } else {
        $errors[] = "You did not select state";
    }

    if (!empty($_POST['catOneId'])) {
        $catOneId = $_POST['catOneId'];
    } else {
        $errors[] = "You did not select product category";
    }

    if (!empty($_POST['catTwoId'])) {
        $catTwoId = $_POST['catTwoId'];
    } else {
        $errors[] = "You did not select Sub product category";
    }

    if (!empty($_POST['nl'])) {
        $nl = 1;
    } else {
        $nl = 0;
    }
    if ($v === "company") {
        if (isset($_POST['catOne'])) {
            $table = $_POST['catOne'];
            if ($table == 5) {
                if (isset($_POST['allVals'])) {
                    $allVals = $_POST['allVals'];
                } else {
                    $allVals = "";
                }
            }
            if (!empty($_POST['company'])) {
                $cname = $_POST['company'];
            } else {
                $errors[] = "You did not enter company name";
            }
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    ?>
                    <div class="alert-danger panel-danger">
                        <?php echo $error . " <br/><br/>"; ?>
                    </div>
                    <?php
                }
            } else {
                $v = 1;
                switch ($table) {
                    case '1':
                        $getAdmin = "SELECT `email` FROM `buyer` WHERE `email` = '$email'";
                        $query = $pdo->prepare($getAdmin);
                        $query->execute();
                        if ($query->rowCount() > 0) {
                            echo " Your email is already registered in our system. Please login";
                        } else {
                            $query = "INSERT INTO buyer(company, fname, lname, email, pass, country, state, catOneId, catTwoId, nl)
                              VALUES ('$cname', '$fname', '$lname', '$email', '$pass', $country, $state, $catOneId, $catTwoId, $nl)";
                            $checkStmt = $pdo->prepare($query);
                            $result = $checkStmt->execute();
                            $lastId = $pdo->lastInsertId();
                            if ($result) {
                                $lastId = $pdo->lastInsertId();
                                $lastIdQuery = "
                                START TRANSACTION;
                                INSERT INTO buyer_profile (cid) VALUES ($lastId);
                                INSERT INTO buyer_business (cid) VALUES ($lastId);
                                INSERT INTO buyer_homepage (cid) VALUES ($lastId);
                                INSERT INTO buyer_aboutus (cid) VALUES ($lastId);
                                commit;
                                ";
                                $lastIdStmt = $pdo->prepare($lastIdQuery);
                                $lastIdStmt->execute();
                                $query = "INSERT INTO login( `email`, `password`,`type`,`category`)
                              VALUES ( '$email', '$pass', $v, 1)";
                                $checkStmt = $pdo->prepare($query);
                                $checkStmt->execute();
                                $body = "Thank you for registration at Bizzort.com.<br/>
                                        Your loginn details are:<br/><br/>
                                        <strong>Email:</strong>&nbsp;" . $email . "<br />
                                        <strong>Password:</strong>&nbsp;" . $password;
                                // Create a message
                                $message = Swift_Message::newInstance('Registration at Bizzort')
                                    ->setFrom(array('admin@bizzort.com' => 'Bizzort Admin'))
                                    ->setTo(array($email))
                                    ->setBody($body, 'text/html');

                                // Send the message
                                $mailer->send($message);
                                session_start();
                                $_SESSION['email'] = $email;
                                $_SESSION['message'] = "register";
                                $_SESSION['type'] = "buyer";
                            } else {
                                echo "Your registration failed. Please try again later";
                            }
                        }
                        break;
                    case '2':
                        $getAdmin = "SELECT `email` FROM `supplier` WHERE `email` = '$email'";
                        $query = $pdo->prepare($getAdmin);
                        $query->execute();
                        if ($query->rowCount() > 0) {
                            echo " Your email is already registered in our system. Please login";
                        } else {
                            $query = "INSERT INTO supplier(company, fname, lname, email, pass, countryId, stateId, catOneId, catTwoId, nl)
                              VALUES ('$cname', '$fname', '$lname', '$email', '$pass', '$country', '$state', $catOneId, $catTwoId, $nl)";
                            $checkStmt = $pdo->prepare($query);
                            $result = $checkStmt->execute();
                            if ($result) {
                                $lastId = $pdo->lastInsertId();
                                $lastIdQuery = "
                                START TRANSACTION;
                                INSERT INTO supplier_profile (cid) VALUES ($lastId);
                                INSERT INTO supplier_business (cid) VALUES ($lastId);
                                INSERT INTO supplier_homepage (cid) VALUES ($lastId);
                                INSERT INTO supplier_iandf (cid) VALUES ($lastId);
                                commit;
                                ";
                                $lastIdStmt = $pdo->prepare($lastIdQuery);
                                $lastIdStmt->execute();
                                $query = "INSERT INTO login( `email`, `password`,`type`,`category`, `userid`)
                              VALUES ( '$email', '$pass', $v, 2, $lastId)";
                                $checkStmt = $pdo->prepare($query);
                                $checkStmt->execute();
                                $body = "Thank you for registration at Bizzort.com.<br/>
                                        Your loginn details are:<br/><br/>
                                        <strong>Email:</strong>&nbsp;" . $email . "<br />
                                        <strong>Password:</strong>&nbsp;" . $password;
                                // Create a message
                                $message = Swift_Message::newInstance('Registration at Bizzort')
                                    ->setFrom(array('admin@bizzort.com' => 'Bizzort Admin'))
                                    ->setTo(array($email))
                                    ->setBody($body, 'text/html');

                                // Send the message
                                $mailer->send($message);
                                session_start();
                                $_SESSION['email'] = $email;
                                $_SESSION['message'] = "register";
                                $_SESSION['type'] = "supplier";
                                $_SESSION['userid'] = $lastId;
                            } else {
                                echo "Your registration failed. Please try again later";
                            }
                        }
                        break;
                    case '3':
                        $getAdmin = "SELECT `email` FROM `sales_rep_com` WHERE `email` = '$email'";
                        $query = $pdo->prepare($getAdmin);
                        $query->execute();
                        if ($query->rowCount() > 0) {
                            echo " Your email is already registered in our system. Please login";
                        } else {
                            $query = "INSERT INTO sales_rep_com(company, fname, lname, email, pass, countryId, stateId, catOneId, catTwoId, nl)
                              VALUES ('$cname', '$fname', '$lname', '$email', '$pass', '$country', '$state', $catOneId, $catTwoId, $nl)";
                            $checkStmt = $pdo->prepare($query);
                            $result = $checkStmt->execute();
                            if ($result) {
                                $lastId = $pdo->lastInsertId();
                                $lastIdQuery = "
                                START TRANSACTION;
                                INSERT INTO sales_rep_com_profile (cid) VALUES ($lastId);
                                INSERT INTO sales_rep_com_business (cid) VALUES ($lastId);
                                INSERT INTO sales_rep_com_homepage (cid) VALUES ($lastId);
                                commit;
                                ";
                                $lastIdStmt = $pdo->prepare($lastIdQuery);
                                $lastIdStmt->execute();
                                $query = "INSERT INTO login( `email`, `password`,`type`,`category`)
                              VALUES ( '$email', '$pass', $v, 3)";
                                $checkStmt = $pdo->prepare($query);
                                $checkStmt->execute();
                                $body = "Thank you for registration at Bizzort.com.<br/>
                                        Your loginn details are:<br/><br/>
                                        <strong>Email:</strong>&nbsp;" . $email . "<br />
                                        <strong>Password:</strong>&nbsp;" . $password;
                                // Create a message
                                $message = Swift_Message::newInstance('Registration at Bizzort')
                                    ->setFrom(array('admin@bizzort.com' => 'Bizzort Admin'))
                                    ->setTo(array($email))
                                    ->setBody($body, 'text/html');

                                // Send the message
                                $mailer->send($message);
                                session_start();
                                $_SESSION['email'] = $email;
                                $_SESSION['message'] = "register";
                                $_SESSION['type'] = "sales_rep_com";
                            } else {
                                echo "Your registration failed. Please try again later";
                            }
                        }
                        break;
                    case '4':
                        $getAdmin = "SELECT `email` FROM `sourcingAgent` WHERE `email` = '$email'";
                        $query = $pdo->prepare($getAdmin);
                        $query->execute();
                        if ($query->rowCount() > 0) {
                            echo " Your email is already registered in our system. Please login";
                        } else {

                            $query = "INSERT INTO sourcingAgent(company, fname, lname, email, pass, countryId, stateId, catOneId, catTwoId, nl)
                              VALUES ('$cname', '$fname', '$lname', '$email', '$pass', '$country', '$state', $catOneId, $catTwoId, $nl)";
                            $checkStmt = $pdo->prepare($query);
                            $result = $checkStmt->execute();

                            if ($result) {
                                $lastId = $pdo->lastInsertId();
                                $lastIdQuery = "
                                START TRANSACTION;
                                INSERT INTO sourcingAgent_profile (cid) VALUES ($lastId);
                                INSERT INTO sourcingAgent_business (cid) VALUES ($lastId);
                                INSERT INTO sourcingAgent_homepage (cid) VALUES ($lastId);
                                commit;
                                ";
                                $lastIdStmt = $pdo->prepare($lastIdQuery);
                                $lastIdStmt->execute();
                                $query = "INSERT INTO login( `email`, `password`,`type`, `category`)
                              VALUES ( '$email', '$pass', $v, 4)";
                                $checkStmt = $pdo->prepare($query);
                                $checkStmt->execute();
                                $body = "Thank you for registration at Bizzort.com.<br/>
                                        Your loginn details are:<br/><br/>
                                        <strong>Email:</strong>&nbsp;" . $email . "<br />
                                        <strong>Password:</strong>&nbsp;" . $password;
                                // Create a message
                                $message = Swift_Message::newInstance('Registration at Bizzort')
                                    ->setFrom(array('admin@bizzort.com' => 'Bizzort Admin'))
                                    ->setTo(array($email))
                                    ->setBody($body, 'text/html');

                                // Send the message
                                $mailer->send($message);
                                session_start();
                                $_SESSION['email'] = $email;
                                $_SESSION['message'] = "register";
                                $_SESSION['type'] = "sourcingAgent";

                            } else {
                                echo "Your registration failed. Please try again later";
                            }
                        }
                        break;
                    case '5':
                        $getAdmin = "SELECT `email` FROM `qa` WHERE `email` = '$email'";
                        $query = $pdo->prepare($getAdmin);
                        $query->execute();
                        if ($query->rowCount() > 0) {
                            echo " Your email is already registered in our system. Please login";
                        } else {

                            $query = "INSERT INTO qa(company, fname, lname, email, pass, countryId, stateId, catOneId, catTwoId, nl,extra)
                              VALUES ('$cname', '$fname', '$lname', '$email', '$pass', '$country', '$state', $catOneId, $catTwoId, $nl, $allVals)";
                            $checkStmt = $pdo->prepare($query);
                            $result = $checkStmt->execute();
                            if ($result) {
                                $lastId = $pdo->lastInsertId();
                                $lastIdQuery = "
                                START TRANSACTION;
                                INSERT INTO qa_profile (cid) VALUES ($lastId);
                                INSERT INTO qa_business (cid) VALUES ($lastId);
                                INSERT INTO qa_homepage (cid) VALUES ($lastId);
                                commit;
                                ";
                                $lastIdStmt = $pdo->prepare($lastIdQuery);
                                $lastIdStmt->execute();
                                $query = "INSERT INTO login( `email`, `password`,`type` ,`category`)
                              VALUES ( '$email', '$pass', $v, 5)";
                                $checkStmt = $pdo->prepare($query);
                                $checkStmt->execute();
                                $body = "Thank you for registration at Bizzort.com.<br/>
                                        Your loginn details are:<br/><br/>
                                        <strong>Email:</strong>&nbsp;" . $email . "<br />
                                        <strong>Password:</strong>&nbsp;" . $password;
                                // Create a message
                                $message = Swift_Message::newInstance('Registration at Bizzort')
                                    ->setFrom(array('admin@bizzort.com' => 'Bizzort Admin'))
                                    ->setTo(array($email))
                                    ->setBody($body, 'text/html');

                                // Send the message
                                $mailer->send($message);
                                session_start();
                                $_SESSION['email'] = $email;
                                $_SESSION['message'] = "register";
                                $_SESSION['type'] = "qa";
                            } else {
                                echo "Your registration failed. Please try again later";
                            }
                        }
                        break;
                    case '6':
                        $getAdmin = "SELECT `email` FROM `logistics` WHERE `email` = '$email'";
                        $query = $pdo->prepare($getAdmin);
                        $query->execute();
                        if ($query->rowCount() > 0) {
                            echo " Your email is already registered in our system. Please login";
                        } else {
                            $query = "INSERT INTO logistics(company, fname, lname, email, pass, countryId, stateId, catOneId, catTwoId, nl)
                              VALUES ('$cname', '$fname', '$lname', '$email', '$pass', '$country', '$state', $catOneId, $catTwoId, $nl)";
                            $checkStmt = $pdo->prepare($query);
                            $result = $checkStmt->execute();
                            if ($result) {
                                $lastId = $pdo->lastInsertId();
                                $lastIdQuery = "
                                START TRANSACTION;
                                INSERT INTO logistics_profile (cid) VALUES ($lastId);
                                INSERT INTO logistics_business (cid) VALUES ($lastId);
                                INSERT INTO logistics_homepage (cid) VALUES ($lastId);
                                commit;
                                ";
                                $lastIdStmt = $pdo->prepare($lastIdQuery);
                                $lastIdStmt->execute();
                                $query = "INSERT INTO login( `email`, `password`, `type`, `category`)
                              VALUES ( '$email', '$pass', $v, 6)";
                                $checkStmt = $pdo->prepare($query);
                                $checkStmt->execute();
                                $body = "Thank you for registration at Bizzort.com.<br/>
                                        Your loginn details are:<br/><br/>
                                        <strong>Email:</strong>&nbsp;" . $email . "<br />
                                        <strong>Password:</strong>&nbsp;" . $password;
                                // Create a message
                                $message = Swift_Message::newInstance('Registration at Bizzort')
                                    ->setFrom(array('admin@bizzort.com' => 'Bizzort Admin'))
                                    ->setTo(array($email))
                                    ->setBody($body, 'text/html');

                                // Send the message
                                $mailer->send($message);
                                session_start();
                                $_SESSION['email'] = $email;
                                $_SESSION['message'] = "register";
                                $_SESSION['type'] = "logistics";
                            } else {
                                echo "Your registration failed. Please try again later";
                            }
                        }
                        break;
                    case '7':
                        $getAdmin = "SELECT `email` FROM `eventOrg` WHERE `email` = '$email'";
                        $query = $pdo->prepare($getAdmin);
                        $query->execute();
                        if ($query->rowCount() > 0) {
                            echo " Your email is already registered in our system. Please login";
                        } else {
                            $query = "INSERT INTO eventOrg(company, fname, lname, email, pass, countryId, stateId, catOneId, catTwoId, nl)
                              VALUES ('$cname', '$fname', '$lname', '$email', '$pass', '$country', '$state', $catOneId, $catTwoId, $nl)";
                            $checkStmt = $pdo->prepare($query);
                            $result = $checkStmt->execute();
                            if ($result) {
                                $lastId = $pdo->lastInsertId();
                                $lastIdQuery = "
                                START TRANSACTION;
                                INSERT INTO eventOrg_profile (cid) VALUES ($lastId);
                                INSERT INTO eventOrg_business (cid) VALUES ($lastId);
                                INSERT INTO eventOrg_homepage (cid) VALUES ($lastId);
                                commit;
                                ";
                                $lastIdStmt = $pdo->prepare($lastIdQuery);
                                $lastIdStmt->execute();
                                $query = "INSERT INTO login( `email`, `password`, `type`, `category`)
                              VALUES ( '$email', '$pass', $v,7)";
                                $checkStmt = $pdo->prepare($query);
                                $checkStmt->execute();
                                $body = "Thank you for registration at Bizzort.com.<br/>
                                        Your loginn details are:<br/><br/>
                                        <strong>Email:</strong>&nbsp;" . $email . "<br />
                                        <strong>Password:</strong>&nbsp;" . $password;
                                // Create a message
                                $message = Swift_Message::newInstance('Registration at Bizzort')
                                    ->setFrom(array('admin@bizzort.com' => 'Bizzort Admin'))
                                    ->setTo(array($email))
                                    ->setBody($body, 'text/html');

                                // Send the message
                                $mailer->send($message);
                                session_start();
                                $_SESSION['email'] = $email;
                                $_SESSION['message'] = "register";
                                $_SESSION['type'] = "eventOrg";
                            } else {
                                echo "Your registration failed. Please try again later";
                            }
                        }
                        break;
                    case '8':
                        $getAdmin = "SELECT `email` FROM `cunsltOther` WHERE `email` = '$email'";
                        $query = $pdo->prepare($getAdmin);
                        $query->execute();
                        if ($query->rowCount() > 0) {
                            echo " Your email is already registered in our system. Please login";
                        } else {
                            $query = "INSERT INTO cunsltOther(company, fname, lname, email, pass, countryId, stateId, catOneId, catTwoId, nl)
                              VALUES ('$cname', '$fname', '$lname', '$email', '$pass', '$country', '$state', $catOneId, $catTwoId, $nl)";
                            $checkStmt = $pdo->prepare($query);
                            $result = $checkStmt->execute();
                            if ($result) {
                                $lastId = $pdo->lastInsertId();
                                $lastIdQuery = "
                                START TRANSACTION;
                                INSERT INTO cunsltOther_profile (cid) VALUES ($lastId);
                                INSERT INTO cunsltOther_business (cid) VALUES ($lastId);
                                INSERT INTO cunsltOther_homepage (cid) VALUES ($lastId);
                                commit;
                                ";
                                $lastIdStmt = $pdo->prepare($lastIdQuery);
                                $lastIdStmt->execute();
                                $query = "INSERT INTO login( `email`, `password`, `type`, `category`)
                              VALUES ( '$email', '$pass',$v,8)";
                                $check = $pdo->prepare($query);
                                $res = $check->execute();
                                $body = "Thank you for registration at Bizzort.com.<br/>
                                        Your loginn details are:<br/><br/>
                                        <strong>Email:</strong>&nbsp;" . $email . "<br />
                                        <strong>Password:</strong>&nbsp;" . $password;
                                // Create a message
                                $message = Swift_Message::newInstance('Registration at Bizzort')
                                    ->setFrom(array('admin@bizzort.com' => 'Bizzort Admin'))
                                    ->setTo(array($email))
                                    ->setBody($body, 'text/html');

                                // Send the message
                                $mailer->send($message);
                                session_start();
                                $_SESSION['email'] = $email;
                                $_SESSION['message'] = "register";
                                $_SESSION['type'] = "cunsltOther";
                            } else {
                                echo "Your registration failed. Please try again later";
                            }
                        }
                        break;
                    default:
                        echo "Your registration failed. Please  try again later";
                        break;
                }
            }
        } else {
            echo "You did not select any type of company";
        }
    } else {
        if ($v === "individual") {
            if (isset($_POST['catOne'])) {
                $table = $_POST['catOne'];
            } else {
                $errors[] = "You did not select any type of individual category";
            }

            if (isset($_POST['catTwo'])) {
                $catTwo = $_POST['catTwo'];
            } else {
                $errors[] = "You did not select sub category for you";
            }

        } else {
            echo "You are neither a company nor an individual";
        }
    }

} else {
    echo "You are neither a company nor an individual";
}
