<?php
$username = "";
$password = "";
$passwordRepeat = "";
$email = "";
$error = "";
$num_rows = 0;

include "mydata.php"; //Variaveis ligação MySQL
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$con = mysqli_connect($MySqlHost, $MySqlUser, "", $MySqlSchema);

if(mysqli_connect_errno())
	echo "Connect failed:" . mysqli_connect_error();


$username = $_POST['username'];
$password = $_POST['password'];
$passwordRepeat = $_POST['passwordRepeat'];
$email = $_POST['email'];

$username = htmlspecialchars($username);
$password = htmlspecialchars($password);
$passwordRepeat = htmlspecialchars($passwordRepeat);
$email = htmlspecialchars($email);

$queryIsExist = "SELECT * FROM login WHERE username='$username' OR email='$email'";

$result = mysqli_query($con, $queryIsExist);
$num_rows = mysqli_num_rows($result);
if($password != $passwordRepeat)
{
	$error = "A password é diferente da Confirmação";
}elseif($num_rows > 0)
{
	//session_start();
	//$_SESSION['login'] = "";
	$error = "Username ou Email já existe!";
}else{
	session_start();
	$_SESSION['login'] = $username;
	$_SESSION['user_id'] = $cod;
	header("Location: gamepage.php");
	function base64_new_encode($input) {
		return strtr(base64_encode($input), '+/=', '-_,');
	}
	$password = password_hash("$password", PASSWORD_DEFAULT);
	//session_start();
	//$_SESSION['login'] = $username;
	$queryInsert = "INSERT INTO login(username, password, email,enable) VALUES ('$username','$password','$email',0)";
	mysqli_query($con, $queryInsert);
	
	$querySelect = "SELECT MAX(cod_user) AS result FROM login";
	
        $res = mysqli_query($con, $querySelect);
	
	while($row = mysqli_fetch_array($res)){
		$numr = $row['result'];
	}
	echo $numr;
	
	for($i = 1; $i < 5; $i++){
		$queryInsert = "INSERT INTO posses (id_user, id_item, nivel, pu_nextlvl) VALUES ($numr, $i, 1, 200)";
		
		mysqli_query($con, $queryInsert);
	}
	
	$queryInsert = "INSERT INTO users (cod_user, forca, estrategia, defesa, pupgrade, stamina, xp, xpnec, nivel) VALUES ($numr, 10, 10, 10, 0, 100, 0, 200, 1)";
	
	mysqli_query($con, $queryInsert);
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
	<form id="login" class="loginForm" action="registo.php" method="post" accept-charset="UTF-8">
		<div id="centrado">
			<input type="text" placeholder="Username" name="username"/>
			<input type="password" placeholder="Password" name="password"/>
            <input type="password" placeholder="Password" name="passwordRepeat"/>
            <input type="email" placeholder="email" name="email" />
			<input type="submit" value="Registar" />
            <span><?php echo $error; ?></span>
		</div>
	</form>
</body>

</html>