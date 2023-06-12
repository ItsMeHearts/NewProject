<?php
    session_start();
    include_once "connectDB_CMS.php";
    $_SESSION['username'];
    $uid = $_SESSION['id'];

    if(isset($_POST))
    {
        $password = mysqli_real_escape_string($conn , $_POST['password']);
        $new_password = mysqli_real_escape_string($conn , $_POST['new_password']);
        $cnf_password = mysqli_real_escape_string($conn , $_POST['confirm_new_password']);


        $check_query = "SELECT * FROM user_cms WHERE _id='$uid' AND _password = '".md5($password)."'";
        $result = mysqli_query($conn , $check_query);
        
        if(mysqli_num_rows($result) > 0)
        {
            $updateQuery = "UPDATE user_cms SET _password='".md5($new_password)."' , _cnf_password='".md5($cnf_password)."' WHERE _id='$uid'";
            mysqli_query($conn, $updateQuery);
            echo "updated";

        }
        else{
            echo "failed";
        }


    }



?>