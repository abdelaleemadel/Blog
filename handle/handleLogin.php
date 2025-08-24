<?php
require_once '../inc/connection.php';
if(!isset($_POST['submit'])){
    header("location:../login.php");
    exit;
}
 $email = trim(htmlspecialchars($_POST['email']));
 $password = trim(htmlspecialchars($_POST['password']));

/* Validation */
$errors = [];
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

if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    $_SESSION['email'] = $email;
    header("location:../login.php");
    
}else{
    $query = "select id, email, password from users where email = '$email'";
    $runQuery = mysqli_query($conn,$query);
    if(mysqli_num_rows($runQuery)==1){
        $user = mysqli_fetch_assoc($runQuery);
        $oldPassword = $user['password'];
        $isVerify = password_verify($password,$oldPassword);
        if($isVerify){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;

            header("location:../index.php");
        }else{
            $_SESSION['errors'] = ["Credentials aren't correct"];
            $_SESSION['email'] = $email;

            header("location:../login.php");
        }
    }else{
        $_SESSION['errors'] = ["Credentials aren't correct"];
        header("location:../login.php");
    } 
}







