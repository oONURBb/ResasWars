<?php
session_start();
session_destroy();
$username = "";
$password = "";
$error = "";
$num_rows = 0;
include "mydata.php"; //Variaveis ligação MySQL
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$con = mysqli_connect($MySqlHost, $MySqlUser, "", $MySqlSchema);

if(mysqli_connect_errno())
    echo "Connect failed:" . mysqli_connect_error();
    
$username = $_POST['username'];
$password = $_POST['password'];

$username = htmlspecialchars($username);
$password = htmlspecialchars($password);

$exists = false;
$query = "SELECT username, password, cod_user FROM login WHERE username='$username'";
$result = mysqli_query($con, $query);
$num_rows = mysqli_num_rows($result);
if($num_rows > 0){
    
while($row = mysqli_fetch_array($result)){
    if(password_verify($password, $row['password'])){
	$cod = $row['cod_user'];
	$nivel = $row['nivel'];
        $exists = true;
    }
}
}
if($exists == true)
{
    session_start();
    $_SESSION['login'] = $username;
    $_SESSION['user_id'] = $cod;
    header("Location: gamepage.php");
}else{
    session_start();
    $_SESSION['login'] = "";
    $error = "Username ou Password errados";
}
}
?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Login</title>
<style>

	html
	{
		margin: 0;
		padding: 0;
		height: 100%;
		width: 100%;	
	}

	body{
	position: fixed;
		height: 100%;
		width:100%;
		padding: 0;
		margin: 0;
		background-image:url('LoginFundo.jpg');
		background-size: 100% 100%;
    	background-repeat: no-repeat;	
    }

	.loginForm
	{
		width: 300px;
		height: 60%;
		position: relative;
		top: 50%;
		transform: translateY(-50%);
		margin-left: 10%;
		border: 2px solid black;
		background-color: white;
		border-radius: 10px;

	}
	
	.loginForm input
	{
		vertical-align: middle;
		display:block;
		margin: 0 auto 5px auto;	
	}
	
	#centrado
	{
		position: relative;
		top: 50%;
		transform: translateY(-50%);
	}
</style>

</head>

<body>
	<form id="login" class="loginForm" action="index.php" method="post" accept-charset="UTF-8">
		<div id="centrado">
			<input type="text" placeholder="Username" name="username"/>
			<input type="password" placeholder="Password" name="password"/>
			<input type="submit" value="Login" />
            <span><?php echo $error; ?></span>
		</div>
	</form>
</body>

</html>
