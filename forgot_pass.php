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
        @media (max-width: 768px) {
            .wave {
                display: none;
            }
        }

        .login {
            background-color: #F5A623;
            border: none;
        }

        .login:hover {
            background-color: #e68e00;
        }
    </style>
</head>

<?php
session_start();
include 'dbconn.php'; // Include your database connection file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'admin/vendor/phpmailer/src/Exception.php';
require 'admin/vendor/phpmailer/src/PHPMailer.php';
require 'admin/vendor/phpmailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(32));

        // Set token expiration time (e.g., 1 hour from now)
        $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $resetLink = "http://localhost/GIThub/ArchiveMo/reset_password.php?token=$token";

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'archivemo2023@gmail.com'; // Gmail account
        $mail->Password = 'vevhmorfldvdibwc'; // Gmail password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('archivemo2023@gmail.com', 'ArchiveMo.');
        $mail->addAddress($email);
        $mail->addReplyTo('0320-0677@lspu.edu.ph', 'ArchiveMo. Admin');
        $mail->isHTML(true);

        $mail->Subject = "ArchiveMo. Password Reset";

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
                                        <p>Hi there,</p>
                                        <p>This email is for your password reset. Click the following link to reset your password:<a href='$resetLink'>Reset Password</a></p>
                                        <p>Thanks,</p>
                                        <p style='color: #F5A623;'><strong>ArchiveMo Team</strong></p>
                                    </div>
                                </body>
                                </html>
                                
";

        $sql = "UPDATE users SET reset_token = '$token', reset_token_expiration = '$expiration' WHERE email = '$email'";

        $fire = mysqli_query($conn, $sql);

        if ($mail->send() && $fire == true) {
           echo
            '
                                    <script>
                                    swal("Success!", "Please check your email for reset password link", "success");
                                    </script>
                                ';
                                echo "<script>window.location.href = 'forgot_pass.php';</script>";
			exit();
        } else {
           echo '
                                <script>
                                swal("Something went wrong!", "Error email not found. Try again later", "warning");
                                </script>`';
                                echo "<script>window.location.href = 'forgot_pass.php';</script>";
			exit();
        }
    }
}
?>

<body>

    <main>
        <div class="container" style="text-align: center; align-items:center; justify-content:center;">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3 position-absolute top-50 start-50 translate-middle" style="height: 350px;">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <img src="img/logo.png" alt="" class="logo" style="width: 250px; margin: auto;">
                                    </div>
                                    <?php
                                    if (isset($_SESSION['error'])) {
                                        echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
                                        unset($_SESSION['error']);
                                    }
                                    ?>
                                    <form method="post" action="forgot_pass.php" class="row g-3">
                                        <div class="col-12">
                                            <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                                            <p class="text-center small">Enter your email address to reset your password.</p>
                                            <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 login" name="submit" type="submit">Continue</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </main>

    <div class="wave">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
    </div>
</body>

</html>