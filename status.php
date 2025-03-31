<?php
include './INCLUDES/header.php';

if (empty($_SESSION) && !isset($_SESSION['status'])){
    header('location:user-login.php');

}else if ($_SESSION['status'] == "admin"){
    include './tela-user.php';
}else if ($_SESSION['status'] == "usuario"){
    include './tela-user.php';
}