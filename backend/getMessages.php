<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
include('db_config.php');

$sql = "SELECT * FROM `message`";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0;
    $decryption_iv = '1234567891011121';
    $decryption_key = "TICCwebdev";
     


    while($row = $result->fetch_assoc()) {
        $first_name=openssl_decrypt ($row["first_name"], $ciphering,$decryption_key, $options, $decryption_iv);
        $last_name=openssl_decrypt ($row["last_name"], $ciphering,$decryption_key, $options, $decryption_iv);
        $email=openssl_decrypt ($row["email"], $ciphering,$decryption_key, $options, $decryption_iv);
        $service=openssl_decrypt ($row["service"], $ciphering,$decryption_key, $options, $decryption_iv);
        $message=openssl_decrypt ($row["message"], $ciphering,$decryption_key, $options, $decryption_iv);

        echo "first name: " . $first_name. "<br>last name: " . $last_name. "<br>email: " . $email."<br>service: " . $service. "<br>message: " . $message."<br><br><br>";
    }
} else {
  echo "0 results <br>";
}

echo "<a href='./Login/logout.php'>logout</a>"
?>