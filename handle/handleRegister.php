<?php
if(!isset($_POST['submit'])){
    header("location:../register.php");
    exit;
}
require_once '../inc/connection.php';
 $name = trim(htmlspecialchars($_POST['name']));
 $email = trim(htmlspecialchars($_POST['email']));
 $password = trim(htmlspecialchars($_POST['password']));
 $phone = trim(htmlspecialchars($_POST['phone']));

/* Validation */
$errors = [];
//name
if(empty($name)){
    $errors[]="Name is Required";
}elseif(is_numeric($name)){
    $errors[]="Name must be string";
}elseif(strlen($name)>100){
    $errors[]="Name must be less than 100 char";
}
//Email
if(empty($email)){
    $errors[]="Email is Required";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[]="Email is Invalid";
}

//Passowrd
if(empty($password)){
    $errors[]="Password is Required";
}elseif(strlen($password)<6){
    $errors[]="Password must be more than or equal 6 char";
}

//Phone
if(!empty($phone)){
    if(!is_string($phone)){
        $errors[]="Phone is Invalid";
    }elseif(strlen($phone)<11){
        $errors[]="Phone is Invalid";
    }
}
if(!empty($errors)){
    echo 'Shitty shit';
    $_SESSION['errors'] = $errors;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    header("location:../register.php");
    exit;
}
$passwordHashed = password_hash($password,PASSWORD_DEFAULT);
$query = "insert into users(`name`,`email`,`password`,`phone`) values('$name','$email','$passwordHashed','$phone')";

$runQuery = mysqli_query($conn,$query);

if(!$runQuery){
    $_SESSION['errors'] =['Error while insert'];
   header("location:../register.php");
   exit;
}
$_SESSION['success'] = "You account created successfully";
header("location:../login.php");

