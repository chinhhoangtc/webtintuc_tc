<?php
require('./connect.php');


?>
<style>
  @media (max-width: 1200px) {
    .navbar-nav {
      background: linear-gradient(198deg, #5193e9, #49dee1);
      width: 100%;
      margin: 0px;
    }
  }
</style>
<div class="sticky-header">
  <!-- header start -->
  <div class="container header">
    <div class="row">
      <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="index.php">ABCnewstc</a></div>
      <div class="col-sm-11 col-md-11 hidden-xs text-right"><a href="https://marketingmagic.app/" target="_blank"><img src="https://chinmedia.vn/wp-content/uploads/social-share-gif.gif" width="100%" height="100%" alt="" style="max-width: 468px; max-height: 60px; overflow: hidden; object-fit: cover;" /></a></div>
    </div>
  </div>
  <!-- header end -->
  <!-- nav and search start -->
  <div class="nav-search-outer">
    <!-- nav start -->

    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="row">
          <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
              <ul class="nav navbar-nav text-uppercase main-nav ">
                <li class="active"><a href="index.php">Trang chủ</a></li>
                <?php
                $sql = "SELECT * FROM categories ORDER BY id ASC";
                $result = mysqli_query($conn, $sql);


                while ($row = mysqli_fetch_array($result)) {
                  $id = $row['id'];
                  $name = $row['name'];
                  echo "<li><a href ='section-topic-details.php?id=$id'>$name</a></li>";

                ?>
                <?php
                }
                ?>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- nav end -->
      <!-- search start -->

      <div class="search-container ">
        <div class="container">
          <form action="search-result-found.php" method="GET" role="search">
            <input id="search-bar" placeholder="Nhập từ khóa..." name="txtsearch" autocomplete="off">
          </form>
        </div>
      </div>
      <!-- search end -->
    </nav>
    <!--nav end-->
  </div>
  <!-- nav and search end-->
</div>