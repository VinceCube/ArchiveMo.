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

    <title>Admin - Dashboard</title>
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
                <img src="img/logo3.png" alt="" style="width: auto; height: 60px;">
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
                            <h6><?php echo $row["username"]; ?></h6><!--change to username-->
                        <?php
                        }
                        ?>
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
                <a class="nav-link" data-bs-target="#charts-nav" href="course.php">
                    <i class="bi bi-terminal-fill"></i><span>Course / Program</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="specialization.php">
                            <i class="bi bi-circle"></i><span>Specialization</span>
                        </a>
                    </li><!-- End OJT Records Nav -->
                </ul>
            </li>

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
            </li>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" href="ojt-field.php">
                    <i class="bi bi-person-lines-fill"></i><span>OJT Field</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="company.php">
                            <i class="bi bi-circle"></i><span>Company</span>
                        </a>
                    </li>
                    <li>
                        <a href="program.php">
                            <i class="bi bi-circle"></i><span>Programming Position</span>
                        </a>
                    </li>
                    <li>
                        <a href="bpo.php">
                            <i class="bi bi-circle"></i><span>BPO Position</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Create Student Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" href="create-student.php">
                    <i class="bi bi-person-square"></i><span>Create User</span>
                </a>
            </li><!-- End Create Student Nav -->
        </ul>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
                    <li class="breadcrumb-item active">Course</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">

                <!-- insertion of data test -->
                <?php

                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }

                if (isset($_POST['insertdata'])) {

                    $newCourse = $_POST['new_course'];


                    $query = mysqli_query($conn, "INSERT INTO `course` (`id`, `program`) VALUES (NULL, '$newCourse')");


                    if ($query) {
                        $_SESSION['message'] = '   `

                <script>
                swal("Course Added!", "You created new course!", "success");

                </script>
                
                `';
                        echo "<script>window.location.href = 'course.php';</script>";
                        exit();
                    } else {
                        $_SESSION['message'] = '    <script>
                swal("Something went wrong!", "There is a problem inserting course.", "warning");

                </script>';
                        echo "<script>window.location.href = 'course.php';</script>";
                        exit();
                    }
                }

                ?>

                <!-- insert modal -->

                <div class="modal fade" id="insertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Course </h5>
                                <button type="button" id="close" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>

                            <form action="" method="POST">

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label> Course / Program </label>
                                        <input type="text" name="new_course" class="form-control" placeholder="Enter Course or Program" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- delete modal -->

                <?php

                if (isset($_POST['deletedata'])) {
                    $id = $_POST['id'];

                    $query = "DELETE FROM course WHERE id='$id'";
                    $query_run = mysqli_query($conn, $query);

                    if ($query_run) {
                        $_SESSION['message'] = '   `
                
                <script>
                swal("Success!", "Poof! Course has been deleted!", "success");
                </script>
                `';
                        echo "<script>window.location.href = 'course.php';</script>";
                        exit;
                    } else {
                        $_SESSION['message'] = '    <script>
                swal("Something went wrong!", "There is a problem deleting course.", "warning");
                </script>';
                        echo "<script>window.location.href = 'course.php';</script>";
                        exit();
                    }
                }

                ?>

                <!-- updating company name -->
                <?php
                if (isset($_POST['updatedata'])) {
                    $id = $_POST['update_id'];


                    $name = $_POST['newCourse'];


                    $sql = "UPDATE course  SET program ='$name' WHERE id='$id'";

                    $query_run = mysqli_query($conn, $sql);

                    if ($query_run) {
                        $_SESSION['message'] = '
                <script>
                    swal("Success!", "Course has been updated!", "success");
                    </script>
                    ';
                        echo "<script>window.location.href = 'course.php';</script>";
                        exit;
                    } else {
                        $_SESSION['message'] = '    
                <script>
                swal("Something went wrong!", "There is a problem updating record.", "warning");
                </script>';
                        echo "<script>window.location.href = 'course.php';</script>";
                        exit();
                    }
                }
                ?>

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">
                            <h5 class="card-title">Course List</h5><button type="button" class="btn btn-primary insertmodal" data-bs-target="#insertmodal" data-bs-toggle="modal" style="float: right; margin-top: -50px;"><i class="bi bi-plus" style="font-size: 15px;"></i> ADD </button>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $result = mysqli_query($conn, "SELECT * FROM course");
                                    while ($row = mysqli_fetch_array($result)) {

                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $row["id"]; ?></td>
                                            <td><?php echo $row["program"]; ?></td>
                                            <td><button type="button" class="btn btn-primary updatebtn" data-bs-toggle="modal" data-bs-target="#editmodal<?php echo $row['id']; ?>"><i class="bi bi-pencil-square" style="font-size: 20px;"></i> Edit</button>

                                                <!-- UPDATE CUSTOMER DATA SECTION -->
                                                <div class="modal fade" id="editmodal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"> Edit Course </h5>
                                                                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>

                                                            <form action="" method="POST">

                                                                <div class="modal-body">

                                                                    <input type="hidden" name="update_id" id="update_id" value="<?php echo $row["id"]; ?>">

                                                                    <div class="row mb-3">
                                                                        <label for="fullName" class="col-md-2 col-lg-3 col-form-label" style="font-size: 18px;">program</label>
                                                                        <div class="col-md-8 col-lg-9">
                                                                            <input type="text" class="form-control" name="newCourse" value="<?php echo $row["program"]; ?>">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><button type="button" class="btn btn-danger btn-sm deletebtn" data-bs-toggle="modal" data-bs-target="#deletemodal<?php echo $row['id']; ?>"><i class="bi bi-trash" style="font-size: 20px;"></i> Delete</button>

                                                <div class="modal fade" id="deletemodal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <!-- delete modal -->
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" id="close" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>

                                                            <form action="" method="POST">

                                                                <div class="modal-body">

                                                                    <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
                                                                    <div class="position-relative" style="align-items: center; text-align: center;">
                                                                        <i class="bi bi-exclamation-circle" style="color: #FFB22E; font-size: 6rem;"></i>
                                                                        <h5 style="font-weight: 600; font-size: 30px;"> Are you sure?</h5>
                                                                        <h6 style="font-size: 20px; font-weight: 400;">Once deleted, you will not be able to recover this record!</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" id="closeAndOpenModalBtn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" name="deletedata" class="btn btn-primary"> Confirm </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php

                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

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