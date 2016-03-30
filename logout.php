<?php
session_start();
if (!empty($_SESSION['email']) || !empty($_SESSION['message']) || !empty($_SESSION['type'])) {
    session_destroy();
    header("Location: index.php");
} else {
    header("Location: index.php");
}

?>
