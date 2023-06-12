<?php
    session_start();
    $_SESSION['username'];
    $uid = $_SESSION['id'];
    //echo $uid;
    include_once "connectDB_CMS.php";

    if(isset($_POST))
    {
        $btn_id = mysqli_real_escape_string($conn, $_POST['cnt_btn_id']);

        $query = "SELECT * FROM contacts_cms WHERE cnt_id='$btn_id'";

        $result = mysqli_query($conn , $query);

        $result_check = mysqli_num_rows($result);

        if($result_check == 1)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $data['contact'] = $row ;
            }
            echo json_encode($data);

        }
        else {
            echo "failed";
        }

        
    }

?>