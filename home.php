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
  <script src="assets/vendor/testLocalJs/sweetalert.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<div class="header">
        <div class="header-content">
            <img src="img/logo2.png" alt=""class="logo">
        </div>
    </div>
<?php
$email = $_SESSION['useremail'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE email ='$email'");

while($row = mysqli_fetch_array($result)){

?>
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
      <?php
    if($row['profile'] == NULL){
      
      echo "<i class='bi bi-person-square' style='font-size: 100px; color: #fff; margin-left: 80px'></i>";
    }
    else{ 
      echo "<img src='images/".$row['profile']."'style='max-width: 100%; height: auto; border-radius: 50%;'>";
    }
    ?>
        <h1 class="text-light" style="text-align: center;"><a href="home.php"><?php echo $row["firstname"] . " " . $row['lastname']; ?></a></h1>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="home.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="view.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Account</span></a></li>
          <li><a href="ojt_records.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>OJT Records</span></a></li>
          <li><a href="narrative.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Narrative Report</span></a></li>
          <li><a href="logout.php" class="nav-link scrollto"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1><span style="font-size: 3rem; color: #F5A623">Welcome!</span><br><?php echo $row["firstname"] . " " . $row['lastname']; ?></h1>
      <p>Submit your Documents much <span class="typed" data-typed-items="Easier, Faster, Safer"></span>!</p>
      <div class="about-link">
      <a href="#about" class="about-button">About</a></div>
    </div>
  </section><!-- End Hero -->
  <?php
}
?>
  <main id="main">
    
  <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>ABOUT</h2>
          <p style="text-align: justify;">The OJT Records and Narrative Report Archiving System is a digital platform developed to streamline the management of On-the-Job Training (OJT) programs. It enables organizations to efficiently store, track, and evaluate OJT records, including trainee information, training schedules, and performance evaluations. By digitizing and centralizing these records, the system simplifies administrative tasks, enhances data accuracy, and facilitates effective monitoring and assessment of trainees' progress.</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="img/logo3.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>OJT Records and Narrative Reports Archiving System</h3>
            <p class="fst-italic" style="text-align: justify;">
            OJT Records and Narrative Report Archiving System is a comprehensive solution designed to streamline and manage the documentation process of On-the-Job Training (OJT) programs. This system efficiently stores and organizes OJT records, including trainee information, training schedules, performance evaluations, and narrative reports. By digitizing and centralizing these records, the system simplifies access, retrieval, and tracking of OJT data, enabling organizations to effectively monitor and evaluate the progress and performance of trainees. With its user-friendly interface and robust features, the OJT Records and Narrative Report Archiving System enhances the efficiency, accuracy, and accountability of OJT programs, facilitating better decision-making and continuous improvement.
            </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <section id="team" class="about">
      <div class="container">

        <div class="section-title">
          <h2>CHECK OUT OUR TEAM</h2>
          <p style="text-align: justify;">The OJT Records and Narrative Report Archiving System was developed by a talented team of 3WMAD1 students who has an experience in web development, web design and software development. Drawing upon their expertise in software development, database management, and user interface design, the team aimed to tackle the challenges faced by organizations in managing OJT records and narrative reports. The team's commitment to excellence and their dedication to delivering a robust and efficient solution shine through in every aspect of the OJT Records and Narrative Report Archiving System.</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-up">
          <div class="profile">
            <img src="img/10.png" alt="" class='img-fluid rounded-circle'>
        <h1 class="text">Andrea Megan V. Cornejo</h1>
        <p>BS INFO TECH - 3WMAD1</p>
        <div class="row"><div class="soc-link">
          <ul>
            <li><a href="https://www.instagram.com/megandati/"><i class="bi bi-instagram"></i></a></li>
            <li><a href=""><i class="bi bi-facebook"></i></a></li>
            <li><a href=""><i class="bi bi-envelope-fill"></i></a></li>
          </ul>
        </div>
        </div>
      </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up">
          <div class="profile">
            <img src="img/profile.png" alt="" class='img-fluid rounded-circle'>
        <h1 class="text">Vince Arvie I. Cube</h1>
        <p>BS INFO TECH - 3WMAD1</p>
        <div class="row"><div class="soc-link">
          <ul>
            <li><a href="https://www.instagram.com/arvievince/"><i class="bi bi-instagram"></i></a></li>
            <li><a href="https://www.facebook.com/vincearviecube11"><i class="bi bi-facebook"></i></a></li>
            <li><a href="https://mail.google.com/mail/u/1/#inbox?compose=CllgCJZbjGgMmkgwFPQHTlkzrQmqRTGtljzcMWKvNhtnnSxMKSvFXdjBGZDKgXBzhswzGjfVFGB"><i class="bi bi-envelope-fill"></i></a></li>
          </ul>
        </div>
        </div>
      </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up">
            <div class="profile">
            <img src="img/2.png" alt="" class='img-fluid rounded-circle'>
        <h1 class="text">Jasmin A. Jusi</h1>
        <p>BS INFO TECH - 3WMAD1</p>
        <div class="row"><div class="soc-link">
          <ul>
            <li><a href="https://www.instagram.com/jusijasmine/"><i class="bi bi-instagram"></i></a></li>
            <li><a href="https://www.facebook.com/jasmine1001jusi"><i class="bi bi-facebook"></i></a></li>
            <li><a href="https://mail.google.com/mail/u/1/#drafts?compose=GTvVlcRwQLtbzpvTvkTCGgBmsXwSdDRFKrFHVjzCgdKJxPNXwlkNVDvWLPcNkXJmZdbdtHplxMCJL"><i class="bi bi-envelope-fill"></i></a></li>
          </ul>
        </div>
        </div>
      </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>CONTACT</h2>
          <p>Get intouch</p>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Laguna State Polytechnic University - San Pablo City
38M6+6VQ, Cosico Ave, San Pablo City, 4000 Laguna</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>0320-0677@lspu.edu.ph</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+63 945 086 5898</p>
              </div>

              <iframe src="https://www.google.com/maps/embed/v1/place?q=Laguna+State+Polytechnic+University+-+San+Pablo+City,+Cosico+Avenue,+San+Pablo+City,+Laguna,+Philippines&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="contact.php" method="post" role="form" class="info" style="min-height: 640px;">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="contemail" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary" name="send" style="margin: 20px 0; background-color: #F5A623; border: none;">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

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
<?php
}
else{
   #echo "0 results";
}

?>

</html>