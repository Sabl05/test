<?php
session_start();

  $city = $_GET['id'];
  $_SESSION['city'] = $city;

  header('Location: ../index.php');
 ?>
