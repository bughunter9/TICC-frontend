<?php 

include('db_config.php');


$stmt = $mysqli->prepare("INSERT INTO `message`(`first_name`, `last_name`, `email`, `service`, `message`) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $f_name, $l_name, $email, $service, $message);


$f_name = $_POST['first-name'];
$l_name = $_POST['last-name'];
$email = $_POST['email'];
$service = $_POST['service'];
$message = $_POST['message'];


$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 
$encryption_iv = '1234567891011121';
$encryption_key = "TICCwebdev";


$f_name = openssl_encrypt($f_name, $ciphering,$encryption_key, $options, $encryption_iv); 
$l_name = openssl_encrypt($l_name, $ciphering,$encryption_key, $options, $encryption_iv); 
$email = openssl_encrypt($email, $ciphering,$encryption_key, $options, $encryption_iv); 
$service = openssl_encrypt($service, $ciphering,$encryption_key, $options, $encryption_iv); 
$message = openssl_encrypt($message, $ciphering,$encryption_key, $options, $encryption_iv); 


$isExecuted = $stmt->execute();
if($isExecuted == FALSE){
    echo "Some Error occured";
}
else {
    echo "We will contact you soon";
}
// if ($mysqli->query($query) === TRUE) {
//     echo "New record created successfully";
// } 
// else {
//     echo "Error: " . $query . "<br>" . $mysqli->error;
// }
?>