<?php
    session_start();
    $_SESSION['username'];
    $uid = $_SESSION['id'];
   
    include_once "connectDB_CMS.php";

    $query = "SELECT * FROM contacts_cms WHERE _id='$uid'";
    $result = mysqli_query($conn , $query);
    $result_check = mysqli_num_rows($result);

    if($result_check > 0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $cid = $row['cnt_id']; 
            $image = $row['image'];
           
            $image_src = "uploads_contact/".$image;
           
            if($row['image'] == "")
            {
                echo "<tr>";
                echo "<td>". ucwords($row['contact_name']) ."</td>";
                echo "<td>" . $row['mobile_num'] ."</td>";
                echo "<td>" .ucwords($row['address']) . "</td>";
                echo "<td><img id=$cid src='user.png' height='30' width='30' class='img-circle image_'></td>";
                echo "<td><button class='btn btn-primary send_sms_btn' id=$cid data-toggle='modal' data-target='#send_sms_modal'>Send SMS</button></td>";
              
                
                echo "</tr>";
            }
            else
            {
            echo "<tr>";
            echo "<td>" . ucwords($row['contact_name']) . "</td>";
            echo "<td>" . ucwords($row['mobile_num']) . "</td>";
            echo "<td>" . ucwords($row['address']) . "</td>";
            echo "<td><img src='$image_src' height='30' width='30' id=$cid class='img-circle image_'></td>";
            echo "<td><button class='btn btn-primary send_sms_btn' id=$cid data-toggle='modal' data-target='#send_sms_modal'>Send SMS </button></td>";
           

            echo "</tr>";

            }
         
        }
    }
