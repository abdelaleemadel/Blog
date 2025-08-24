<?php require_once 'inc/connection.php' ?>
<?php require_once 'inc/header.php' ?>

<!-- Page Content -->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4><?php echo $message['view post'] ?></h4>
          <h2><?php echo $message['view personal post'] ?></h2>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "select users.name, posts.* from posts join users on users.id = posts.user_id where posts.id = $id";
  $runQuery = mysqli_query($conn, $query);
  if (mysqli_num_rows($runQuery) == 1) {
    $post = mysqli_fetch_assoc($runQuery);
  } else {
    $_SESSION['errors'] = ["Post Not Found"];
    header("location:index.php");
  }
} else {
  $_SESSION['errors'] = ["Post Not Found"];
  header("location:index.php");
}
?>
<div class="best-features about-features">
  <div class="container">
    <?php require_once 'inc/success.php' ?>
    <?php require_once 'inc/errors.php' ?>
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading text-start">
          <h2><?php echo $message['Our Background'] ?></h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="right-image">
          <img src="uploads/<?php echo $post['image'] ?>" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="left-content">
          <h4><?php echo $post['title'] ?></h4>
          <p><?php echo $post['body'] ?></p>
          <p><span class="h5"><?php echo $message['Author'] ?>: </span><?php echo $post['name'] ?></p>


          <div class="d-flex justify-content-center">
             <?php
             if(isset($_SESSION['user_id'])):?>
                <form action="editPost.php?id=<?php echo $post['id'] ?>" method="POST">
                  <button type="submit" name=" " class="btn btn-success me-3 "><?php echo $message['edit post'] ?></button>
                </form>
                <form action="handle/deletePost.php?id=<?php echo $post['id'] ?>" method="POST">
                  <button type="submit" name="submit" class="btn btn-danger "><?php echo $message['delete post'] ?></button>
                </form>
                <?php endif?> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'inc/footer.php' ?>