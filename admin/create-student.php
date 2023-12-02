<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['useremail'])) {
} else {
    header("location: admin-index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin - Profile</title>
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

                        while ($row = mysqli_fetch_array($result)) {

                        ?>

                            <i class="bi bi-person" style="font-size: 2rem;"></i><!--change it to user profile-->
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row["username"]; ?></span><!--change it to username-->
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $row["username"];
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

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="admin-index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" href="narrative-dashboard.php">
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
                <a class="nav-link collapsed" data-bs-target="#charts-nav" href="ojt-dashboard.php">
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

            </li><!-- End Student Information Nav -->

<li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" href="ojt-field.php">
                <i class="bi bi-person-lines-fill"></i><span>OJT Field</span>
                </a>

            </li><!-- End Create Student Nav -->
            <li class="nav-item">
                <a class="nav-link" data-bs-target="#tables-nav" href="create-student.php">
                    <i class="bi bi-person-square"></i><span>Create User</span>
                </a>

            </li><!-- End Create Student Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
                    <li class="breadcrumb-item active">Create User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <?php echo "<i class='bi bi-person-square' style='font-size: 150px; color: #F5A623'></i>"; ?>
                            <h3>Student</h3>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <h3 style="font-size: 1.5rem; font-weight: 600;">Create User</h3>
                                </li>
                            </ul>

                            <div class="tab-content pt-2">

                                <form action="" method="post" autocomplete="off">
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="firstName">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="lastName">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Birthdate</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input type="date" id="birth" class="form-control" name="birth">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Age</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="number" class="form-control" name="age">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Student ID Number</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="student-ID" placeholder="0320###">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Course</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="course" id="course" class="form-control">
                                                <option value="">Select Course</option>
                                                <option value="BS Information Technology">BS Information Technology</option>
                                                <option value="BS Computer Science">BS Computer Science</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Specialization</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="major" id="major" class="form-control">
                                                <option value="">Select Major</option>
                                                <option value="WMAD">WMAD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="AMG">AMG</option>
                                                <option value="NA">NA</option>
                                                <option value="IS">IS<IS/option>
                                                <option value="GAV">GAV</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="contact" placeholder="0987#######">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="company" placeholder="Company Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Position / Job Description</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="position">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="email" placeholder="username@lspu.edu.ph">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" class="form-control" name="pass">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <ul>
                                            <li><button type="submit" class="btn btn-primary" name="create">Continue</button></li>
                                            <li><a href="student_info.php" class="cancel-btn">Cancel</a></li>
                                        </ul>
                                    </div>
                                </form>

                                <?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/src/Exception.php';
require 'vendor/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/src/SMTP.php';


                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                                if (isset($_POST['create'])) {

                                    $firstName = $_POST['firstName'];
                                    $lastName = $_POST['lastName'];
                                    $birthDay = $_POST['birth'];
                                    $age = $_POST['age'];
                                    $studentID = $_POST['student-ID'];
                                    $course = $_POST['course'];
                                    $major = $_POST['major'];
                                    $address = $_POST['address'];
                                    $contact = $_POST['contact'];
                                    $company = $_POST['company'];
                                    $position = $_POST['position'];
                                    $email = $_POST['email'];
                                    $password = $_POST['pass'];

                                    $query = "SELECT email FROM users WHERE email = '$email'";
                                    $result = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($result) > 0){
                                       echo '
                                        <script>
                                        swal("Sign in Failed!", "The email is already in use. Please use other email.", "warning");
                                        </script>';
                                        
                                    }else{
                                        $mail = new PHPMailer(true);

                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'archivemo2023@gmail.com'; //gmail account
                                        $mail->Password = 'vevhmorfldvdibwc'; //password
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = 465;

                                        $mail->setFrom('archivemo2023@gmail.com', 'ArchiveMo.'); //gmail from you

                                        $mail->addAddress($_POST["email"]);
                                        $mail->addReplyTo('0320-0677@lspu.edu.ph', 'ArchiveMo. Admin');

                                        $mail->isHTML(true);

                                        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

                                        $mail->Subject = "ArchiveMo. Verification code";
                                        $mail->Body =
                                        "
                                        <html>
                                        <head>
                                            <style>
                                                body {
                                                    font-family: 'Poppins', sans-serif;
                                                    background-color: #f4f4f4;
                                                    color: #222;
                                                    margin: 0;
                                                    padding: 0;
                                                }
                                                .container {
                                                    max-width: 500px;
                                                    margin: 0 auto;
                                                    padding: 20px;
                                                    background-color: #fff;
                                                    border-radius: 10px;
                                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                                    border: 1px solid #e8e8e8;
                                                    border-radius: 20px;
                                                    box-shadow: 4px 4px 8px #999;
                                                    position: relative;
                                                    z-index: 1;
                                                }
                                                .logo {
                                                    background-color: #F5A623;
                                                    text-align: center;
                                                    width: 100%;
                                                    height: auto;
                                                    padding: 10px 0;
                                                    border-radius: 25px 25px 0 0;
                                                    position: relative;
                                                    z-index: 2;
                                                }
                                                h2 {
                                                    color: #fff;
                                                    font-size: 2rem;
                                                    font-family: 'Poppins', sans-serif;
                                                }
                                                h1 {
                                                    color: #F5A623;
                                                    text-align: center;
                                                    font-size: 3rem;
                                                    font-family: 'Poppins', sans-serif;
                                                }
                                                p {
                                                    color: #333;
                                                    font-family: 'Poppins', sans-serif;
                                                }
                                                span {
                                                    color: #222;
                                                }
                                            </style>
                                        </head>
                                        <body>
                                            <div class='container'>
                                                <div class='logo'>
                                                    <h2>ArchiveMo<span>.</span></h2>
                                                </div>
                                                <p>Dear Ms/Mr. " . $firstName . " " . $lastName .",</p>
                                                <p>To finish setting up your Microsoft account, we just need to make sure this email address is yours. To verify your email address use this security code:</p>
                                                <h1>" . $verification_code . "</h1>
                                                <p>You can use it to verify your account on ArchiveMo. If you didn't request this code, you can safely ignore this email. Someone else might have typed your email address by mistake.</p>
                                                <p>Thanks,</p>
                                                <p style='color: #F5A623;'><strong>ArchiveMo Team</strong></p>
                                            </div>
                                        </body>
                                        </html>
                                        
";


                                        $mail->send();

                                        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

                                        $sql = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `birthday`, `age`, `student_id`, `course`, `specialization`, `address`, `contact`, `company`, `position`, `email`, `password`, `ver_code`, `verified_at`) VALUES (NULL, '$firstName', '$lastName', '$birthDay', '$age', '$studentID', '$course', '$major', '$address', '$contact', '$company', '$position', '$email', '$encrypted_password', '$verification_code', NULL);";

                                        $fire = mysqli_query($conn, $sql);

                                        if ($fire){
                                            $_SESSION['message'] =
                                            '`
                                            <script>
                                            swal("New User Added!", "New user has been created!", "success");
                                            </script>
                                            `';
                                            echo "<script>window.location.href = 'create-student.php';</script>";
                                        }
                                        else{
                                            $_SESSION['message'] = '`
                                        <script>
                                        swal("Something went wrong!", "There is a problem creating new user.", "warning");
                                        </script>`';
                                        echo "<script>window.location.href = 'create-student.php';</script>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
$conn->close();
?>