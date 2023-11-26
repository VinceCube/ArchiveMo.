<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['useremail'])){
}
else{
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
        .header .logo-name{
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

while($row = mysqli_fetch_array($result)){

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
        <a class="nav-link " href="admin-index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav"  href="narrative-dashboard.php">
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
        <a class="nav-link collapsed" data-bs-target="#charts-nav"  href="ojt-dashboard.php">
        <i class="bi bi-card-list"></i><span>OJT Records</span><i class="bi bi-chevron-down ms-auto"></i>
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
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<?php
 include 'config.php';
?>
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Students</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_users; ?></h6><!-- create a php code for the number of students int he system -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Narrative Reports</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-earmark-arrow-up-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_narrative; ?></h6><!--number of narrative in the system using php-->
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">OJT Records</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-earmark-arrow-down-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_records; ?></h6><!-- change the number to number of reports submited -->

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Reports</h5>

                  <!--Bar Chart -->
                  <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      labels: ['Students', 'Narrative Reports', 'OJT Records'],
                      datasets: [{
                        label: 'Bar Chart',
                        data: [<?php echo $total_users; ?>, <?php echo $total_narrative; ?>, <?php echo $total_records; ?>],
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Bar CHart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales change to data of the students -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Student Records</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Students Name</th>
                      <th>Student ID</th>
                      <th>Course</th>
                      <th>Major</th>
                    </tr> 
                    </thead>
                    <tbody>
                    <?php
                          
                          $result = mysqli_query($conn, "SELECT * FROM users");
                          while($row = mysqli_fetch_array($result)){

                          ?>
                      <tr>
                        <td scope="row"><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["firstname"] ." ". $row["lastname"]; ?></td>
                        <td><?php echo $row["student_id"]; ?></td>
                        <td><?php echo $row["course"]; ?></td>
                        <td><?php echo $row["specialization"]; ?></td>
                      </tr>
                      <?php

                          }
                          ?>
                    </tbody>
                 </table>
                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">


          <!-- Sentiment Report -->
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Sentiment Analysis</h5>

              <!-- Donut Chart -->
              <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#doughnutChart'), {
                    type: 'doughnut',
                    data: {
                      labels: [
                        'Positive',
                        'Neutral',
                        'Negative'
                      ],
                      datasets: [{
                        label: 'Sentiment Result',
                        data: [<?php echo $total_positive; ?>, <?php echo $total_neutral; ?>, <?php echo $total_negative; ?>],
                        backgroundColor: [
                          'rgb(85, 255, 85)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 75, 75)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Doughnut CHart -->

            </div>
          </div><!-- End Sentiment Report -->


          <!--bar chart Ojt record-->
          <div class="card">

            <div class="card-body pb-0">
            <h5 class="card-title">OJT Records</h5>

            <div id="barChartrecord" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#barChartrecord")).setOption({
                    xAxis: {
                      type: 'category',
                      data: ['Wai', 'Con', 'Cont', 'S_ID', 'Med', 'MOA']//change to ojt records
                    },
                    yAxis: {
                      type: 'value'
                    },
                    series: [{
                      data: [<?php echo $total_waiver;?>, <?php echo $total_concent;?>, <?php echo $total_ojt_id;?>, <?php echo $total_contract;?>, <?php echo $total_medical;?>, <?php echo $total_moa;?>],
                      type: 'bar'
                    }]
                  });
                });
              </script>
              </div>
            </div>
              <!-- End Bar CHart -->
          

        </div><!-- End Right side columns -->

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