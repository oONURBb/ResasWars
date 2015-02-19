<!DOCTYPE html>

<html>
<head>
    <title>LET'S BATTLE</title>
    <script>
        
        function calcLuck(forca, defesaOp){
            var luck = (forca * 50)/defesaOp;
            if (luck > 80) {
                luck = 80;
            }
                var x = Math.floor(Math.random() * 101);
                if (x < luck) {
                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function(){
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                            document.getElementById("popBox").innerHTML = xmlhttp.responseText;
                        }
                    }
                        xmlhttp.open("GET", "getItem.php", true);
                        xmlhttp.send();
                    }
                    else{
                    alert("Your attack failed");
                }
        }
    </script>
</head>

<body onload="getH();" onresize="resize();">
    <?php
        session_start();
        include "mydata.php";
        $cod_user = $_SESSION['user_id'];
        $con = mysqli_connect($MySqlHost, $MySqlUser, $MySqlPwd, "resaswars");
        if (!$con)
        {
            die("Erro ao ligar à BD: " . mysqli_errno ($con));
        }
        
        $query = "SELECT * FROM users WHERE cod_user = $cod_user";
        $res = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($res)){
            $forca = $row['forca'];
            $nivelUser = $row['nivel'];
            }
            
        //echo $nivelUser;
        
        $query = "SELECT l.username, u.nivel, u.defesa FROM users u, login l WHERE l.cod_user = u.cod_user AND u.cod_user != $cod_user";
        $res = mysqli_query($con, $query);
        
        while($row = mysqli_fetch_array($res)){
            $nivel = $row['nivel'];
            $nome = $row['username'];
            $defesa = $row['defesa'];
            if(($nivelUser >= $nivel - 5)  &&  ($nivelUser <= $nivel + 5))
            {
    ?>
                <table class="tableUsers">
                    <tr>
                        <td>Username</td>
                        <td>Level</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $nivel ?></td>
                        <<td><a href='battle.php' onclick='calcLuck(<?php echo "$forca, $defesa" ?>);'>Lutar</a></td>
                    </tr>
                </table>
    <?php
            }
        }
    ?>
<div id="popBox">test</div>

</body>
</html>
