<?php
session_start();
if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
    session_destroy();
    header("Location: bts_index.php"); // przekierowanie na stronę główną
    exit;
} else {
header("Location: bts_index.php");
}
?>