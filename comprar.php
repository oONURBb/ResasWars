<?php

        session_start();
        $userid = $_SESSION["user_id"];
        
        include "mydata.php"; //Variaveis ligação MySQL
        $itemid = $_GET["item"];

        $c = mysqli_connect($MySqlHost, $MySqlUser, $MySqlPwd);
        if (!$c)
        {
            die("Erro ao ligar à BD: " . mysqli_errno ($c));
        }
    
        mysqli_select_db($c, $MySqlSchema);
        
        $query = "SELECT * FROM posses WHERE $userid = id_user AND $itemid = id_item";

        $res = mysqli_query($c, $query);
        
        
        $num_count = mysqli_num_rows($res);
        if($num_count > 0){
                $query = "SELECT p.nivel, p.pu_nextlvl, u.pupgrade FROM posses p, users u WHERE $userid = p.id_user AND $itemid = id_item AND $userid = u.cod_user";
                $res = mysqli_query($c, $query);
                while($row = mysqli_fetch_array($res)){
                        $nivel = $row['nivel'] + 1;
                        $pu_nextlvl = $row['pu_nextlvl'];
                        $pu_nextlvl *= 2;
                        $pupgrade = $row['pupgrade'];
                }
                $query = "UPDATE posses SET nivel = $nivel, pu_nextlvl = $pu_nextlvl WHERE id_user = $userid AND id_item = $itemid";
                mysqli_query($c, $query);
                $pupgrade -= $pu_nextlvl/2;
                $query = "UPDATE users SET pupgrade = $pupgrade WHERE cod_user = $userid";
                echo "alert($pupgrade)";
                mysqli_query($c, $query);
                
                include("gamerefresh.php");
        }
        if($num_count == 0){

        $query = "INSERT INTO posses (id_user, id_item) VALUES ($userid, $itemid)";

        $res = mysqli_query($c, $query);
        

        if (mysqli_error($c))
        {
            die ("Erro a inserir " . mysqli_error($c));
        }
        }
        mysqli_close($c);
?>