<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['useremail'])){
}
else{
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    @media (max-width: 768px) {
        .header .logo-name{
            display: none;
        }
        
    }

  </style>
</head>

<body>

    <section class="section dashboard">
      <div class="row">
<!--Waiver Table-->

<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Find the requested file in the database
  $sql = "SELECT moa FROM moa WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $filename = $row['moa'];
      $stmt->close();

      $file = '../images/pdf/' . $filename;

      // Check if the file exists
      if (file_exists($file)) {
          // Set headers for file download
          header('Content-Type: application/octet-stream');
          header('Content-Disposition: attachment; filename="' . $filename . '"');
          header('Content-Length: ' . filesize($file));
          header('Pragma: public');
          header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
          header('Expires: 0');

          // Send the file to the browser for download
          ob_clean();
          flush();
          readfile($file);
          exit;
      } else {
          echo 'File not found.';
      }
  } else {
      echo 'Invalid file ID.';
  }
}

// Fetch the list of files from the database
?>

<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" id="close" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="modal-body-content">
                    <!-- Modal content will be dynamically loaded here -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="closeAndOpenModalBtn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>


<div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">MOA</h5>
                  <table class="table datatable">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Email</th>
                      <th>MOA</th>
                      <th>Date</th>
                    </tr> 
                    </thead>
                    <tbody>
                    <?php
                          $result = mysqli_query($conn, "SELECT * FROM moa");
                          while($row = mysqli_fetch_array($result)){
                          ?>
                      <tr>
                        <td scope="row"><?php echo $row["id"]; ?></td>
                        <td scope="row"><?php echo $row["email"]; ?></td>
                        <td><a href="?id=<?php echo $row['id']; ?>"><?php echo $row['moa'];?></td>
                        <td scope="row"><?php echo $row["date"]; ?></td>
                        <td><a href="javascript:void(0);" class="btn btn-primary viewmodal" data-id="<?php echo $row['id']; ?>" data-moa="<?php echo $row['moa']; ?>">VIEW</a></td>
                      </tr>
                      <?php
                          }
                          ?>
                    </tbody>
                 </table>
                </div>
              </div>
            </div><!-- End Recent Sales -->
          </div>
    </section>

  </main><!-- End #main -->
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

  
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.viewmodal').on('click', function() {
        var recordId = $(this).data('id');
        var moa = $(this).data('moa');

        // Update the modal content with the data
        $('#modal-body-content').html('<iframe src="../images/pdf/' + moa + '" class="embed-responsive custom-iframe" frameborder="0" style="width: 100%; height: 80vh;"></iframe>');

        // Open the modal
        $('#viewmodal').modal('show');
      });
    });
  </script>

</body>

</html>