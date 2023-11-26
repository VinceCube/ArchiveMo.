<?php
session_start();
include 'dbconn.php';
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

    // If upload button is clicked ...
    if (isset($_POST['upload'])) {

      $profile = $_FILES['image']['name'];

      $new_target = "images/" . basename($profile);
      $sql = "UPDATE `users` SET `profile` = '$profile' WHERE `users`.`email` = '$email'";
      mysqli_query($conn, $sql);
      if (move_uploaded_file($_FILES['image']['tmp_name'], $new_target)) {
        $msg = "Image uploaded successfully";
      } else {
        $msg = "Failed to upload image";
      }
    }
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
              <li><a href="view.php" class="nav-link scrollto active"><i class="bx bx-user"></i> <span>Account</span></a></li>
              <li><a href="ojt_records.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>OJT Records</span></a></li>
              <li><a href="narrative.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Narrative Report</span></a></li>
              <li><a href="logout.php" class="nav-link scrollto"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a></li>
            </ul>
          </nav><!-- .nav-menu -->
        </div>
      </header><!-- End Header -->

      <main id="main">

      <?php

        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }

        ?>
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
          <div class="container">

            <div class="section-title">
              <h2>Profile</h2>
            </div>

            <div class="row">
              <div class="col-lg-4" data-aos="fade-right">
                <?php
                if ($row['profile'] == NULL) {

                  echo "<i class='bi bi-person-square' style='font-size: 150px; color: #F5A623; margin-left: 100px'></i>";
                } else {
                  echo "<img src='images/" . $row['profile'] . "'style='max-width: 100%; height: auto; border-radius: 50%;'>";
                }
                ?>
                <form method="POST" action="view.php" enctype="multipart/form-data">
                  <input type="file" name="image">
                  <input type="submit" name="upload" value="Update" style="border-radius: 5px; border: none; font-weight: 500; padding: 8px 10px;">
                  </form>
              </div>
              <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                <h3><?php echo $row["firstname"] . " " . $row['lastname']; ?></h3>
                <div class="row">
                  <div class="col-lg-6">
                    <ul>
                      <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php echo $row["birthday"]; ?></span></li>
                      <li><i class="bi bi-chevron-right"></i> <strong>Address</strong> <span><?php echo $row["address"]; ?></span></li>
                      <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo $row["contact"]; ?></span></li>
                      <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $row["email"]; ?></span></li>
                    </ul>
                  </div>
                  <div class="col-lg-6 age-sec">
                    <ul>
                      <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?php echo $row["age"]; ?></span></li>
                      <li><i class="bi bi-chevron-right"></i> <strong>Student ID</strong> <span><?php echo $row["student_id"]; ?></span></li>
                      <li><i class="bi bi-chevron-right"></i> <strong>Course:</strong> <span><?php echo $row["course"]; ?></span></li>
                      <li><i class="bi bi-chevron-right"></i> <strong>Specialization:</strong> <span><?php echo $row["specialization"]; ?></span></li>
                    </ul>
                    <ul class="log">
                      <li><button type="button" class="btn updatebtn" style="background-color: #F5A623; color: #fff;" data-bs-toggle="modal" data-bs-target="#editmodal"><i class="bi bi-pencil-square" style="font-size: 15px; color: #fff;"> </i>Edit profile</button></li>
                      <li><a href="logout.php" class="log-button">Logout</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </section>

        <?php
        if (isset($_POST['updatedata'])) {
          
          $id = $_POST['update_id'];
          
          $firstName = $_POST['firstName'];
          $lastName = $_POST['lastName'];
          $birth = $_POST['birth'];
          $age = $_POST['age'];
          $st_id = $_POST['student_id'];
          $course = $_POST['course'];
          $specialization = $_POST['major'];
          $address = $_POST['address'];
          $contact = $_POST['contact'];
          $em = $_POST['email'];
          $password = $_POST['pas'];
          $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

          $sql = "UPDATE `users` SET `firstname` = '$firstName', `lastname` = '$lastName', `birthday` = '$birth', `age` = '$age', `student_id` = '$st_id', `course` = '$course', `specialization` = '$specialization', `contact` = '$contact', `address` = '$address', `email` = '$em', `password` = '$encrypted_password' WHERE `users`.`id` = $id";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = '   
                
                <script>
                swal("Success!", "Account Information updated!", "success");
                </script>
                ';
                echo "<script>window.location.href = 'view.php';</script>";
                exit;
            } else {
                $_SESSION['message'] = '    <script>
                swal("Something went wrong!", "There is a problem updating information.", "warning");
                </script>';
                echo "<script>window.location.href = 'view.php';</script>";
                exit();
            }
          }
          ?>
        <!-- UPDATE CUSTOMER DATA SECTION -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Personal Information </h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
              </div>

              <form action="" method="POST">

                <div class="modal-body">

                  <input type="hidden" name="update_id" id="update_id" value="<?php echo $row["id"]; ?>">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="fullName" style="font-size: 15px; font-weight: 500;">First name</label>
                        <input type="text" name="firstName" value="<?php echo $row["firstname"]; ?>">
                      </div>

                      <div class="form-group">
                        <label for="fullName" style="font-size: 15px; font-weight: 500;">Birthdate</label>
                        <input type="date" id="birth" class="form-control" name="birth" value="<?php echo $row["birthday"]; ?>">
                      </div>

                      <div class="form-group">
                        <label for="fullName" style="font-size: 15px; font-weight: 500;">Address</label>
                        <input type="text" name="address" value="<?php echo $row["address"]; ?>">
                      </div>

                      <div class="form-group">
                        <label for="fullName" style="font-size: 15px; font-weight: 500;">Student ID</label>
                        <input type="text" name="student_id" value="<?php echo $row["student_id"]; ?>">
                      </div>

                      <div class="form-group">
                        <label for="fullName" style="font-size: 15px; font-weight: 500;">Course</label>
                        <select name="course" id="course" class="form-control">
                          <option value="<?php echo $row["course"]; ?>"><?php echo $row["course"]; ?></option>
                          <option value="BS Information Technology">BS Information Technology</option>
                          <option value="BS Computer Science">BS Computer Science</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="fullName" style="font-size: 15px; font-weight: 500;">Specialization</label>
                        <select name="major" id="major" class="form-control">
                          <option value="<?php echo $row["specialization"]; ?>"><?php echo $row["specialization"]; ?></option>
                          <option value="WMAD">WMAD</option>
                          <option value="SMP">SMP</option>
                          <option value="AMG">AMG</option>
                          <option value="NA">NA</option>
                          <option value="IS">IS</option>
                          <option value="GAV">GAV</option>
                        </select>
                      </div>
                    </div><!-- 1st column -->

                    <div class="col" style="margin-bottom: auto;">
                      <div class="form-group">
                        <label for="fullName" style="font-size: 15px; font-weight: 500;">Last name</label>
                        <input type="text" name="lastName" value="<?php echo $row["lastname"]; ?>">
                      </div>

                      <div class="form-group">
                        <label for="fullName" style="font-size: 15px; font-weight: 500;">Age</label>
                        <input type="text" name="age" value="<?php echo $row["age"]; ?>">
                      </div>

                      <div class="form-group">
                        <label for="fullName" style="font-size: 15px; font-weight: 500;">Contact No.</label>
                        <input type="text" name="contact" value="<?php echo $row["contact"]; ?>">
                      </div>

                      <div class="form-group">
                        <label for="fullName" style="font-size: 15px; font-weight: 500;">Email Address</label>
                        <input type="text" name="email" value="<?php echo $row["email"]; ?>">
                      </div>

                      <div class="form-group">
                        <label for="fullName" style="font-size: 15px; font-weight: 500;">Password</label>
                        <input type="password" name="pas" value="<?php echo md5($row["password"]); ?>">
                      </div>
                    </div><!-- end of column2 -->
                  </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updatedata" class="btn" style="background-color: #F5A623; color: #fff;">Confirm</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
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

        <!-- testLocalJS CJ-->
        <script src="assets/vendor/testLocalJs/jquery.min.js"></script>
        <script src="assets/vendor/testLocalJs/popper.min.js"></script>
        <script src="assets/vendor/testLocalJs/bootstrap.min.js"></script>
        <script src="assets/vendor/testLocalJs/dataTables.min.js"></script>
        <script src="assets/vendor/testLocalJs/bootstrap4.min.js"></script>
        <script src="assets/js/jquery.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>


      </main>
  <?php
    }
  } else {
    #echo "0 results";
  }

  ?>
  </script>
  </body>

  </html>