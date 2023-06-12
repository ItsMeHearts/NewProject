<?php 
    session_start();
    $_SESSION['username'];
    $uid = $_SESSION['id'];
    include_once "connectDB_CMS.php";

    if(isset($_POST))
    {
        $id = mysqli_real_escape_string($conn, $_POST['image_id']);

        $query = "SELECT * FROM contacts_cms WHERE cnt_id = '$id'";
        $result = mysqli_query($conn, $query);
        $result_check = mysqli_num_rows($result);
        if($result_check > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $image = $row['image'];
                $image_src = 'uploads_contact/'.$image ;

                if($row['image'] == "")
                {
                    
                    echo "<img src='user.png' height='200px' width='200px' class='img-circle'>" ;
                    echo "<br>";
                    echo "<br>";

                    echo ucwords($row['contact_name']);
                    echo "<br>";
                    echo "<br>";

                    echo $row['mobile_num'];
                    echo "<br>";
                    echo "<br>";

                    echo ucwords($row['address']);
                    echo "<br>";
                   

                   
                }
                else
                { 
                    echo "<img src='$image_src' height='200px' width='200px' class='img-circle'>";
                    echo "<br>";
                    echo "<br>";

                    echo ucwords($row['contact_name']);
                    echo "<br>";
                    echo "<br>";

                    echo $row['mobile_num'];
                    echo "<br>";
                    echo "<br>";

                    echo ucwords($row['address']);
                    echo "<br>";
                    

                    
                }
            
            }
        }
    }


?>