<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['useremail'])) {
} else {
  header("location: admin-index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin - Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/logo3.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <script src="assets/vendor/testLocalJs/sweetalert.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    @media (max-width: 768px) {
      .header .logo-name {
        display: none;
      }

    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="admin-index.php" class="logo d-flex align-items-center">
        <img src="img/logo3.png" alt="" style="width: auto; height: 60px">
        <span class="logo-name">ArchiveMo<span style="color: #F5A623; font-family: Poppins, sans-serif">.</span></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- profile button-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <?php
            if (isset($_SESSION['message'])) {
              echo $_SESSION['message'];
              unset($_SESSION['message']);
            }
            $email = $_SESSION['useremail'];
            $result = mysqli_query($conn, "SELECT * FROM admin WHERE username ='$email'");

            while ($row = mysqli_fetch_array($result)) {

            ?>

              <i class="bi bi-person" style="font-size: 2rem;"></i><!--change it to user profile-->
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row["username"]; ?></span><!--change it to username-->
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $row["username"]; ?></h6><!--change to username-->
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="admin_profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="admin-index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" href="narrative-dashboard.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Narrative Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="narrative-test.php">
              <i class="bi bi-circle"></i><span>Download Narrative</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" href="ojt-dashboard.php">
          <i class="bi bi-bar-chart"></i><span>OJT Records</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="waiver-dashboard.php">
              <i class="bi bi-circle"></i><span>Waiver</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>Concent</span>
            </a>
          </li><!-- End OJT Records Nav -->
        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" href="student_info.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Student Information</span>
        </a>

      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" href="create-student.php">
          <i class="bi bi-person-square"></i><span>Create User</span>
        </a>

      </li><!-- End Create Student Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <i class="bi bi-person" style="font-size: 3rem;"></i>
              <h2><?php echo $row["admin_name"]; ?></h2>
              <h3>Admin</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8" style="height: 100vh;">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <h3 style="font-size: 1.5rem;">Edit Profile</h3>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <form method="POST" action="" autocomplete="off">
                  <input type="hidden" name="ad_id" value="<?php echo $row["admin_id"]; ?>">
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="ad-user" type="text" class="form-control" id="fullName" value="<?php echo $row["username"]; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Fullname</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="ad-name" type="text" class="form-control" id="company" value="<?php echo $row["admin_name"]; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="ad-password" type="text" class="form-control" id="Job" value="<?php echo md5($row["password"]); ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="ad-newpassword" type="password" class="form-control" id="Job">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="ad-confirmpassword" type="password" class="form-control" id="Job">
                    </div>
                  </div>


                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="savechanges">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
      </div>
    </section>

    <?php
        if (isset($_POST['savechanges'])) {

              $id = $_POST['ad_id'];
              $adminUser = $_POST['ad-user'];
              $adminName = $_POST['ad-name'];
              $newPass = $_POST['ad-newpassword'];
              $confirmPass = $_POST['ad-confirmpassword'];

              $sql = "UPDATE `admin` SET `admin_name` = '$adminName', `username` = '$adminUser' WHERE `admin`.`admin_id` = $id";

              if ($conn->query($sql) === TRUE) {
                if ($newPass != $confirmPass) {
                  $_SESSION['message'] = '  
                <script>
                swal("Success!", "Admin Information updated!", "success");
                </script>
                ';
                echo "<script>window.location.href = 'admin_profile.php';</script>";
                } else if ($newPass == null && $confirmPass == null) {
                  $_SESSION['message'] = '   
                
                  <script>
                  swal("Success!", "Admin Information updated!", "success");
                  </script>
                  ';
                  echo "<script>window.location.href = 'admin_profile.php';</script>";
                  exit();
                } else if ($newPass != null && $confirmPass != null) {
                  $sql = "UPDATE `admin` SET `password` = '$confirmPass' WHERE `admin`.`admin_id` = $id";
                }
              } else {
                $_SESSION['message'] = '    <script>
                swal("Something went wrong!", "There is a problem updating information.", "warning");
                </script>';
                echo "<script>window.location.href = 'admin_profile.php';</script>";
                exit();
              }
            }
    ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ArchiveMo.</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<?php
            }
?>
</body>

</html>