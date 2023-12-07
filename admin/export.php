<?php
// Check if the export button is clicked
if (isset($_POST['export'])) {
    // Include database connection file
    require('dbconn.php');

    // Fetch data from the database
    $result = mysqli_query($conn, "SELECT DISTINCT users.email, users.firstname, users.id, users.lastname, users.student_id, records.email AS records_email, concent.email AS concent_email, medical.email AS medical_email, moa.email AS moa_email, contract.email AS contract_email, ojt_id.email AS ojt_id_email
        FROM users
        LEFT JOIN records ON users.email = records.email
        LEFT JOIN concent ON users.email = concent.email
        LEFT JOIN medical ON users.email = medical.email
        LEFT JOIN moa ON users.email = moa.email
        LEFT JOIN contract ON users.email = contract.email
        LEFT JOIN ojt_id ON users.email = ojt_id.email");

    $filename = "ojt_records.csv";

    // Clear any existing output and set headers for CSV file
    ob_start();
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $output = fopen('php://output', 'w');

    // Add CSV headers
    fputcsv($output, array('#', 'Students Name', 'Student ID', 'Waiver', 'Consent', 'Contract', 'MOA', 'Health Examination', 'Registration Certificate', 'Status'));

    // Fetch and write data to CSV
    while ($row = mysqli_fetch_array($result)) {
        
        fputcsv($output, array(
            $row["id"],
            $row["firstname"] . " " . $row["lastname"],
            $row["student_id"],
            $row['email'] === $row['records_email'] ? 'Done' : 'Pending',
            $row['email'] === $row['concent_email'] ? 'Done' : 'Pending',
            $row['email'] === $row['contract_email'] ? 'Done' : 'Pending',
            $row['email'] === $row['moa_email'] ? 'Done' : 'Pending',
            $row['email'] === $row['medical_email'] ? 'Done' : 'Pending',
            $row['email'] === $row['ojt_id_email'] ? 'Done' : 'Pending',
            $row['email'] === $row['records_email'] && $row['email'] === $row['concent_email'] && $row['email'] === $row['contract_email'] && $row['email'] === $row['moa_email'] && $row['email'] === $row['medical_email'] && $row['email'] === $row['medical_email'] && $row['email'] === $row['ojt_id_email'] ? 'Finish' : 'Pending',
        ));
    }
}

    fclose($output);
    mysqli_close($conn);

    // Send the output and clean the buffer
    ob_end_flush();
    exit();
?>
