<?php
    session_start();
    include_once "connectDB_CMS.php";
    $_SESSION['username'];
    $uid = $_SESSION['id'];

    if(isset($_POST))
    {
    $email = mysqli_real_escape_string($conn , $_POST['email']);
        
    $checkQuery = "SELECT * FROM user_cms WHERE email = '$email'";
    $result = mysqli_query($conn , $checkQuery);
    $res_check = mysqli_num_rows($result);

    if($res_check > 0)
    {
        echo "failed";

    }else {
        
        $updateQuery = "UPDATE user_cms SET email = '$email' WHERE _id='$uid'";
        mysqli_query($conn, $updateQuery);
        echo "updated";
        
    }



    }


?>