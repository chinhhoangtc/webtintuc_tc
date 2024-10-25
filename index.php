<?php
include_once('./master_layout/header.php');
require('./connect.php');
?>

<div class="container blogging-style my-4">
  <div class="page-header mb-4">
    <h1 class="text-center">Trang chủ</h1>
  </div>
</div>

<div class="container border">
  <div class="row">
    <!-- Bài viết -->
    <div class="col-md-11" style="margin-bottom: 50px;">
      <?php
      $sql = "SELECT * FROM posts ORDER BY created_at DESC limit 10";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_array($result)) {
        $idtin = $row['id'];
        $tieude = $row['title'];
        $category_id = $row['category_id'];
        $image = $row['image'];
        $time = $row['created_at']; // Lấy thời gian tạo bài viết
      ?>
        <a href='post-item-details.php?id=<?php echo $idtin; ?>&category_id=<?php echo $category_id; ?>' class="text-decoration-none text-dark">
          <div class="card mb-4 shadow-sm"  style="height: 210px; overflow: hidden; padding: 15px 0px;">
            <div class="row no-gutters" style="height: 100%;">
              <div class="col-md-5" style="height: 100%;">
                <img class="card-img-top" src="<?php echo $image; ?>" alt="Post Image" >
              </div>
              <div class="col-md-10" style="height: 100%;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $tieude; ?></h5>
                  <p class="card-text">
                    <small class="text-muted"><?php echo $time; ?></small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </a>
      <?php } ?>
    </div>

    <!-- Quảng cáo -->
    <div class="col-md-5">
      <div class="sticky-top" style="top: 20px;">
        <?php
        $ad_sql = "SELECT * FROM advertisements ORDER BY created_at DESC";
        $ad_result = mysqli_query($conn, $ad_sql);

        while ($ad_row = mysqli_fetch_array($ad_result)) {
          $ad_image = $ad_row['image'];
          $ad_link = $ad_row['link'];
        ?>
          <div class="card mb-4 shadow-sm" style="height: 100%; margin-bottom: 10px;">
            <a href="<?php echo $ad_link; ?>" target="_blank" class="d-block" style="height: 100%;">
              <img src="<?php echo $ad_image; ?>" alt="Advertisement" class="card-img-top" style="height: 100%; object-fit: cover;">
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>


<!-- Calendar -->
<div class="col-sm-16 bt-space wow fadeInUp animated my-4" data-wow-delay="1s" data-wow-offset="50">
  <div class="single pull-left"></div>
</div>

<?php include_once('./master_layout/footer.php') ?>

<style>
  .card-title {
    font-size: 1.2rem;
    font-weight: bold;
  }

  .card-body {
    padding: 15px;
  }

  .card-img-top {
    width: 100%;
    height: 100%;
    /* Điều chỉnh chiều cao để hình ảnh nhỏ lại */
    object-fit: cover;
  }

  .blogging-style {
    background-color: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    transition: background-color 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }

  .shadow-sm {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  }

  h1 {
    font-weight: bold;
    font-size: 2rem;
    color: #333;
  }

  .text-muted {
    font-size: 0.9rem;
  }

</style>