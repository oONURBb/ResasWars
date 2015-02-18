<!DOCTYPE html>

<html>
<head>
    <title>LET'S BATTLE</title>
</head>

<body>
    <?php
        session_start();
        include "mydata.php";
        $cod_user = $_SESSION['user_id'];
        $con = mysqli_connect($MySqlHost, $MySqlUser, $MySqlPwd, "resaswars");
        if (!$con)
        {
            die("Erro ao ligar à BD: " . mysqli_errno ($con));
        }
        
        $query = "SELECT l.username, u.nivel FROM users u, login l WHERE l.cod_user = u.cod_user AND u.cod_user != $cod_user";
        
        $res = mysqli_query($con, $query);
        
        while($row = mysqli_fetch_array($res)){
            $nome = $row['username'];
            $nivel = $row['nivel'];
            echo "<p>$nome - $nivel --> <a href='#'>Lutar</a></p>";
        }
        
    ?>


</body>
</html>
