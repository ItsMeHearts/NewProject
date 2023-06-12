<?php 
    session_start();
    $username = $_SESSION['username'];
    $uid = $_SESSION['id'];
    include_once 'connectDB_CMS.php';

    $query = "SELECT * FROM contacts_cms WHERE _id = '$uid' ORDER BY cnt_id DESC";
    $result = mysqli_query($conn , $query);
    $result_check = mysqli_num_rows($result);

    if($result_check > 0)
    {
        $delimter = ",";
        $filename = " $username " .date('d-M-y') ." .csv";

        $f = fopen('php://memory' , 'w');
        
        $fields = array('Contact Name' , 'Mobile Number' , 'Address');
        fputcsv($f , $fields , $delimter);

        while($row = mysqli_fetch_assoc($result))
        {
            $lineData = array($row['contact_name'] , $row['mobile_num'] , $row['address']);
            fputcsv($f , $lineData , $delimter);
        }

        fseek($f , 0 ); // seeks open file & move file pointer forward and backward .. 


        /**
         * header content-type : response to display type of content in browser
         * content-disposition : to display header response in browser in inline ..attachment.. 
         */
        header('Content-Type : text/csv');
        header('Content-Disposition : attachment ; filename = "'. $filename .'" ; ');

        fpassthru($f); // reads the file starting position to eof 
    
    
    }



?>