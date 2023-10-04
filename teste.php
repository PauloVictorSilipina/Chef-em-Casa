include_once "initialize.php";

     $post = new Post($db);
     $receitasFavoritas = $post -> receitasFavoritas($_SESSION['user_id']);
     $cont = 0;
     echo "<div class='container'>";
     foreach($receitasFavoritas as $i) {
         if($cont == 0) {
             echo "<div class='row receitas-visualizadas'>";
         }
         echo "<div class='col-lg-4 col-12'><img src='". $i['RecImg'] ."'><a href='#'><span>". $i['RecNome']."</span></a></div>";
         $cont++;
         if($cont ==3) {
             echo "</div>";
             $cont = 0;
         }
     }
     echo "</div>";