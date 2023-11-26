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

  <title>Admin - Dashboard</title>
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
            <?php
            }
            ?>
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
        <a class="nav-link collapsed" href="admin-index.php">
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
        <a class="nav-link " data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>OJT Records</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content show " data-bs-parent="#sidebar-nav">
          <li>
            <a href="waiver-dashboard.php">
              <i class="bi bi-circle"></i><span>Download Waiver</span>
            </a>
          </li>
          <li>
            <a href="concent-dashboard.php">
              <i class="bi bi-circle"></i><span>Download Parent Concent</span>
            </a>
          </li>
      </li>
      <li>
        <a href="medical-dashboard.php">
          <i class="bi bi-circle"></i><span>Download Health Examination Card</span>
        </a>
      </li>
      <li>
        <a href="contract-dashboard.php">
          <i class="bi bi-circle"></i><span>Download OJT Contract</span>
        </a>
      </li>
      <li>
        <a href="moa-dashboard.php">
          <i class="bi bi-circle"></i><span>Download MOA</span>
        </a>
      </li>
      <li>
        <a href="s_id-dashboard.php">
          <i class="bi bi-circle"></i><span>Download Registration Certificate</span>
        </a>
      </li>
      <!-- End OJT Records Nav -->
    </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" href="student_info.php">
        <i class="bi bi-file-earmark-person-fill"></i><span>Student Information</span>
      </a>

    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" href="ojt-field.php">
        <i class="bi bi-person-lines-fill"></i><span>OJT Field</span>
      </a>

    </li><!-- End Create Student Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" href="create-student.php">
        <i class="bi bi-person-square"></i><span>Create User</span>
      </a>

    </li><!-- End Create Student Nav -->



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
          <li class="breadcrumb-item active">OJT Records</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
    include 'config.php';
    ?>
    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-13">
          <div class="row">
            <!-- Positive Count -->

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body" type="button" data-bs-toggle="modal" data-bs-target="#waivermodal">
                  <h5 class="card-title">Waiver</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-earmark-arrow-up-fill" style="color: #2eca6a;"></i>
                    </div>
                    <!-- modal for waiver -->
                    <div class="modal fade" id="waivermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Edit Student Records </h5>
                            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                          </div>

                            <div class="modal-body">

                            <iframe src="waiver-dashboard.php" width="1100" height="500" frameborder="0"></iframe>
            
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_waiver; ?></h6><!-- create a php code for the number of students int he system -->

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Neutral Count -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                  <div class="card-body" data-bs-target="#parentmodal" data-bs-toggle="modal">
                    <h5 class="card-title">Parent Concent</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-file-earmark-arrow-up-fill" style="color: #4154f1;"></i>
                      </div>
                      <!-- modal for parent -->
                    <div class="modal fade" id="parentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Edit Student Records </h5>
                            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                          </div>

                            <div class="modal-body">

                            <iframe src="concent-dashboard.php" width="1100" height="500" frameborder="0"></iframe>
            
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                      </div>
                    </div>
                      <div class="ps-3">
                        <h6><?php echo $total_concent; ?></h6>
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <!-- Negative Count -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <a href="concent-dashboard.php">
                  <div class="card-body">
                    <h5 class="card-title">Health Examination Card</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-file-earmark-arrow-up-fill" style="color: #ff4425;"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo $total_medical; ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <a href="contract-dashboard.php">
                  <div class="card-body">
                    <h5 class="card-title">OJT Contract</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-file-earmark-arrow-up-fill" style="color: #ff4425;"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo $total_contract; ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <a href="moa-dashboard.php">
                  <div class="card-body">
                    <h5 class="card-title">MOA</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-file-earmark-arrow-up-fill" style="color: #ff4425;"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo $total_moa; ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <a href="s_id-dashboard.php">
                  <div class="card-body">
                    <h5 class="card-title">Registration Certificate</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-file-earmark-arrow-up-fill" style="color: #ff4425;"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo $total_ojt_id; ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">Student Records</h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Students Name</th>
                    <th>Birthdate</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Student ID</th>
                    <th>Course</th>
                    <th>Major</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $result = mysqli_query($conn, "SELECT DISTINCT users.*, records.email,  concent.email, medical.email FROM users LEFT JOIN records ON users.email = records.email LEFT JOIN concent ON users.email = concent.email LEFT JOIN medical ON users.email = medical.email");
                  while ($row = mysqli_fetch_array($result)) {

                  ?>
                    <tr>
                      <td scope="row"><?php echo $row["id"]; ?></td>
                      <td><?php echo $row["firstname"] . " " . $row["lastname"]; ?></td>
                      <td><?php echo $row["birthday"]; ?></td>
                      <td><?php echo $row["age"]; ?></td>
                      <td><?php echo $row["address"]; ?></td>
                      <td><?php echo $row["contact"]; ?></td>
                      <td><?php echo $row["student_id"]; ?></td>
                      <td><?php echo $row["course"]; ?></td>
                      <td><?php echo $row["specialization"]; ?></td>
                      <td>
                      <?php

                      if ($row['email'] != NULL) {
                        echo "<p style='color: green; background-color: rgba(0, 128, 0, 0.355); border-radius: 2px; padding: 2px 10px;'> Finish</p>";
                      } else {
                        echo "<p style='color:red; background-color: rgba(255, 0, 0, 0.384); border-radius: 2px; padding: 2px 10px;'> Pending</p>";
                      }
                    }
                      ?>
                      </td>
                    </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div><!-- End Recent Sales -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ArchiveMo.</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>