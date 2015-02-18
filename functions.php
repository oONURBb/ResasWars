<?php
    function refreshList(){
    session_start();
    $userid = $_SESSION['user_id'];
    include("mydata.php");

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
    }
    
    refreshList();
?>