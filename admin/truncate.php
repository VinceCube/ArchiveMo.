<?php
include 'dbconn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/vendor/testLocalJs/sweetalert.min.js"></script>
    <title>truncate</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            text-align: center;
            justify-content: center;
            align-items: center;
        }
        body{
            background-color: #222;
        }
        h1{
            text-transform: uppercase;
            color: #fff;
            font-weight: 700;
            padding: 10px;
        }
        form{
            padding: 10px;
        }
        input[type=submit]{
            text-transform: uppercase;
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php

if (isset($_POST['submit'])){
    $sql = "TRUNCATE TABLE records";
    $query_run = mysqli_query($conn, $sql);

    if($query_run){
       echo '   `

<script>
swal("Success!", "Poof! The files has been deleted!", "success");
</script>
`';
          
    }
}

if (isset($_POST['moa'])){
    $sql = "TRUNCATE TABLE moa";
    $query_run = mysqli_query($conn, $sql);

    if($query_run){
       echo '   `

<script>
swal("Success!", "Poof! The files has been deleted!", "success");
</script>
`';
          
    }
}

if (isset($_POST['ojt'])){
    $sql = "TRUNCATE TABLE ojt_id";
    $query_run = mysqli_query($conn, $sql);

    if($query_run){
       echo '   `

<script>
swal("Success!", "Poof! The files has been deleted!", "success");
</script>
`';
          
    }
}

if (isset($_POST['medical'])){
    $sql = "TRUNCATE TABLE medical";
    $query_run = mysqli_query($conn, $sql);

    if($query_run){
       echo '   `

<script>
swal("Success!", "Poof! The files has been deleted!", "success");
</script>
`';
          
    }
}
if (isset($_POST['contract'])){
    $sql = "TRUNCATE TABLE contract";
    $query_run = mysqli_query($conn, $sql);

    if($query_run){
       echo '   `

<script>
swal("Success!", "Poof! The files has been deleted!", "success");
</script>
`';
          
    }
}

if (isset($_POST['concent'])){
    $sql = "TRUNCATE TABLE concent";
    $query_run = mysqli_query($conn, $sql);

    if($query_run){
       echo '   `

<script>
swal("Success!", "Poof! The files has been deleted!", "success");
</script>
`';
          
    }
}

if (isset($_POST['narrative'])){
    $sql = "TRUNCATE TABLE narrative";
    $query_run = mysqli_query($conn, $sql);

    if($query_run){
       echo '   `

<script>
swal("Success!", "Poof! The files has been deleted!", "success");
</script>
`';
          
    }
}
    ?>
<h1>truncate tables</h1>
<form action="" method="post">
    <input type="submit" class="btn btn-danger" name="submit" value="truncate waiver">
    <input type="submit" class="btn btn-danger" name="moa" value="truncate moa">
    <input type="submit" class="btn btn-danger" name="concent" value="truncate concent">
    <input type="submit" class="btn btn-danger" name="contract" value="truncate contract">
    <input type="submit" class="btn btn-danger" name="medical" value="truncate medical">
    <input type="submit" class="btn btn-danger" name="ojt" value="truncate ojt-id">
    <input type="submit" class="btn btn-danger" name="narrative" value="truncate narrative">
</form>
    
</body>
</html>
