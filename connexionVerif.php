<?php 
session_start();
if(!isset($_SESSION['logged'])) {
    header('Location: index.php');
}

$pseudoSession = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : '';
$test = $_SESSION['logged'];
?>