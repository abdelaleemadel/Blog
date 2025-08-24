<?php
require_once '../inc/connection.php';

if(isset($_SESSION['user_id'])){
    unset($_SESSION['user_id']);
    header("location:../login.php");
}else{
    header("location:../index.php");
}