<!DOCTYPE html>
 <?php
    session_start();
    $userid = $_SESSION["user_id"];
    if($_SESSION["user_id"] === null)
        header("Location: index.php");
 ?>   
    
<html>
<head>
    <title>Gamepage</title>
    <link rel="stylesheet" href="mystyle.css"/>
    
    <script>   
        var money = 190;
        var mPerSec = 1;
        function reset(){
            document.getElementById(1).style.backgroundColor = "white";
            document.getElementById(2).style.backgroundColor = "white";
            document.getElementById(3).style.backgroundColor = "white";
            document.getElementById(4).style.backgroundColor = "white";
            document.getElementById(5).style.backgroundColor = "white";
            document.getElementById(6).style.backgroundColor = "white";
        }
        function placeHere(id){
            reset();
            document.getElementById(id).style.backgroundColor = "#D3D3D3";
        }
        // funçao utilizada para comprar os items
        function buyItem(pupgrade, cost, id_item){
            if (cost > pupgrade) {
               alert("Não tens pontos de upgrade suficientes para esta ação");
            }else{
               xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function(){
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                            document.getElementById("game").style = xmlhttp.responseText;
                  }
               }
               xmlhttp.open("GET", "comprar.php?item=" + id_item, true);
               xmlhttp.send();
            }
        }
        
        //Muda o innerHTML para o valor passado ("money")
        function updateMoneyString(money){
            document.getElementById("money").innerHTML = money.toString();   
        }
        
        function addMoney(money, mPerSec){
            var auxmoney = money + mPerSec;
            updateMoneyString(money);
            return auxmoney
        }
        
        var forca = 16;
        var stamina = 100;
        var estrategia = 10;
        var defesa = 10;
        var defesaOp = 10;
        
        function refreshStamina(stamina) {
            var x = stamina/10;
            for(i=0; i < x; i++){
            document.getElementById("stamina");
            }
        }
        
        setInterval(function(){
            money = addMoney(money, mPerSec);
        }, 1000);
    </script>
</head>
<body>
    
    <div id="wrapper">
        <div id="content">
            <div id="newContent">
            <div>Money: <div id="money"></div><div id="stamina"></div><a href="logout.php">Log Out</a></div>
            
            <div class="menu">
                <ul>
<?php
    include "mydata.php"; //Variaveis ligação MySQL
    
    $con = mysqli_connect($MySqlHost, $MySqlUser, "", $MySqlSchema);
    
    if(!$con){
        die("Erro ao ligar á BD: " . mysqli_errno($con));
    }
    
    $query = "SELECT i.nome, i.item_id, i.imagem, p.nivel, p.pu_nextlvl, u.pupgrade FROM itens i, posses p, users u WHERE p.id_user = $userid AND u.cod_user = $userid AND i.item_id = p.id_item";
    $result = mysqli_query($con, $query);
    
    while($row = mysqli_fetch_array($result)){
        $id = $row['item_id'];
        $nome = $row['nome'];
        $imagem = $row['imagem'];
        $cost = $row['pu_nextlvl'];
        $pontos = $row['pupgrade'];
        $nivel = $row['nivel'];
        echo "<li>";
        echo "<a onclick='buyItem($pontos, $cost, $id);' href='#'>";
        echo "<div class='buybutton'>$nome<p>$cost Pontos. Lvl $nivel</p></div>";
        echo "</a>";
        echo "<img alt='$nome' src='Images/$imagem'/>";
        echo "</li>";
    }
?>
                    <!--<li value="0"><div id="sofa" class="buybutton" onclick="buyItem(this, 10)">Comprar Sofa<p>10$</p></div><img alt="sofa" src="Images/sofa.jpg"></li>
                    <li value="0"><div id="tv" class="buybutton" onclick="buyItem(this, 25)">Comprar TV<p id="price">10$</p></div><img alt="TV" src="Images/tv.jpg"></li>
                    <li value="0"><div id="chair" class="buybutton" onclick="buyItem(this, 50)">Comprar Chair<p id="price">10$</p></div><img alt="TV" src="Images/cadeiraEscritorio.jpg"></li>
                    <li value="0"><div class="buybutton">Comprar Xadrex<p id="price">10$</p></div></li>-->
                </ul>
            </div>
            
            <div id="game"></div>
            <div class="clearfix"></div>
            </div>
        </div>
        
        <div class='footer'><button onclick="javascript:window.open('battle.php','Windows','width=650,height=350,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no,directories=no,status=no');return false")">Battle</button></div>
    </div>
</body>
</html>