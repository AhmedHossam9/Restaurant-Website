<?php
    session_start();
    require '../components/main/connect.php';
    require '../components/main/functions.php';
    if (!$conn) 
    {
        die("Connection failed!: " . mysqli_connect_error());
    }

    $userAcc = new User();
    
    $userAcc->authCheck();
    $userAcc->logCheck_unregistered();

    $user = $userAcc->getUserData($_SESSION["email"]);

    $staff = new Staff();
    $staff->qcCheck();
?>
<!DOCTYPE html>
<html>
<?php require_once "html/html_head.php"; ?>
<body>    
<?php require_once "html/html_navbar.php"; ?>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
          <ul class="nav flex-column">
          <li class="nav-item nav-link custom_mt_nav">
              <span class="align-text-bottom"></span>
              <img src="../components/assets/img/uploads/pp/<?php echo $user["ProfilePicture"]?>" class="img-fluid rounded" width="40">
              <?php echo $user["FirstName"]." ".$user["LastName"];?>
              <span class="badge rounded-pill bg-primary"><?php echo $userAcc->account_type($user["Role"]);?></span>
              
          </li>
          <hr class="custom_top_nav">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="qc">
              <span class="align-text-bottom"></span>
              <i class="fa-solid fa-house"></i> Dashboard
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="qc_activation">
              <span class="align-text-bottom"></span>
              <i class="fa-brands fa-creative-commons-sampling"></i> Activation
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="qc_reports">
              <span class="align-text-bottom"></span>
              <i class="fa-solid fa-chart-line"></i> Reports
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="qc_products">
              <span class="align-text-bottom"></span>
              <i class="fa-solid fa-cart-shopping"></i> Products
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="qc_categories">
              <span class="align-text-bottom"></span>
              <i class="fa-solid fa-list"></i> Categories
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="qc_accounts">
              <span class="align-text-bottom"></span>
              <i class="fa-solid fa-user"></i> Accounts
              </a>
          </li>
          </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
    </main>
  </div>
</div>
  <script>document.title = "CairoGRND | QC Panel"</script>
  </body>
</html>