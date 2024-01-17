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
      #narrative ul {
        position: relative;
      }

      #narrative ul li {
        align-items: center;
        display: inline-flex;
        list-style-type: none;
        margin: 0 10px;
      }

      #narrative ul li a {
        border: 1px #F5A623 solid;
        padding: 7px 25px;
        border-radius: 10px;
        transition: 0.5s ease;
      }

      #narrative ul li a:hover {
        background-color: #F5A623;
        color: #fff;

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
        <?php

        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }

        include './vendor/autoload.php';

        use Sentiment\Analyzer;
        use Stichoza\GoogleTranslate\GoogleTranslate;
        use Smalot\PdfParser\Parser;

        $analyzer = new Analyzer();
        $tr = new GoogleTranslate('en'); // Translates into English

        if (isset($_POST['submit'])) {

          $date = $_POST['date'];
          $pname = rand(1000, 10000) . "_" . $_FILES["file"]["name"];
          $tname = $_FILES["file"]["tmp_name"];

          // Extract text from PDF
          $pdfText = extractTextFromPdf($tname);

          // Translate the user input to English
          $translated_text = $tr->setSource('fil')->setTarget('en')->translate($pdfText);

          // Perform sentiment analysis on the extracted text
          $sentiment = analyzeSentiment($pdfText);

          $upload_dir = 'images/pdf';
          move_uploaded_file($tname, $upload_dir . '/' . $pname);

          $sql = "INSERT INTO `narrative` (`id`, `file_name`, `user`, `sentiment`, `sentiment_result`, `date`) VALUES (NULL, ?, ?, ?, ?, ?)";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, "sssss", $pname, $email, $translated_text, $sentiment, $date);

          if (mysqli_stmt_execute($stmt)) {
            $_SESSION['message'] = '   ` <script>
          swal("Success!", "Narrative Report successfully submitted.", "success");
          </script>`';
            echo "<script>window.location.href = 'narrative_view.php';</script>";
            exit(); // Add this line to stop further execution
          } else {
            echo "Error: " . mysqli_error($conn);
          }
          mysqli_stmt_close($stmt);
        }

        function analyzeSentiment($pdfText)
        {
          $analyzer = new Analyzer();
          $output_text = $analyzer->getSentiment($pdfText);
          if ($output_text['pos'] * 100 > $output_text['neg'] * 100) {
            return 'Positive';
          } elseif ($output_text['neg'] * 100 > $output_text['pos'] * 100) {
            return 'Negative';
          } else {
            return 'Neutral';
          }
        }

        function extractTextFromPdf($pdfPath)
        {
          $parser = new Parser();
          $pdf    = $parser->parseFile($pdfPath);

          return $pdf->getText();
        }

        ?>
        <section id="narrative" class="narrative">
          <div class="container">
            <div class="section-title">
              <h2>Narrative Report</h2>
            </div>

            <div class="row" data-aos="fade-up">
              <div class="col-lg-2 blank_page">
                <i class="bx bx-file"></i>
              </div>
              <div class="col-lg-8  form-narrative">
                <h1>Narrative Report</h1>
                <p>(PDF copy only)</p>
                <form action="narrative.php" method="POST" autocomplete="off" enctype="multipart/form-data">

                  <?php $currentDate = date('m/d/Y'); ?>
                  <input type="hidden" name="date" value="<?php echo $currentDate; ?>">
                  <input type="file" name="file" id="file"><!--narrative-->
                  <ul>
                    <li><a href="narrative_view.php"><i class="bi bi-folder2-open">&nbsp View Narrative</i></a>
                    </li>
                    <li>
                      <label for="upload">
                        <i class="bi bi-upload"></i>
                        &nbsp Upload</label>
                      <input type="submit" name="submit" id="upload">
                    </li>
                  </ul>

                </form>
              </div>
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


  </body>

  </html>