<?php

include 'dbconn.php';

//users
	$count_all_users = "SELECT COUNT(*) as count FROM `users`";
    $result = mysqli_query($conn, $count_all_users);
    $row = mysqli_fetch_assoc($result);
    $total_users = $row['count'];

    //narrative report
    $count_all_users_narrative = "SELECT COUNT(*) as count FROM `narrative`";
    $result = mysqli_query($conn, $count_all_users_narrative);
    $row = mysqli_fetch_assoc($result);
    $total_narrative = $row['count'];

    //ojt records
    $count_all_users_records = "SELECT COUNT(*) AS count FROM (
        SELECT * FROM `records`
        UNION ALL
        SELECT * FROM `concent`
        UNION ALL
        SELECT * FROM `medical`
        UNION ALL
        SELECT * FROM `ojt_id`
        UNION ALL
        SELECT * FROM `moa`
        UNION ALL
        SELECT * FROM `contract`
    ) AS combined_tables";
    
    $result = mysqli_query($conn, $count_all_users_records);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['count'];
    }


    //ojt records individual
    //waiver section
    $count_all_users_waiver = "SELECT COUNT(waiver) as count FROM `records`";
    $result = mysqli_query($conn, $count_all_users_waiver);
    $row = mysqli_fetch_assoc($result);
    $total_waiver = $row['count'];

    //concent section
    $count_all_users_concent = "SELECT COUNT(concent) as count FROM `concent`";
    $result = mysqli_query($conn, $count_all_users_concent);
    $row = mysqli_fetch_assoc($result);
    $total_concent = $row['count'];
    
    //ojt_id section
    $count_all_users_id = "SELECT COUNT(ojt_id) as count FROM `ojt_id`";
    $result = mysqli_query($conn, $count_all_users_id);
    $row = mysqli_fetch_assoc($result);
    $total_ojt_id = $row['count'];

    //contract section
    $count_all_users_contract = "SELECT COUNT(contract) as count FROM `contract`";
    $result = mysqli_query($conn, $count_all_users_contract);
    $row = mysqli_fetch_assoc($result);
    $total_contract = $row['count'];

    //medical section
    $count_all_users_medical = "SELECT COUNT(medical_cert) as count FROM `medical`";
    $result = mysqli_query($conn, $count_all_users_medical);
    $row = mysqli_fetch_assoc($result);
    $total_medical = $row['count'];

    //moa section
    $count_all_users_moa = "SELECT COUNT(moa) as count FROM `moa`";
    $result = mysqli_query($conn, $count_all_users_moa);
    $row = mysqli_fetch_assoc($result);
    $total_moa = $row['count'];

    //sentiment result section
    //postive sentiment

    $count_all_users_sentiment = "SELECT COUNT(*) AS count FROM `narrative` WHERE sentiment_result = 'positive'";
    $result = mysqli_query($conn, $count_all_users_sentiment);
    $row = mysqli_fetch_assoc($result);
    $total_positive = $row['count'];

    //negative sentiment
    $count_all_users_sentiment_negative = "SELECT COUNT(*) AS count FROM `narrative` WHERE sentiment_result = 'negative'";
    $result = mysqli_query($conn, $count_all_users_sentiment_negative);
    $row = mysqli_fetch_assoc($result);
    $total_negative = $row['count'];
    

    
//neutral sentiment
    $count_all_users_sentiment_neutral = "SELECT COUNT(*) AS count FROM `narrative` WHERE sentiment_result = 'neutral'";
    $result = mysqli_query($conn, $count_all_users_sentiment_neutral);
    $row = mysqli_fetch_assoc($result);
    $total_neutral = $row['count'];


?>
