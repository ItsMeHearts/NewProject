<?php 
    session_start();
    include_once 'connectDB_CMS.php';
    if(!isset($_SESSION['username']))
    {
    
        echo "<script>alert('User Not Logged In');window.location='home_CMS.php'</script>";
    }
    else
    {
    $user = $_SESSION['username'];    
    $uid = $_SESSION['id'];
    
    if(isset($_POST))
    {
        // $username = mysqli_real_escape_string($conn , $_POST['username']);
        $mobile_number = mysqli_real_escape_string($conn, $_POST['number']);
        $text_message  = mysqli_real_escape_string($conn , $_POST['message']);
        
        // Authorisation details.
    $apiKey = urlencode('ggqkJVGnEKU-aBdmUbdEOLS2izIIqfccMlJmpvhLLO');
	$username = "heartshunter63@gmail.com";
	$hash = "c90cf12ad4edf6ef2366b784d8640ed28ad4212083d8c9c737ff708bcc2b2cad";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = $mobile_number; // A single number or a comma-seperated list of numbers
	$message = "From ".$user." - ".$text_message;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data ="apikey=".$apiKey."&username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
    curl_close($ch);
    
    $num = 1 ;
    echo $num ;
}
else{
    echo "failed";
}

}
?>