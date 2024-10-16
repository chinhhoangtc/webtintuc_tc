<?php
include_once('./master_layout/header.php');
require('./connect.php'); ?>
<div class="container blogging-style">
  <div class="page-header">
    <h1>Trang chủ</h1>
  </div>

  <div class="row">
    <?php
    $sql = "SELECT * FROM posts ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
      $idtin = $row['id'];
      $tieude = $row['title'];
      $category_id = $row['category_id'];
      $image = $row['image'];
      $time = $row['created_at'];


    ?>
      <div class="col-md-9">
        <li class=bantin>
          <?php echo "<a href='post-item-details.php?id=$idtin&category_id=$category_id'><img src='$image' width='200px' height='150px' /></a>";
          echo "<a href='post-item-details.php?id=$idtin&category_id=$category_id'><h4>$tieude</h4></a>";
          ?>
        </li>
      </div>
      <div class="col-md-3">
        <div class="advertisements">
          <?php
          // Truy vấn danh sách quảng cáo
          $ad_sql = "SELECT * FROM advertisements ORDER BY id DESC";
          $ad_result = mysqli_query($conn, $ad_sql);

          while ($ad_row = mysqli_fetch_array($ad_result)) {
            $ad_image = $ad_row['image'];
            $ad_link = $ad_row['link'];
            echo "<div class='ad-item'>";
            echo "<a href='$ad_link' target='_blank'><img src='$ad_image' width='200px' height='150px' /></a>";
            echo "</div>";
          }
          ?>
        </div>
      </div>
    <?php } ?>


  </div>

  <!-- calendar start -->
  <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50">
    <div class="single pull-left"></div>
  </div>
  <!-- calendar end -->

</div>



<?php include_once('./master_layout/footer.php') ?>

<style>
  /* .ind {
    width: 70%;
  } */

  /* .col {
    float: left;
    width: 30%;
    padding: 20px;
  } */

  .bantin {
    list-style-type: none;
  }

  /* .advertisements {
    float: right;
    width: 25%;
  } */

  h4 {
    margin-top: 17px;
  }
</style>