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

    <style>
       .legend{
        float: right;
      }
       .inline-list {
        display: inline-flex;
        list-style: none;
    }

    .inline-list li {
        margin-right: 20px; /* Adjust as needed */
        align-items: center;
        justify-content: space-between;
    }

    .emoji img {
        display: block; /* Ensures the images are displayed as blocks for better alignment */
    }
      .emoji li img {
        width: 50px;
        height: auto;
      }


      tr:nth-child(even) {
        background-color: #ededed;
      }
    </style>
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
                                                                                }
                                                                              } ?></a></h1>
          </div>

          <nav id="navbar" class="nav-menu navbar">
            <ul>
              <li><a href="home.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Home</span></a></li>
              <li><a href="view.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Account</span></a></li>
              <li><a href="ojt_records.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>OJT Records</span></a></li>
              <li><a href="narrative.php" class="nav-link scrollto active"><i class="bx bx-book-content"></i> <span>Narrative Report</span></a></li>
              <li><a href="logout.php" class="nav-link scrollto"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a></li>
            </ul>
          </nav><!-- .nav-menu -->
        </div>
      </header><!-- End Header -->

      <main id="main">
        <!---narrative report form and sentiment analisys-->

        <section id="narrative" class="narrative">
          <div class="container">
            <div class="section-title" style="padding-top: 10px;">
            <div class="legend">
                <ul class="emoji inline-list">
                  <li><img src="img/Happy.png" alt="">&nbsp<h6>Positive</h6></li>
                  <li><img src="img/smile.png" alt="">&nbsp <h6>Neutral</h6></li>
                  <li><img src="img/sad.png" alt="">&nbsp <h6>Negative</h6></li>
                </ul>
              </div>
              <h2>Narrative Report</h2>
            </div>

            <?php

            if (isset($_SESSION['message'])) {
              echo $_SESSION['message'];
              unset($_SESSION['message']);
            }

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

            $sql = "DELETE FROM narrative WHERE id = $id";
            $query_run = mysqli_query($conn, $sql);

            if ($query_run) {
              $_SESSION['message'] = '   `
    
    <script>
    swal("Success!", "Poof! The file has been successfully deleted!", "success");
    </script>
    `';
              echo "<script>window.location.href = 'narrative_view.php';</script>";
              exit;
            } else {
              $_SESSION['message'] = '    <script>
    swal("Something went wrong!", "There is a problem removing the file.", "warning");
    </script>';
              echo "<script>window.location.href = 'narrative_view.php';</script>";
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
                          <th>Narrative Reports</th>
                          <th>Sentiment Result</th>
                          <th>Date</th>
                          <th>View</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM narrative WHERE `user` = '$email'");
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                          <tr>
                            <td scope="row"><?php echo $row["id"]; ?></td>
                            <td><a href="?id=<?php echo $row['id']; ?>"><?php echo $row['file_name'];?></td>
                            <td><?php
                                if ($row["sentiment_result"] == "Negative") {
                                  echo "<img src='img/sad.png' style='width: auto; height: 55px; border-radius: 50%;'>";
                                } else if ($row["sentiment_result"] == "Positive") {
                                  echo "<img src='img/Happy.png' style='width: auto; height: 55px; border-radius: 50%;'>";
                                } else {
                                  echo "<img src='img/smile.png' style='width: auto; height: 60px; border-radius: 50%;'>";
                                }
                                ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            <td><a href="javascript:void(0);" class="btn btn-primary viewmodal" data-id="<?php echo $row['id']; ?>" data-waiver="<?php echo $row['file_name']; ?>">VIEW</a></td>
                            <td><button type="button" class="btn btn-danger deletebtn"><i class="bi bi-trash" style="font-size: 15px;"></i> DELETE </button></td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

        </section><!-- End About Section -->

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
            var narrative = $(this).data('waiver');

            // Update the modal content with the data
            $('#modal-body-content').html('<iframe src="images/pdf/' + narrative + '" class="embed-responsive custom-iframe" frameborder="0" style="width: 100%; height: 80vh;"></iframe>');

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

  </body>

  </html>

  <?php
  // Close the database connection
  $conn->close();
  ?>