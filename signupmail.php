<?php
include 'dbconn.php';
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>ArchiveMo</title>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/logo3.png" rel="icon">

    <script src="assets/vendor/testLocalJs/sweetalert.min.js"></script>
    <!-- testLocalJS CJ-->
    <script src="assets/vendor/testLocalJs/jquery.min.js"></script>
    <script src="assets/vendor/testLocalJs/popper.min.js"></script>
    <script src="assets/vendor/testLocalJs/bootstrap.min.js"></script>
    <script src="assets/vendor/testLocalJs/dataTables.min.js"></script>
    <script src="assets/vendor/testLocalJs/bootstrap4.min.js"></script>
    <script src="assets/js/jquery.js"></script>

    <style>
        .login {
            background-color: #F5A623;
            border: none;
            width: 100%;
        }

        .login:hover {
            background-color: #e68e00;
        }

        .row {
            display: flex;
            width: 150%;
            text-align: center;
            justify-content: center;
            align-items: center;
            margin: auto;
        }

        .col {
            width: 100%;
        }

        @media only screen and (min-width: 360px) and (max-width: 576px) {
            .card{
                width: 100%;
            margin: auto;
            }
            form{
                margin: 0 90px;
            }
            .header-content img{
                display: none;
            }
        }

        /* Responsive styles for screens up to 576px */
        @media only screen and (max-width: 576px) {
            .container {
                width: 100%;
            }

            .card {
                width: 80%;
                margin: 0;
            }
        }

        /* Responsive styles for screens between 577px and 768px */
        @media only screen and (min-width: 577px) and (max-width: 768px) {
            .container {
                width: 100%;
            }

            .card {
                width: 80%;
                margin: 0;
            }
            form{
                margin: 0 60px;
            }
        }

        /* Responsive styles for screens between 769px and 992px */
        @media only screen and (min-width: 769px) and (max-width: 992px) {
            .container {
                width: 80%;
            }

            .card {
                width: 100%;
                margin: 0;
            }
            form{
                margin: 0 50px;
            }
        }

        /* Responsive styles for screens between 993px and 1200px */
        @media only screen and (min-width: 993px) and (max-width: 1200px) {
            .container {
                width: 80%;
            }

            .card {
                width: 100%;
                margin: 0;
            }
        }

        /* Responsive styles for screens larger than 1200px */
        @media only screen and (min-width: 1201px) {
            .container {
                width: 60%;
            }

            .card {
                width: 570px;
                margin: auto;
            }
        }
    </style>

</head>

<body>
    <main class="main">
        <div class="header">
            <div class="header-content">
                <img src="img/logo.png" alt="" class="logo">
            </div>
        </div>

        <div class="container" style="text-align: center; align-items:center; justify-content:center;">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <div class="card position-absolute top-50 start-50 translate-middle" style="width: 570px; margin: auto; justify-content: center;">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <img src="img/logo.png" alt="" class="logo" style="width: 200px; margin: auto;">
                            <h4>Sign up</h4>
                        </div>

                        <form method="POST" action="signupmail.php">
                            <div class="row row-cols-9 row-cols-sm-9">
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="firstName" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="birth">Birthdate</label>
                                        <input type="date" id="birth" class="form-control" name="birth" placeholder="Birthdate">
                                    </div>
                                </div>
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" name="age" placeholder="Age">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="student-ID">Student Number</label>
                                        <input type="text" class="form-control" name="student-ID" placeholder="0320###">
                                    </div>
                                </div>
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="course">Course</label>
                                        <select name="course" id="course" class="form-control">
                                            <option value="">Select Course</option>
                                            <option value="BS Information Technology">BS Information Technology</option>
                                            <option value="BS Computer Science">BS Computer Science</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="major">Major/Specialization</label>
                                        <select name="major" id="major" class="form-control">
                                            <option value="">Select Major</option>
                                            <option value="WMAD">WMAD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="AMG">AMG</option>
                                            <option value="NA">NA</option>
                                            <option value="IS">IS</option>
                                            <option value="GAV">GAV</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="contact">Contact</label>
                                        <input type="text" class="form-control" name="contact" placeholder="0987#######">
                                    </div>
                                </div>
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" name="company" placeholder="Company Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="position">Position/Designation</label>
                                        <input type="text" class="form-control" name="position" placeholder="Designation">
                                    </div>
                                </div>
                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" name="email" placeholder="username@lspu.edu.ph">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col" style="text-align: left;">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="pass" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-12 pt-2">
                                    <button type="submit" class="btn btn-primary login" name="create">Sign up</button>
                                </div>
                                <div class="col-12" style="padding: 5px 0;">
                                    <p style="font-size: small;">Already have an accout? <a href="index.php" style="font-size: small;">Login here</a></p>
                                </div>
                        </form>
                    </div>
                </div>
        </div>
        </section>
        </div>

        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'admin/vendor/phpmailer/src/Exception.php';
        require 'admin/vendor/phpmailer/src/PHPMailer.php';
        require 'admin/vendor/phpmailer/src/SMTP.php';
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

            if (mysqli_num_rows($result) > 0) {
                echo '
                                        <script>
                                        swal("Sign in Failed!", "The email is already in use. Please use other email.", "warning");
                                        </script>';
            } else {
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

                if ($fire) {
                    echo
                    '
                                            <script>
                                            swal("Sign up Complete!", "Welcome to ArchiveMo.", "success");
                                            </script>
                                        ';
                } else {
                    echo '
                                        <script>
                                        swal("Something went wrong!", "There is a problem signing up. Try again later", "warning");
                                        </script>';
                    exit();
                }
            }
        }
        ?>

    </main>

    <div class="wave">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
    </div>

    <script type="text/javascript" src="main.js"></script>

    <div class="footer">
        <footer>
            <div class="row">
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col">

                </div>
            </div>
        </footer>
    </div>
</body>