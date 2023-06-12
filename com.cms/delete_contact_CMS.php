<?php 
    session_start();
    $_SESSION['username'];
    $uid = $_SESSION['id'];
    include_once 'connectDB_CMS.php';

    if($_POST)
    {
        $del =  mysqli_real_escape_string($conn , $_POST['delete_id']);

        $query = "DELETE FROM contacts_cms WHERE cnt_id = $del ";

        mysqli_query($conn, $query);

        echo "deleted";
    }




?>