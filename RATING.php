<?php
// Include the database config file
include_once 'database.php';

if(!empty($_POST['postID']) && !empty($_POST['ratingNum'])){
    // Get posted data
    $postID = $_POST['postID'];
    $ratingNum = $_POST['ratingNum'];

    // Current IP address
    $userIP = $_SERVER['REMOTE_ADDR'];

    // Check whether the user already submitted the rating for the same post
    $query = "SELECT rating_number FROM rating WHERE post_id = $postID AND user_ip = '".$userIP."'";
    $result = $db->query($query);

    if($result->num_rows > 0){
        // Status
        $status = 2;
    }else{
        // Insert rating data in the database
        $query = "INSERT INTO rating (post_id,rating_number,user_ip) VALUES ('".$postID."', '".$ratingNum."', '".$userIP."')";
        $insert = $db->query($query);

        // Status
        $status = 1;
    }

    // Fetch rating details from the database
    $query = "SELECT COUNT(rating_number) as rating_num, FORMAT((SUM(rating_number) / COUNT(rating_number)),1) as average_rating FROM rating WHERE post_id = $postID GROUP BY (post_id)";
    $result = $db->query($query);
    $ratingData = $result->fetch_assoc();

    $response = array(
        'data' => $ratingData,
        'status' => $status
    );

    // Return response in JSON format
    echo json_encode($response);
}
?>