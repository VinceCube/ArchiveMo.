<?php
        // Check if the export button is clicked
        if (isset($_POST['export'])) {
          // Include database connection file
          require('dbconn.php');

          // Fetch data from the database
          $result = mysqli_query($conn, "SELECT * FROM narrative");

          $filename = "narrative_reports.csv";

          // Clear any existing output and set headers for CSV file
          ob_start();
          header('Content-Type: text/csv');
          header('Content-Disposition: attachment; filename="' . $filename . '"');

          $output = fopen('php://output', 'w');

          // Add CSV headers
          fputcsv($output, array('#', 'Narrative Reports', 'Email', 'Sentiment', 'Date'));

          // Fetch and write data to CSV
          while ($row = mysqli_fetch_array($result)) {
            // Map sentiment to its corresponding color
            $sentimentColor = '';
            if ($row["sentiment_result"] == "Negative") {
              $sentimentColor = "red";
            } else if ($row["sentiment_result"] == "Positive") {
              $sentimentColor = "green";
            } else {
              $sentimentColor = "orange";
            }

            // Add row to CSV
            fputcsv($output, array(
              $row["id"],
              $row['file_name'],
              $row["user"],
              $row["sentiment_result"],
              $row["date"]
            ));
          }

          fclose($output);
          mysqli_close($conn);

          // Send the output and clean the buffer
          ob_end_flush();
          exit();
        }
        ?>