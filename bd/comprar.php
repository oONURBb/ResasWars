<?php

//        session_start();
//        $userid = $_SESSION["userid"];
        
        $userid = 1;    // userid = 1 para testar
        
        $itemid = $_GET["item"];
        
        include "conf/mydata.php"; // Variáveis da ligação MySQL

        $c = mysqli_connect($MySqlHost, $MySqlUser, $MySqlPwd);
        if (!$c)
        {
            die("Erro ao ligar à BD: " . mysqli_errno ($c));
        }
    
        mysqli_select_db($c, $MySqlSchema);

        $query = "INSERT INTO posses (id_user, id_item) VALUES ($userid, $itemid)";

        $res = mysqli_query($c, $query);

        if (mysqli_error($c))
        {
            die ("Erro a inserir " . mysqli_error($c));
        }
        else    
        {
            echo "<p>Compra efectuada</p>";
        }
        
?>
<p><a href="casa.php">Voltar</a></p>