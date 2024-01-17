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
$sql = "SELECT email, password FROM users";
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="assets/vendor/testLocalJs/sweetalert.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

  <body>
    <div class="header">
      <div class="header-content">
        <img src="img/logo.png" alt="" class="logo">
      </div>
    </div>
    <?php
    $msg = "";
    $email = $_SESSION['useremail'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email ='$email'");

    while ($row = mysqli_fetch_array($result)) {

    ?>
      <!-- ======= Mobile nav toggle button ======= -->
      <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

      <!-- ======= Header ======= -->
      <header id="header">
        <div class="d-flex flex-column">

          <div class="profile">
            <?php
            if ($row['profile'] == NULL) {

              echo "<i class='bi bi-person-square' style='font-size: 100px; color: #fff; margin-left: 80px'></i>";
            } else {
              echo "<img src='images/" . $row['profile'] . "'style='max-width: 100%; height: auto; border-radius: 50%;'>";
            }
            ?>
            <h1 class="text-light" style="text-align: center;"><a href="home.php"><?php echo $row["firstname"] . " " . $row['lastname']; ?></a></h1>
          </div>

          <nav id="navbar" class="nav-menu navbar">
            <ul>
              <li><a href="home.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Home</span></a></li>
              <li><a href="view.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Account</span></a></li>
              <li><a href="ojt_records.php" class="nav-link scrollto active"><i class="bx bx-file-blank"></i> <span>OJT Records</span></a></li>
              <li><a href="narrative.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Narrative Report</span></a></li>
              <li><a href="logout.php" class="nav-link scrollto"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a></li>
            </ul>
          </nav><!-- .nav-menu -->
        </div>
      </header><!-- End Header -->

      <main id="main">
        <!--inserting to database-->

        <?php

        function getExistingFile($email)
        {
          global $conn;

          $query = "SELECT ojt_id FROM ojt_id WHERE email = ?";
          $stmt = mysqli_prepare($conn, $query);
          mysqli_stmt_bind_param($stmt, "s", $email);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);

          if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $existing_file);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
            return $existing_file;
          } else {
            mysqli_stmt_close($stmt);
            return false;
          }
        }

        $email = $_SESSION['useremail'];

        $existing_file = getExistingFile($email);

        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }

        if (isset($_POST['submit'])) {
          if (!$existing_file) {
            $pname = rand(1000, 10000) . "_" . $_FILES["file"]["name"];
            $tname = $_FILES["file"]["tmp_name"];
            $date = $_POST['date'];

            $upload_dir = 'images/pdf';
            move_uploaded_file($tname, $upload_dir . '/' . $pname);

            $sql = "INSERT INTO `ojt_id` (`id`, `email`, `ojt_id`, `date`) VALUES (NULL, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $email, $pname, $date);

            if (mysqli_stmt_execute($stmt)) {
              $_SESSION['message'] = '<script>
                swal("Success!", "Registration Certificate successfully submitted.", "success");
            </script>';
              echo "<script>window.location.href = 'student-id_form.php';</script>";
              exit();
            } else {
              echo "Error: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
          } else {
            echo '<script>
            swal("Error!", "You can only upload one file. Delete the existing file if you want to upload a new one.", "error");
        </script>';
          }
        }
        ?>

        <section id="narrative" class="narrative">
          <div class="container">
            <div class="section-title">
              <h2>OJT Records</h2>
            </div>

            <div class="row" data-aos="fade-up">
              <div class="col-lg-2 blank_page">
                <i class="bx bx-file"></i>
              </div>
              <div class="col-lg-8  form-narrative">
                <h1>Registration Certificate</h1>
                <p>(PDF copy)</p>
                <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                  <input type="file" name="file" id="file"><!--narrative-->
                  <?php $currentDate = date('m/d/Y'); ?>
                  <input type="hidden" name="date" value="<?php echo $currentDate; ?>">
                  <label for="upload">
                    <i class="bi bi-upload"></i>
                    &nbsp Upload</label>
                  <input type="submit" name="submit" id="upload">

                </form>
              </div>
            </div>

            <?php


            if (isset($_GET['id'])) {
              $id = $_GET['id'];

              // Find the requested file in the database
              $sql = "SELECT ojt_id FROM ojt_id WHERE id = ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("i", $id);
              $stmt->execute();
              $result = $stmt->get_result();

              if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $filename = $row['ojt_id'];
                $stmt->close();

                $file = 'images/pdf/' . $filename;

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

            <!-- modal for viewing -->
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

            <!-- delete modal -->
          <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" id="close" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
                </div>

                <form action="" method="POST">

                  <div class="modal-body">

                    <input type="hidden" name="id" id="id">

                    <div class="position-relative" style="align-items: center; text-align: center;">
                      <i class="bi bi-exclamation-circle" style="color: #FFB22E; font-size: 6rem;"></i>
                      <h5 style="font-weight: 600; font-size: 30px;"> Are you sure?</h5>
                      <h6 style="font-size: 20px; font-weight: 400;">Once deleted, you will not be able to recover this file!</h6>
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

          <?php

          if (isset($_POST['deletedata'])) {
            $id = $_POST['id'];

            $sql = "DELETE FROM ojt_id WHERE id = $id";
            $query_run = mysqli_query($conn, $sql);

            if ($query_run) {
              $_SESSION['message'] = '   `
    
    <script>
    swal("Success!", "Poof! The file has been successfully deleted!", "success");
    </script>
    `';
              echo "<script>window.location.href = 'student-id_form.php';</script>";
              exit;
            } else {
              $_SESSION['message'] = '    <script>
    swal("Something went wrong!", "There is a problem removing the file.", "warning");
    </script>';
              echo "<script>window.location.href = 'student-id_form.php';</script>";
              exit();
            }
          }

          ?>

            <div class="row ojt-center" data-aos="fade-up">
              <div class="col-12">
                <div class="card recent-sales overflow-auto">
                  <div class="card-body">
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Email</th>
                          <th>Student ID</th>
                          <th>Date</th>
                          <th>View</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM ojt_id WHERE email = '$email'");
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                          <tr>
                            <td scope="row"><?php echo $row["id"]; ?></td>
                            <td scope="row"><?php echo $row["email"]; ?></td>
                            <td><a href="?id=<?php echo $row['id']; ?>"><?php echo $row['ojt_id']; ?></td>
                            <td scope="row"><?php echo $row["date"]; ?></td>
                            <td><a href="javascript:void(0);" class="btn btn-primary viewmodal" data-id="<?php echo $row['id']; ?>" data-ojt_id="<?php echo $row['ojt_id']; ?>">VIEW</a></td>
                            <td><button type="button" class="btn btn-danger deletebtn"><i class="bi bi-trash" style="font-size: 15px;"></i> DELETE </button></td>
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
          </div>
        </section>


      </main><!-- End #main -->

      <!-- ======= Footer ======= -->
      <footer id="footer">
        <div class="container">
          <div class="copyright">
            &copy; Copyright <strong><span>ArchiveMo</span></strong>
          </div>

        </div>
      </footer><!-- End  Footer -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->
      <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
      <script src="assets/vendor/aos/aos.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="assets/vendor/typed.js/typed.min.js"></script>
      <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>

      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>

      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script>
        $(document).ready(function() {
          $('.viewmodal').on('click', function() {
            var recordId = $(this).data('id');
            var ojt_id = $(this).data('ojt_id');

            // Update the modal content with the data
            $('#modal-body-content').html('<iframe src="images/pdf/' + ojt_id + '" class="embed-responsive custom-iframe" frameborder="0" style="width: 100%; height: 80vh;"></iframe>');

            // Open the modal
            $('#viewmodal').modal('show');
          });
        });
      </script>

<script>
    $(document).ready(function() {

      $('.deletebtn').on('click', function() {

        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);

      });
    });
  </script>

  <?php
    }
  }
  ?>

  </body>

  </html>