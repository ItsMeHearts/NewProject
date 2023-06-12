<?php
    //Db Connection
    include_once "connectDB_CMS.php";
    if(isset($_POST))
    {
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $cnf_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
        $gender = mysqli_real_escape_string($conn,$_POST['gender']);

        $check_mail = "SELECT * FROM user_cms WHERE email='$email'";
        $check_phone = "SELECT * FROM user_cms WHERE phone='$phone'";
        $res_check_mail = mysqli_query($conn, $check_mail);
        $res_check_phone = mysqli_query($conn, $check_phone);
        if(mysqli_num_rows($res_check_mail)> 0)
        {
            echo "Mail_exist";
        }
        else if(mysqli_num_rows($res_check_phone)>0)
        {
            echo "Phone_exist";
        }
        else
        {
        $query = "INSERT INTO user_cms(username,email,phone,gender,_password,_cnf_password)VALUES('$username', '$email', '$phone','$gender','".md5($password)."', '".md5($cnf_password)."')";
        mysqli_query($conn,$query);
        echo "Saved";
        }
    }


?>