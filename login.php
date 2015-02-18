<?php

$con = mysqli_connect("localhost", "root", "", "resaswars");

if(mysqli_connect_errno())
    echo "Connect failed:" . mysqli_connect_error();
echo "Connected!";
$username = $_POST['username'];
$password = $_POST['password'];

$username = htmlspecialchars($username);
$password = htmlspecialchars($password);

$key = pack("H*", "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");

$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);

$query = "SELECT username, password FROM login WHERE username='$username'";
$result = mysqli_query($con, $query);
$num_rows = mysqli_num_rows($result);
if($num_rows > 0){
    $exists = false;
while($row = mysqli_fetch_array($result) && $exists == false){
    //$ciphertext_dec = base64_decode($row['password']);
    //$iv_dec = substr($ciphertext_dec, 0, $iv_size);
    //$ciphertext_dec = substr($ciphertext_dec, $iv_size);
    //$plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    
    if(password_verify($password, $row['password']))
        $exists = true;
}
}
if($exists == true)
{
    session_start();
    $_SESSION['login'] = $username;
    header("Location: gamepage.php");
}else{
    session_start();
    $_SESSION['login'] = "";
}

?>