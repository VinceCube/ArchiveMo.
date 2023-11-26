<?php
session_start();
include 'dbconn.php';

$email = $_SESSION['useremail'];
if (isset($_SESSION['useremail'])) {
} else {
  header("location: admin-index.php");
}
?>
<?php
$sql = "SELECT username, password FROM admin";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ArchiveMo - Home</title>
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

    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="admin-index.php" class="logo d-flex align-items-center">
          <img src="img/logo3.png" alt="" style="width: auto; height: 60px">
          <span class="logo-name">ArchiveMo<span style="color: #F5A623; font-family: Poppins, sans-serif">.</span></span>
        </a>
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
                <h6><?php echo $row["username"];
                  }
                } ?></h6><!--change to username-->
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

    <main id="main" style="margin-left: 0px;">

      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
            <li class="breadcrumb-item active"><a href="narrative-dashboard.php">Narrative Reports</a></li>
            <li class="breadcrumb-item active">Download Narrative</li>
          </ol>
        </nav>
      </div>

      <!---narrative report form and sentiment analisys-->

      <section class=" section dashboard">


        <?php
        if (isset($_GET['id'])) {
          $id = $_GET['id'];

          // Find the requested file in the database
          $sql = "SELECT file_name FROM narrative WHERE id = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $filename = $row['file_name'];
            $stmt->close();

            $file = '../images/pdf/' . $filename;

            // Check if the file exists
            if (file_exists($file)) {
              // Set headers for file download
              header('Content-Type: application/octet-stream');
              header('Content-Disposition: attachment; filename="' . $filename . '"');
              header('Content-Length: ' . filesize($file));
              header('Pragma: public');
              header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
              header('Expires: 0');

              // Send the file to the browser for download
              ob_clean();
              flush();
              readfile($file);
              exit;
            } else {
              echo 'File not found.';
            }
          } else {
            echo 'Invalid file ID.';
          }
        }

        // Fetch the list of files from the database
        ?>
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="card-body">
                <h5 class="card-title">Narrative Reports</h5>
                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Narrative Reports</th>
                      <th>Email</th>
                      <th>Sentiment</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM narrative");
                    while ($row = mysqli_fetch_array($result)) {

                    ?>
                      <tr>
                        <td scope="row"><?php echo $row["id"]; ?></td>
                        <td><a href="?id=<?php echo $row['id']; ?>"><?php echo $row['file_name']; ?></td>
                        <td><?php echo $row["user"]; ?></td>
                        <td>
                          <?php
                          if ($row["sentiment_result"] == "Negative") {
                            echo "<p style='color:red; background-color: rgba(255, 0, 0, 0.384); border-radius: 2px; padding: 2px;'>" . $row["sentiment_result"] . "</p>";
                          } else if ($row["sentiment_result"] == "Positive") {
                            echo "<p style='color: green; background-color: rgba(0, 128, 0, 0.355); border-radius: 2px; padding: 2px;'>" . $row["sentiment_result"] . "</p>";
                          } else {
                            echo "<p style='color:orange; background-color: rgba(255, 166, 0, 0.371); border-radius: 2px; padding: 2px;'>" . $row["sentiment_result"] . "</>";
                          }
                          ?>
                        </td>
                        <td><?php echo $row["date"]; ?></td>
                      </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- End Recent Sales -->
      </section><!-- End About Section -->

    </main>


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

  <?php
  // Close the database connection
  $conn->close();
  ?>