<?php
include_once('./master_layout/header.php');
require('./connect.php');

// Số bài viết mỗi trang
$posts_per_page = 10;

// Lấy số trang từ URL, mặc định là trang 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $posts_per_page; // Tính offset

// Lấy bài viết với phân trang
$sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $posts_per_page OFFSET $offset";
$result = mysqli_query($conn, $sql);

// Tính tổng số bài viết và tổng số trang
$sql_total = "SELECT COUNT(*) FROM posts";
$result_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_array($result_total);
$total_posts = $row_total[0];
$total_pages = ceil($total_posts / $posts_per_page);
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
      while ($row = mysqli_fetch_array($result)) {
        $idtin = $row['id'];
        $tieude = $row['title'];
        $category_id = $row['category_id'];
        $image = $row['image'];
        $time = $row['created_at'];
      ?>
        <a href='post-item-details.php?id=<?php echo $idtin; ?>&category_id=<?php echo $category_id; ?>' class="text-decoration-none text-dark">
          <div class="card mb-4 shadow-sm" style="height: 210px; overflow: hidden; padding: 15px 0px;">
            <div class="row no-gutters" style="height: 100%;">
              <div class="col-md-5" style="height: 100%;">
                <img class="card-img-top" src="<?php echo $image; ?>" alt="Post Image">
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
  

  <!-- Phân trang -->
<div class="text-center">
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <!-- Nút Previous -->
      <?php if ($page > 1): ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
      <?php endif; ?>

      <!-- Các trang -->
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
          <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
      <?php endfor; ?>

      <!-- Nút Next -->
      <?php if ($page < $total_pages): ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
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
    object-fit: cover;
  }

  .blogging-style {
    background-color: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
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
