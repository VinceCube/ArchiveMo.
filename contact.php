<script src="assets/vendor/testLocalJs/sweetalert.min.js"></script>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'admin/vendor/phpmailer/src/Exception.php';
require 'admin/vendor/phpmailer/src/PHPMailer.php';
require 'admin/vendor/phpmailer/src/SMTP.php';

if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $contactemail = $_POST['contemail'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'archivemo2023@gmail.com'; //gmail account
    $mail->Password = 'vevhmorfldvdibwc'; //password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom($contactemail, $name); //gmail from you

    $mail->addAddress('archivemo2023@gmail.com');
    $mail->addReplyTo('0320-0677@lspu.edu.ph', 'ArchiveMo. Admin');

    $mail->isHTML(true);

    $mail->Subject = "Message from ArchiveMo users";
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
                                                    border-radius: 20px 20px 0 0;
                                                    position: relative;
                                                    z-index: 2;
                                                }
                                                h2 {
                                                    color: #fff;
                                                    font-size: 2rem;
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
                                                <p>Dear ArchiveMo Team,</p>
                                                <p>" . $message . "</p>
                                                <p>Thanks,</p>
                                                <p style='color: #F5A623;'><strong>" . $name . "</strong></p>
                                                <p>". $contactemail ."</p>
                                            </div>
                                        </body>
                                        </html>
                                        
";
    $mail->send();
    echo
    '
                                            <script>
                                            swal("Success", "Thanks for Contacting us.", "success");
                                            </script>
                                            <script>window.location.href="home.php";</script>
                                        ';
} else {
    echo '
                                        <script>
                                        swal("Something went wrong!", "There is a problem sending your message. Try again later", "warning");
                                        </script>
                                        <script>window.location.href="home.php";</script>
                                        
                                        ';
                                        
    exit();
}
