<?php require('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>
<?php

if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1) {
    echo "<h1> Witaj zalogowany</h1>";
    echo "<h1> Witaj zalogowany</h1>";
}
include('components/header.inc.php'); ?>
<?php // include('components/companies.inc.php'); 
?>
<?php require('components/footer.inc.php'); ?>


