<?php
    session_start();
    include_once "connectDB_CMS.php";
    $_SESSION['username'];
    $uid = $_SESSION['id'];

    if(isset($_POST))
    {
        $username = mysqli_real_escape_string($conn, $_POST['username']);

        $updateQuery = "UPDATE  user_cms SET username = '$username' WHERE _id='$uid'";
        $result = mysqli_query($conn , $updateQuery);
        echo "updated";
    }

?>