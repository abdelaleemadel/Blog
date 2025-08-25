<?php require_once 'inc/connection.php' ?>
<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/functions.php'?>
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
  <div class="owl-banner owl-carousel">
    <div class="banner-item-01">
      <div class="text-content">
        <!-- <h4>Best Offer</h4> -->
        <!-- <h2>New Arrivals On Sale</h2> -->
      </div>
    </div>
    <div class="banner-item-02">
      <div class="text-content">
        <!-- <h4>Flash Deals</h4> -->
        <!-- <h2>Get your best products</h2> -->
      </div>
    </div>
    <div class="banner-item-03">
      <div class="text-content">
        <!-- <h4>Last Minute</h4> -->
        <!-- <h2>Grab last minute deals</h2> -->
      </div>
    </div>
  </div>
</div>
<!-- Banner Ends Here -->
 <?php
 $limit = 2;
 if(isset($_GET['page'])){
  $page = $_GET['page'];
 }else{
  $page = 1;
 }
 ?>
 <?php 
$query = "select count('id') as total from posts";
$runQuery = mysqli_query($conn,$query);
$total = mysqli_fetch_assoc($runQuery)['total'];
$numPages = ceil($total/$limit);
/* echo $page.$numPages;
 */
if(!check($page,$numPages)){
  header("location:{$_SERVER['PHP_SELF']}?page=1");
  exit;
 }

$offset = ($page - 1)*$limit;
?>
<?php $query = "select id,title,substring(body,1,53) as body,image, Date(created_at) as created_at from posts order by id limit $limit offset $offset";
$runQuery = mysqli_query($conn, $query);
if (mysqli_num_rows($runQuery) > 0) {
  $posts = mysqli_fetch_all($runQuery, MYSQLI_ASSOC);
} else {
  $msg = "No posts founded";
} ?>



<?php
if (!empty($posts)):
?>
  <div class="latest-products">
    <div class="container">
      <?php require_once 'inc/success.php' ?>
      <?php require_once 'inc/errors.php' ?>
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading text-start">
            <h2><?php echo $message['Latest Posts'] ?></h2>
            <!-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> -->
          </div>
        </div>
        <?php
        foreach ($posts as $post):
        ?>
          <div class="col-md-4">
            <div class="product-item text-start">
              <a href="#"><img src="uploads/<?php echo $post['image'] ?>" alt=""></a>
              <div class="down-content">
                <a href="#" class="text-start" >
                  <h4 class="mb-0"><?php echo $post['title'] ?></h4>
                </a>
                 <h5  class=" h6 text-end"><?php echo $post['created_at'] ?></h5>
            <p> <?php echo $post['body'] ?>...</p>
                <div class="d-flex justify-content-end">
                  <a href="viewPost.php?id=<?php echo  $post['id'] ?>" class="btn btn-info "><?php echo $message['view'] ?> </a>
                </div>

              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center">
          <li class="page-item <?php if($page == 1) echo "disabled" ?> "><a class="page-link text-danger " href="<?php echo $_SERVER['PHP_SELF']."?page=".$page-1 ?>"><?php echo $message['Previous'] ?></a></li>
          <li class="page-item disabled"><a class="page-link text-danger"><?php echo $message['page'] ?> <?php echo $page ?></a></li>
          <li class="page-item <?php if($page == $numPages) echo "disabled" ?>"><a class="page-link text-danger"  href="<?php echo $_SERVER['PHP_SELF']."?page=".$page+1 ?>"><?php echo $message['Next'] ?></a></li>
        </ul>
      </nav>
    </div>
  </div>
<?php
else:
  echo $msg;
endif;
?>


<?php require_once 'inc/footer.php' ?>