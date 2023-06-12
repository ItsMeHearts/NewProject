<?php 
    session_start();
    $_SESSION['username'];
    $uid = $_SESSION['id'];
    include_once "connectDB_CMS.php";

    if(isset($_POST))
    {
        $image = $_FILES['cnt_image']['name'];
        $target_folder = "uploads_contact/" ;
        $target_directory = $target_folder.basename($image); 
        $tmp_name = $_FILES['cnt_image']['tmp_name'];

        $id = mysqli_real_escape_string($conn, $_POST['cnt_id']);
        $name = mysqli_real_escape_string($conn , $_POST['cnt_name']);
        $phone = mysqli_real_escape_string($conn , $_POST['cnt_number']);
        $address = mysqli_real_escape_string($conn , $_POST['cnt_address']);

       /*  $imagefiletype = strtolower(pathinfo($target_directory , PATHINFO_EXTENSION));
        $extensions = array('jpeg', 'jpg' , 'png');
        if(in_array($imagefiletype , $extensions))
        { */

        $query = "SELECT * FROM contacts_cms WHERE mobile_num = '$phone' AND cnt_id !='$id'";
        $result = mysqli_query($conn , $query);
        $result_check = mysqli_num_rows($result);
        if($result_check > 0)
        {
            echo "Phone Number Already Exist";
        }
        else if(empty($image))
        {
        $updateQuery = "UPDATE contacts_cms SET contact_name='$name', mobile_num='$phone' , address ='$address' WHERE cnt_id='$id' ";
        mysqli_query($conn, $updateQuery);
        move_uploaded_file($tmp_name, $target_directory);
        echo "success";
        }
        else
        {
        $updateQuery = "UPDATE contacts_cms SET contact_name='$name', mobile_num='$phone' , address ='$address', image ='$image' WHERE cnt_id='$id' ";
        mysqli_query($conn , $updateQuery);
        move_uploaded_file($tmp_name , $target_directory);
        echo "success";
        }

       /*  }else
        {
            echo "failed";
        } */

    }


?>