<?php
    session_start();
    include_once "connectDB_CMS.php";
    if(isset($_POST))
    {
        $login_key = mysqli_real_escape_string($conn, $_POST['login_id']);
        $login_password = mysqli_real_escape_string($conn, $_POST['login_password']);

        $user_check = "SELECT * FROM user_cms WHERE (email = '$login_key' OR phone = '$login_key') AND _password='".md5($login_password)."'";

        $connect_user_check = mysqli_query($conn, $user_check);
        
        if(mysqli_num_rows($connect_user_check)>0)
        {
           $row = mysqli_fetch_assoc($connect_user_check);
           $_SESSION['id'] = $row['_id'];
           $_SESSION['username'] = $row['username'];
           $prime_key_uid = $_SESSION['id'];
           echo $prime_key_uid;
           
        }else{
           echo "0";
        }
        

    }
    




?>