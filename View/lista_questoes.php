<?php
require_once '../Conexao.php';
require_once '../Dao/QuestaoDao.php';
require_once '../Dao/AcoesDao.php';
require_once '../View/cabecalho.php';
require_once '../model/QuestaoModel.php';
require_once '../View/status_usuario.php';
require_once '../Controler/teste.php';
$questao_dao = new QuestaoDao();
$opcao_dao = new AcoesDao();
$nome = $_SESSION["nome_usuario"];
$quest = isset($_GET["questao"]);
$id_usuario = $_SESSION["id_usuario"];

 if(@$_GET["alerta"]==1){
    echo" <button type=\"button\" class=\"btn btn-danger\">Sua energia já está no maximo</button>";
    
 }else{echo "";};
 
    $con = new Conexao();
    $dbcon = $con->conectar();
    $sql = $dbcon->query("SELECT Q.id_questao, Q.questao, P.ponto, Q.tipo FROM questao Q, ponto P
WHERE Q.ponto_id_ponto = P.id_ponto ORDER BY Q.id_questao;");
    
?>



    
   
     
<div class="alert indigo"  >
          <table class="table table-striped  table-responsive-xl " style="background-color: white" >
  <div class="badge indigo " style=" ">Ranking<br> <a class="btn-floating btn-floating waves-effect waves-light orange" style="float:top; margin: 1px" href="../View/visualizar_ranking.php"><i class="material-icons">format_list_numbered</i></a></div>
      <h3>Questões</h3>
              <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Questão</th>
      <th scope="col">Pontuação</th>
      <th scope="col">Nível</th>
      <th scope="col">Responder</th>
    </tr>
  </thead>
  <tbody>
      <?php while($listar = mysqli_fetch_array($sql)){
          $resposta = $questao_dao->questoes_respondida($id_usuario, $listar[0]);
          
          ?>
         <tr>
        <th scope="row"><?php echo $listar[0];?></th>
        <td><?php echo utf8_encode($listar[1]); ?></td>
        <td><?php echo utf8_encode($listar[2]); ?></td>
        <td><?php if($listar[3] == "facil"){
             echo"<span class=\"badge badge-success\" style=\"color: white\">$listar[3]</span>"; 
        } else if($listar[3] == "media") {
            echo "<span class=\"badge badge-warning\" style=\"color: white\">$listar[3]</span>";   
        }else if($listar[3] == "dificil") {
            echo "<span class=\"badge badge-danger\" style=\"color: white\">$listar[3]</span>";   
        }
        
        ?></td>
       <td><?php $a=$id_usuario; $b=$listar[0];
 
 if (teste_acao($a, $b) == "d") {
    echo "<a class=\"btn-floating btn-floating waves-effect waves-light green\" href=\"#?&acao=deletar\"><i class=\"material-icons\">healing</i></a>";
} else if (teste_acao($a, $b) == "a") {
    echo "<a class=\"btn-floating btn-floating waves-effect waves-light black\" href=\"#?&acao=deletar\"><i class=\"material-icons\">flash_on</i></a>";
} else if (questoes_respondida($a, $b) == "c") {
    echo "<a class=\"btn-floating btn-floating waves-effect waves-light blue\" href=\"#?&acao=deletar\"><i class=\"material-icons\">attach_money</i></a>";
} else if (teste_acao($a, $b) != "d" && questoes_respondida($a, $b) == "e") {
    if (questoes_respondida($a, $b) == "e") {
        echo "<a class=\"btn-floating btn-floating waves-effect waves-light red\" href=\"#?&acao=deletar\"><i class=\"material-icons\">highlight_off</i></a>";
    }
} else {
    echo "<a class=\"btn-floating btn-warning waves-effect waves-light \" href=\"../View/questoes.php?id_questao=$listar[0]&ponto=$listar[2]\"><i class=\"material-icons\">help_outline</i></a>";
}  ?>   
       </td>
 
          
    </tr>
  
   <?php } ?>
  </tbody>
      </table>
          <br>  
</div>
</div>
<?php require_once '../View/rodape.php'; 

 
 
 
?>

   