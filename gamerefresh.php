<?php
    session_start();
    $userid = $_SESSION["user_id"];
    include("mydata.php");
    $c = mysqli_connect($MySqlHost, $MySqlUser, $MySqlPwd, "resaswars");
        if (!$c)
        {
            die("Erro ao ligar à BD: " . mysqli_errno ($c));
        }
        
    $query = "SELECT * FROM itens, posses WHERE item_id = id_item AND id_user = $userid AND nivel > 1 order by nome";
    $result = mysqli_query($c, $query);
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
            echo "float: left; margin-top: 17px; margin-left: 150px; height: 420px; width: 600px;" .
            "border-radius: 2px; background-image: url(Images/quarto.png); background-size: 100% 100%;";
    }
    else{
            echo "float: left; margin-top: 17px; margin-left: 150px; height: 420px; width: 600px;" .
            "border-radius: 2px; background-image: url(Images/$frase); background-size: 100% 100%;";
    }
    
?>