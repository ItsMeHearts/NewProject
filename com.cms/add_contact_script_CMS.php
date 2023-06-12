<?php
session_start();
    $username = $_SESSION['username'];
    $uid = $_SESSION['id'];
    include_once "connectDB_CMS.php";

    if(isset($_POST))
    {
        for($i = 0 ; $i < count($_POST['name']) ; $i++)
        {
            $contactName = mysqli_real_escape_string($conn, $_POST['name'][$i]);
            $phone = mysqli_real_escape_string($conn, $_POST['phone'][$i]);
            $address = mysqli_real_escape_string($conn, $_POST['address'][$i]);

            $check = "SELECT * FROM contacts_cms WHERE mobile_num = '$phone' ";

            $result = mysqli_query($conn , $check);

            $check_result = mysqli_num_rows($result);

            if($check_result > 0)
            {
                echo "failure";
            }
            else
            {                
                $insertContact = "INSERT INTO contacts_cms(contact_name , mobile_num , address , _id)VALUES('$contactName' , '$phone' , '$address' , '$uid')";

            mysqli_query($conn, $insertContact);
         }
        }
        echo "success";
    }else 
    {
        echo "failed";
    }



?>