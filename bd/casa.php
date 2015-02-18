


<div id='menu'>
    
    <h1>Menu</h1>
    
    <?php

    //        session_start();
    //        $userid = $_SESSION["userid"];
        
        $userid = 1;    // userid = 1 para testar
    
    
        //session_start();

        include "conf/mydata.php"; // Variáveis da ligação MySQL

        $c = mysqli_connect($MySqlHost, $MySqlUser, $MySqlPwd);
        if (!$c)
        {
            die("Erro ao ligar à BD: " . mysqli_errno ($c));
        }
    
        mysqli_select_db($c, $MySqlSchema);

        $query = "SELECT * FROM itens";
//        echo $query;
//        die();
        $res = mysqli_query($c, $query);

        while ($row = mysqli_fetch_array($res))
        {
            $id =  $row['item_id'];
            $nome = $row['nome'];
            $imagem = $row['imagem'];
            
            echo "<a href='comprar.php?item=$id'><p>$nome <img src='$imagem' alt='$nome'/></p></a>";
        }

    ?>

</div>




<div id='casa'>
    
    <h1>Minhas posses</h1>
    
    <?php

        $query2 = "SELECT * FROM itens, posses "
                . "WHERE item_id = id_item AND "
                . "id_user = $userid";

        $res2 = mysqli_query($c, $query2);

        $frase = "";
        
        while ($row2 = mysqli_fetch_array($res2))
        {
            $id =  $row2['item_id'];
            $nome = $row2['nome'];
            $imagem = $row2['imagem'];
            
            echo "<p>$nome <img src='$imagem' alt='$nome'/></p>";

            if (strpos($frase, $nome) === false)
            {
                $frase = $frase . "_" . $nome;
            }
        }
        
        $frase = substr ($frase, 1);
        $frase = $frase . ".png";

        echo "<p>As minhas posses: $frase</p>";
        
        echo "<img src='$frase' alt='...'/>";
        
    ?>

</div>