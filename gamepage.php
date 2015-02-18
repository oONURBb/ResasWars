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
        function buyItem(element, cost){
            
            //Se o dinheiro existente for maior que 0 quando subtraido o custo ao dinheiro existente
            if((money - cost) <= 0){
                alert("You don't have the money to buy that.");
                return;
            }
            
            //Verifica o id do elemento
            if(element.id == "tv")
            {
                
                //Muda o background do container
                document.getElementById("game").style = "background-image: url(Images/rsz_quartop.png);";
            }
            
            //Subtrai o custo ao dinheiro
            money = money - cost;
            updateMoneyString(money);
            //Muda a border do item carregado no menu para red
            element.style.border = "2px solid red";
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
            <div>Money: <div id="money"></div><div id="stamina"></div></div>
            
            <div class="menu">
                <ul>
<?php
    include "mydata.php"; //Variaveis ligação MySQL
    
    $con = mysqli_connect($MySqlHost, $MySqlUser, "", $MySqlSchema);
    
    if(!$con){
        die("Erro ao ligar á BD: " . mysqli_errno($con));
    }
    
    $query = "SELECT nome, nivel, pu_nextlvl, item_id, imagem FROM itens, posses WHERE id_user = 17 AND id_item = item_id";
    $result = mysqli_query($con, $query);
    
    while($row = mysqli_fetch_array($result)){
        $id = $row['item_id'];
        $nome = $row['nome'];
        $imagem = $row['imagem'];
        $pontos = $row['pu_nextlvl'];
        $nivel = $row['nivel'];
        
        echo "<li><a href='comprar.php?item=$id'><div class='buybutton'>$nome<p>$pontos Pontos. Lvl $nivel</p></div></a><img alt='$nome' src='Images/$imagem'/></li>";
    }
?>
                    <!--<li value="0"><div id="sofa" class="buybutton" onclick="buyItem(this, 10)">Comprar Sofa<p>10$</p></div><img alt="sofa" src="Images/sofa.jpg"></li>
                    <li value="0"><div id="tv" class="buybutton" onclick="buyItem(this, 25)">Comprar TV<p id="price">10$</p></div><img alt="TV" src="Images/tv.jpg"></li>
                    <li value="0"><div id="chair" class="buybutton" onclick="buyItem(this, 50)">Comprar Chair<p id="price">10$</p></div><img alt="TV" src="Images/cadeiraEscritorio.jpg"></li>
                    <li value="0"><div class="buybutton">Comprar Xadrex<p id="price">10$</p></div></li>-->
                </ul>
            </div>
            <?php
            
            $query = "SELECT * FROM itens, posses WHERE item_id = id_item AND id_user = $userid order by nome";
            $result = mysqli_query($con, $query);
            $frase = "";
            while($row = mysqli_fetch_array($result)){
                $id = $row['item_id'];
                $nome = $row['nome'];
                $imagem = $row['imagem'];
                
                if(strpos($frase, $nome) === false){
                    $frase = $frase . "_" . $nome;
                }
            }
            
            $frase = substr($frase, 1);
            $frase = $frase . ".png";
            
            if($frase == ".png"){
                    echo "<div style='float: left;" .
                         "margin-top: 17px;" .
                         "margin-left: 150px;".
                         "height: 420px;".
                         "width: 600px;" .
                         "border-radius: 2px;" .
                         "background-image: url(Images/quarto.png);".
                         "background-size: 100% 100%;'></div>";
            }else{
                echo "<div style='float: left; margin-top: 17px;" .
                "margin-left: 150px; height: 420px;width: 600px;" .
                "border-radius: 2px; background-image: url(Images/$frase);" .
                "background-size: 100% 100%;';></div>";
            }
            ?>
            <div class="clearfix"></div>
            </div>
        </div>
        
        <div class='footer'><button onclick="javascript:window.open('battle.php','Windows','width=650,height=350,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no,directories=no,status=no');return false")">Battle</button></div>
    </div>
</body>
</html>