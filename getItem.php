        <?php
            include "mydata.php";
            $con = mysqli_connect($MySqlHost, $MySqlUser, $MySqlPwd, "resaswars");
            if(!$con){
                die("Erro ao ligar à BD: " . mysqli_errno ($c));
            }
            $x = rand(1, 4);
            $query = "SELECT * FROM itens WHERE item_id = $x";
            $res = mysqli_query($con, $query);
            
            while($row = mysqli_fetch_array($res)){
                echo "<p> Ganhaste um(a) " . $row['nome'] . ".</p><p><img src='Images/_". $row['nome'] . ".png' alt='". $row['nome'] ."'/></p>";
            }
            mysqli_close($con);
        ?>