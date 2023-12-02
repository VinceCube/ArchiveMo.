<?php
session_start();
include 'dbconn.php';

$email = $_SESSION['useremail'];
if (isset($_SESSION['useremail'])) {
} else {
  header("location:index.php");
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
            <h1 class="text-light" style="text-align: center;"><a href="home.php"><?php echo $row["firstname"] . " " . $row['lastname'];
                                                                                } ?></a></h1>
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

        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }
        if (isset($_POST['submit'])) {
          $pname = rand(1000, 10000) . "_" . $_FILES["file"]["name"];
          $tname = $_FILES["file"]["tmp_name"];
          $date = $_POST['date'];

          $upload_dir = 'images/pdf';
          move_uploaded_file($tname, $upload_dir . '/' . $pname);

          $sql = "INSERT INTO `records` (`id`, `email`, `waiver`,`date`) VALUES (NULL, ?, ?, ?)";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, "sss", $email, $pname, $date);


          if (mysqli_stmt_execute($stmt)) {

            $_SESSION['message'] = '   ` <script>
	swal("Success!", "Waiver successfully submitted.", "success");
	</script>`';
            echo "<script>window.location.href = 'waiver_form.php';</script>";
            exit(); // Add this line to stop further execution
          } else {
            echo "Error: " . mysqli_error($conn);
          }
          mysqli_stmt_close($stmt);
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
                <h1>Waiver</h1>
                <p>(PDF copy)</p>
                <form action="waiver_form.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                  <?php $currentDate = date('m/d/Y'); ?>
                  <input type="hidden" name="date" value="<?php echo $currentDate; ?>">
                  <input type="file" name="file" id="file"><!--narrative-->

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
              $sql = "SELECT waiver FROM records WHERE id = ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("i", $id);
              $stmt->execute();
              $result = $stmt->get_result();

              if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $filename = $row['waiver'];
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
            
            <!-- Your HTML code for the modal -->
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

            <div class="row ojt-center" data-aos="fade-up">
              <div class="col-12">
                <div class="card recent-sales overflow-auto">
                  <div class="card-body">
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Email</th>
                          <th>Waiver</th>
                          <th>Date</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM records WHERE records.email = '$email'");
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                          <tr>
                            <td scope="row"><?php echo $row["id"]; ?></td>
                            <td scope="row"><?php echo $row["email"]; ?></td>
                            <td><a href="?id=<?php echo $row['id']; ?>"><?php echo $row['waiver'];?></td>
                            <td scope="row"><?php echo $row["date"]; ?></td>
                            <td><a href="javascript:void(0);" class="btn btn-primary viewmodal" data-id="<?php echo $row['id']; ?>" data-waiver="<?php echo $row['waiver']; ?>">VIEW</a></td>
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

      <!-- Include jQuery and Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

      <script>
        $(document).ready(function() {
          $('.viewmodal').on('click', function() {
            var recordId = $(this).data('id');
            var waiver = $(this).data('waiver');

            // Update the modal content with the data
            $('#modal-body-content').html('<iframe src="images/pdf/' + waiver + '" class="embed-responsive custom-iframe" frameborder="0" style="width: 100%; height: 80vh;"></iframe>');

            // Open the modal
            $('#viewmodal').modal('show');
          });
        });
      </script>

    <?php
  }
    ?>

  </body>

  </html>