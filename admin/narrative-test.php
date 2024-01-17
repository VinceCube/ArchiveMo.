<?php
session_start();
include 'dbconn.php';

$email = $_SESSION['useremail'];
if (isset($_SESSION['useremail'])) {
} else {
  echo "<script>window.location.href='admin-index.php';</script>";
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
        <!-- narrative viewer -->
        <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" id="close" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="modal-body-content">
                <!-- Modal content will be dynamically loaded here -->
              </div>
              <div class="modal-footer">
                <button type="button" id="closeAndOpenModalBtn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Codes for the delete modal -->
        <?php

        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }

        if (isset($_POST['deletedata'])) {
          $id = $_POST['id'];

          $sql = "DELETE FROM narrative WHERE id = $id";
          $query_run = mysqli_query($conn, $sql);

          if ($query_run) {
            $_SESSION['message'] = '   `

<script>
swal("Success!", "Poof! The file has been deleted!", "success");
</script>
`';
            echo "<script>window.location.href = 'narrative-test.php';</script>";
            exit;
          } else {
            $_SESSION['message'] = '    <script>
swal("Something went wrong!", "There is a problem removing inventory.", "warning");
</script>';
            echo "<script>window.location.href = 'narrative-test.php';</script>";
            exit();
          }
        }

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
                    <th>View</th>
                    <th>Delete</th>
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
                          echo "<p style='color:orange; background-color: rgba(255, 166, 0, 0.371); border-radius: 2px; padding: 2px;'>" . $row["sentiment_result"] . "</p>";
                        }
                        ?>
                      </td>
                      <td><?php echo $row["date"]; ?></td>
                      <td><a href="javascript:void(0);" class="btn btn-primary viewmodal" data-id="<?php echo $row['id']; ?>" data-waiver="<?php echo $row['file_name']; ?>">VIEW</a></td>
                      <td><button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#deletemodal<?php echo $row['id']; ?>"><i class="bi bi-trash" style="font-size: 15px;"></i> DELETE </button>

                        <!-- Delete Inventory Modal -->

                        <div class="modal fade" id="deletemodal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" id="close" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                              </div>

                              <form action="" method="POST">

                                <div class="modal-body">

                                  <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">

                                  <div class="position-relative" style="align-items: center; text-align: center;">
                                    <i class="bi bi-exclamation-circle" style="color: #FFB22E; font-size: 6rem;"></i>
                                    <h5 style="font-weight: 600; font-size: 30px;"> Are you sure?</h5>
                                    <h6 style="font-size: 20px; font-weight: 400;">Once deleted, you will not be able to recover this data!</h6>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" id="closeAndOpenModalBtn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="submit" name="deletedata" class="btn btn-primary"> Confirm </button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.viewmodal').on('click', function() {
          var recordId = $(this).data('id');
          var waiver = $(this).data('waiver');

          // Update the modal content with the data
          $('#modal-body-content').html('<iframe src="../images/pdf/' + waiver + '" class="embed-responsive custom-iframe" frameborder="0" style="width: 100%; height: 80vh;"></iframe>');

          // Open the modal
          $('#viewmodal').modal('show');
        });
      });
    </script>

  </body>

  </html>

  <?php
  // Close the database connection
  $conn->close();
  ?>