<?php
//get data from form  
if(isset($_POST['send']))
{
$name = $_POST['name'];
$subject = $_POST['subject'];
$email= $_POST['email'];
$message= $_POST['message'];

$to = "archivemo2023@gmail.com";

$txt ="Name: ". $name . "\r\nEmail from: " . $email . "\r\nMessage: " . $message;
$headers = "From: noreply@archivemo.000webhostapp.com" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
echo
'
                        <script>
                        swal("Sign up Complete!", "Welcome to ArchiveMo.", "success");
                        </script>
                        <scrip>window.location.href="home.php"</script>;
                    ';
} else {
echo '
                    <script>
                    swal("Something went wrong!", "There is a problem signing up. Try again later", "warning");
                    </script>
                    <scrip>window.location.href="home.php"</script>;
                    ';
exit();
}
}
?>