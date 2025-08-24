<?php
require_once '../inc/connection.php';
if(!isset($_SESSION['user_id'])){
    header("location:../Login.php");
    exit;
}


if (isset($_POST['submit']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select id, image from posts where id=$id";
    $runQuery = mysqli_query($conn, $query);

    if (mysqli_num_rows($runQuery) == 1) {
        $post = mysqli_fetch_assoc($runQuery);
        $image = $post['image'];
        if (!empty($post['image'])) {
             unlink("../uploads/".$image);
        }

        $query = "delete from posts where id=$id";

        $runQuery = mysqli_query($conn, $query);
        if ($runQuery) {
            $_SESSION['success'] = "Post deleted successfully";
            header("location:../index.php");
        } else {
            $_SESSION['errors'] = ['errors while delete'];
            header("location:../index.php");
        }
    } else {
        $_SESSION['errors'] = ['Post not Found'];
        header("location:../index.php");
    }
} else {
    $_SESSION['errors'] = ["please choose correct operation"];
    header("location:../index.php");
}
