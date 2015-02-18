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
        
        function refreshStamina(stamina) {
            var x = stamina/10;
            for(i=0; i < x; i++){
            document.getElementById("stamina");
            }
        }
        
        function refreshGame(){
            xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function(){
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                            document.getElementById("game").style = xmlhttp.responseText;
                  }
               }
               xmlhttp.open("GET", "gamerefresh.php");
               xmlhttp.send();
        }
        
        function refreshList(){
            xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function(){
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                     document.getElementById("menu").innerHTML = xmlhttp.responseText;
                     refreshGame();
                  }
               }
               xmlhttp.open("GET", "functions.php");
               xmlhttp.send();
        }
    </script>
</head>
<body onload=refreshGame()>
    
    <div id="wrapper">
        <div id="content">
            <div id="newContent">
            <div>Money: <div id="money"></div><div id="stamina"></div><a href="logout.php">Log Out</a></div>
            
            <div class="menu">
                <ul id="menu">
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
        echo "<a onclick='buyItem($pontos, $cost, $id); refreshList();' href='#'>";
        echo "<div class='buybutton'>$nome<p>$cost Pontos. Lvl $nivel</p></div>";
        echo "</a>";
        echo "<img alt='$nome' src='Images/$imagem'/>";
        echo "</li>";
    }
?>
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