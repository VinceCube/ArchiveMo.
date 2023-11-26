<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['useremail'])){
}
else{
	header("location:index.php");
}
?>
<?php
$sql = "SELECT email, password FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0){
 // output data of each row
   while($row = $result->fetch_assoc()) {

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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<div class="header">
        <div class="header-content">
            <img src="img/logo.png" alt=""class="logo">
        </div>
    </div>
<?php
$db = mysqli_connect("localhost", "root", "", "itst302");
$email = $_SESSION['useremail'];
$result = mysqli_query($db, "SELECT * FROM users WHERE email ='$email'");

while($row = mysqli_fetch_array($result)){

?>
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
      <?php
    echo "<img src='images/".$row['profile']."'class='img-fluid rounded-circle'>";?>
        <h1 class="text-light" style="text-align: center;"><a href="home.php"><?php echo $row["firstname"] . " " . $row['lastname']; ?></a></h1>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="home.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="view.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Account</span></a></li>
          <li><a href="404_file.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>OJT Records</span></a></li>
          <li><a href="404_file.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Narrative Report</span></a></li>
          <li><a href="logout.php" class="nav-link scrollto"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
<?php
}
?>
  <main id="main">
    
  <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>404</h1>
        <h2>The page you are looking for doesn't exist.</h2>
        <a class="btn" href="index.php">Back to home</a>
        <img src="img/404.svg" class="img-fluid" alt="Page Not Found" style="width: 100%; height:400px;">
      </section>

    </div>

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

  <?php
}
else{
   #echo "0 results";
}

?>

</body>

</html>