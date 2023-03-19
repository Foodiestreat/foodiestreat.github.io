<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mailid = $_POST['mailid'];
$food_quality = $_POST['f_quality'];
$service_quality = $_POST['s_quality'];
$cleanliness = $_POST['c_quality'];
$experience = $_POST['all_quality'];
$comment = $_POST['subject'];
if(!empty($firstname) || !empty($lastname) || !empty($mailid) || !empty($food_quality)
|| !empty($service_quality) || !empty($cleanliness) || !empty($experience)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "feedback";

    //create a connection
    $conn = new mysqli($host, $dbUsername, $dbPassword , $dbname);
    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }else{
        $SELECT = "SELECT mailid from feedback where mailid = ? Limit 1";
        $INSERT = "INSERT into feedback (firstname,lastname,mailid,f_quality,service_q,cleanliness,experience,comments) values(?,?,?,?,?,?,?,?)";

        //prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s" , $mailid);
        $stmt->execute();
        $stmt->bind_result($mailid);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssssss",$firstname,$lastname,$mailid,$food_quality,$service_quality,$cleanliness,$experience,$comment);
            $stmt->execute();
            echo "New record inserted successfully";
        }else{
            echo "Someone already registered using this email";
        }
        $stmt->close();
        $conn->close();
    }
}else{
    echo "All fields are required";
    die();
}
?>