<?php
session_start();
if (empty($_SESSION['email']) && empty($_SESSION['userid']) && empty($_SESSION['type'])) {
    session_destroy();
    header("Location: ../index.php");
} else {
    $email = $_SESSION['email'];
    $table = $_SESSION['type'];
    $userid = $_SESSION['userid'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Bizzort">
    <meta name="author" content="webmoneycafe"/>
    <link rel="icon" href="../new/images/bizzort.ico" type="image/x-icon"/>
    <title>Bizzort</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<body cz-shortcut-listen="true">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar navbar-inverse navbar-fixed-top opaque-navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navMain">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>
                    <a class="navbar-brand" href="index.php">Bizzort</a>
                </div>
                <div class="navbar-form navbar-left row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <form>
                            <input type="text" class="form-control" size="45%" placeholder="Search...">
                        </form>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navMain">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">My Account <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Update Profile</a></li>
                                <li><a href="#">New Inquiries</a></li>
                                <li><a href="#">New Quotes</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">My Services <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if (!isset($_GET['q'])) { ?>
                                    <li><a href="#">Get Quotation/RFQ</a></li>
                                    <li><a href="#">Visit Trade Shows</a></li>
                                    <li><a href="#">Manage Buying Requsts</a></li>
                                    <li><a href="#">Order Lab Testing Services</a></li>
                                    <li><a href="#">Order Inspection Services</a></li>
                                    <li><a href="#">Order Audit Services</a></li>
                                    <li><a href="#">Order Logistics Services</a></li>
                                    <li><a href="#">Hire Sales Rep</a></li>
                                    <li><a href="#">Post Jobs</a></li>
                                <?php } else {
                                    if ($_GET['q'] == 's') { ?>
                                        <li><a href="#">Quote Prices</a></li>
                                        <li><a href="#">Visit Trade Shows</a></li>
                                        <li><a href="#">Post Products</a></li>
                                        <li><a href="#">Order Lab Testing Services</a></li>
                                        <li><a href="#">Order Inspection Services</a></li>
                                        <li><a href="#">Order Audit Services</a></li>
                                        <li><a href="#">Order Logistics Services</a></li>
                                        <li><a href="#">Hire Sales Rep</a></li>
                                        <li><a href="#">Post Jobs</a></li>
                                    <?php } else {
                                        if ($_GET['q'] == 'i') { ?>
                                            <li><a href="#">Apply Jobs/Projects</a></li>
                                            <li><a href="#">Visit Trade Shows</a></li>
                                            <li><a href="#">Show Your Skills</a></li>
                                        <?php }
                                    }
                                } ?>
                            </ul>
                        </li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- transparent header ends -->
    </div>
</nav>

<div class="container-fluid">