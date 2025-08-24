      <div class="col-md-4">
          <div class="product-item">
              <a href="#"><img src="assets/images/product_02.jpg" alt=""></a>
              <div class="down-content">
                  <a href="#">
                      <h4>Tittle goes here</h4>
                  </a>
                  <h6>created at</h6>
                  <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                  <!-- <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Reviews (21)</span> -->
                  <div class="d-flex justify-content-end">
                      <a href="http://" class="btn btn-info "> view</a>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="product-item">
              <a href="#"><img src="assets/images/product_03.jpg" alt=""></a>
              <div class="down-content">
                  <a href="#">
                      <h4>Tittle goes here</h4>
                  </a>
                  <h6>created_at</h6>
                  <p>Sixteen Clothing is free CSS template provided by TemplateMo.</p>
                  <!-- <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Reviews (36)</span> -->
                  <div class="d-flex justify-content-end">
                      <a href="http://" class="btn btn-info "> view</a>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="product-item">
              <a href="#"><img src="assets/images/product_01.jpg" alt=""></a>
              <div class="down-content">
                  <a href="#">
                      <h4>Tittle goes here</h4>
                  </a>
                  <h6>created_at</h6>
                  <p> Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                  <!-- <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Reviews (24)</span> -->
                  <div class="d-flex justify-content-end">
                      <a href="http://" class="btn btn-info "> view</a>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="product-item">
              <a href="#"><img src="assets/images/product_02.jpg" alt=""></a>
              <div class="down-content">
                  <a href="#">
                      <h4>Tittle goes here</h4>
                  </a>
                  <h6>created at</h6>
                  <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                  <!-- <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Reviews (21)</span> -->
                  <div class="d-flex justify-content-end">
                      <a href="http://" class="btn btn-info "> view</a>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="product-item">
              <a href="#"><img src="assets/images/product_03.jpg" alt=""></a>
              <div class="down-content">
                  <a href="#">
                      <h4>Tittle goes here</h4>
                  </a>
                  <h6>created_at</h6>
                  <p>Sixteen Clothing is free CSS template provided by TemplateMo.</p>
                  <!-- <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Reviews (36)</span> -->
                  <div class="d-flex justify-content-end">
                      <a href="http://" class="btn btn-info "> view</a>
                  </div>
              </div>
          </div>
      </div>


      <!-- ========================= -->
      <!-- <img src="uploads/<?php echo $post['image'] ?>" alt="" width="100px" srcset=""> -->

      if(!empty($errors)){
    echo 'Shitty shit';
    $_SESSION['errors'] = $errors;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    header("location:../register.php");
}else{
    $passwordHashed = password_hash($password,PASSWORD_DEFAULT);
    $query = "insert into users(`name`,`email`,`password`,`phone`) values('$name','$email','$passwordHashed','$phone')";

    $runQuery = mysqli_query($conn,$query);

    if(!$runQuery){
        $_SESSION['errors'] =['Error while insert'];
        header("location:../register.php");
    }else{
        unset($_SESSION['errors']);
        unset($_SESSION['name']);
        unset($_SESSION['phone']);
        unset($_SESSION['email']);
        $_SESSION['success'] = "You account created successfully";
        header("location:../login.php");
    }

}