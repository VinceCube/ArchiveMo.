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
if (isset($_SESSION['message'])) {
	echo $_SESSION['message'];
	unset($_SESSION['message']);
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token exists and hasn't expired
    $result = mysqli_query($conn, "SELECT * FROM users WHERE reset_token = '$token' AND reset_token_expiration > UTC_TIMESTAMP()");

    if (mysqli_num_rows($result) > 0) {
        if (isset($_POST['submit'])) {
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            // Check if passwords match
            if ($newPassword == $confirmPassword) {
                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the user's password and reset the token
                mysqli_query($conn, "UPDATE users SET password = '$hashedPassword', reset_token = NULL, reset_token_expiration = NULL WHERE reset_token = '$token'");

                $_SESSION['message'] = '   ` <script>
                swal("Success!", "Password reset successfully. You can now login with your new password.", "success");
                </script>`';
                        echo "<script>window.location.href = 'index.php';</script>";
                        exit();
                exit();
            } else {
                $_SESSION['message'] = '   ` <script>
                swal("Error!", "Password did not match.", "warning");
                </script>`';
            }
        }
    } else {
        $_SESSION['message'] = '   ` <script>
        swal("Error!", "Invalid or Expired Token.", "warning");
        </script>`';
        header('Location: forgot_pass.php');
        exit();
    }
} else {
    $_SESSION['message'] = '   ` <script>
    swal("Error!", "Token not provided.", "warning");
    </script>`';
    header('Location: forgot_pass.php');
    exit();
}
?>

<body>

    <main>
        <div class="container" style="text-align: center; align-items:center; justify-content:center;">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3 position-absolute top-50 start-50 translate-middle" style="height: 370px;">

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
                                    <form method="post" action="reset_password.php?token=<?php echo $token; ?>" class="row g-2" style="text-align: left;">
                                    <div class="col-12">
                                    <p class="text-center small">Enter and confirm your new password.</p>
                                        <label for="new_password">New Password:</label>
                                        <input type="password" name="new_password" class="form-control" placeholder="Enter New Password" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="confirm_password">Confirm Password:</label>
                                        <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password" required>
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