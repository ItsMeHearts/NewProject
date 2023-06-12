<?php 
    session_start();
    include_once "connectDB_CMS.php";
    $_SESSION['username'];
    $uid = $_SESSION['id'];

    if(isset($_POST))
    {
        $image = $_FILES['image']['name'];
        $target_folder = "uploads/";
        $target_directory  = $target_folder.basename($image);
        $tmp_name = $_FILES['image']['tmp_name'];

        // $query = "SELECT _image FROM user_cms Where _id='$uid'";
        // $result = mysqli_query($conn, $query);
        // $result_check = mysqli_num_rows($result);
        
       
        $imagefiletype = strtolower(pathinfo($target_directory, PATHINFO_EXTENSION));
        $extensions = array('jpeg', 'jpg', 'png');

        if(in_array($imagefiletype, $extensions))
        {
        

                $updateQuery = "UPDATE user_cms SET _image = '$image' WHERE _id='$uid'" ;
                mysqli_query($conn, $updateQuery);
                move_uploaded_file($tmp_name , $target_directory);
                echo "update";
           
           
        }
        else {
            echo "invalid";
        }



    }

?>