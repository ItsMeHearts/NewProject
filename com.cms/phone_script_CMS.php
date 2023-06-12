<?php
    session_start();
    include_once "connectDB_CMS.php";
    $_SESSION['username'];
    $uid = $_SESSION['id'];

    if(isset($_POST))
    {
        $phone = mysqli_real_escape_string($conn , $_POST['phone']);
        
        $query = "SELECT * FROM user_cms WHERE phone='$phone'";
        $result = mysqli_query($conn, $query);
        $result_check = mysqli_num_rows($result);

        if($result_check > 0)
        {
            echo "failed";
        }
        else{
            $updateQuery = "UPDATE user_cms SET phone = '$phone' WHERE _id='$uid'";
            mysqli_query($conn , $updateQuery);
            echo "updated";
        }
    }


?>