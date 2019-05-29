<?php
require_once '../Conexao.php';
require_once '../Dao/QuestaoDao.php';
require_once '../View/cabecalho.php';
require_once '../View/status_usuario.php';
require_once '../model/QuestaoModel.php';
require_once '../Dao/energia.php';



$questao_dao = new QuestaoDao();
$nome = $_SESSION["nome_usuario"];
$_GET["id_questao"];
$id_usuario = $_SESSION["id_usuario"];
$_SESSION["pontos"];
$_GET["id_alternativa"];
$energia = $ener_valores;

if (isset($_GET["questao"])!=""){
  }else{ }

 $con = new Conexao();
    $dbcon = $con->conectar();
    $sql = $dbcon->query("SELECT L.id_login AS ID,L.nome_login AS NOME,SUM(P.ponto),R.resistencia as soma FROM login L, questao Q, alternativas A, ponto P, login_has_questao S, resistencia R WHERE S.login_id_login = L.id_login AND S.questao_id_questao = Q.id_questao AND S.alternativas_id_alternativas = A.id_alternativas AND q.id_questao = a.questao_id_questao AND P.id_ponto = q.ponto_id_ponto AND A.tipo = 'c' AND l.id_login = R.login_id_login GROUP BY l.id_login ORDER BY SUM(P.ponto) DESC;");
   //SELECT L.id_login,L.nome_login, SUM(p.ponto) AS Soma FROM login L INNER JOIN login_has_questao QL ON QL.login_id_login = L.id_login INNER JOIN questao Q ON Q.id_questao = QL.questao_id_questao INNER JOIN ponto P ON p.id_ponto = Q.id_questao INNER JOIN alternativas A ON A.id_alternativas = QL.alternativas_id_alternativas WHERE A.tipo = 'c' GROUP BY l.id_login 
//SELECT L.id_login, L.nome_login, SUM(p.ponto) as SOMA FROM login L, questao Q, login_has_questao S, ponto p WHERE L.id_login = S.login_id_login AND Q.id_questao = S.questao_id_questao AND Q.ponto_id_ponto = P.id_ponto GROUP BY L.id_login ORDER BY SOMA DESC
?>





         
          <div style="text-align: center"><h3>Ataque</h3></div><td>
           
          
     
      <div  >
          <table class="table table-striped container" style="background-color: white" >
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Pontuação</th>
      <th scope="col">Energia</th>
      <th scope="col">Atacar</th>
      
    </tr>
  </thead>
  <tbody>
      <?php $pos = 1; while($listar = mysqli_fetch_array($sql)){?>
         <tr>
        <th scope="row"><?php echo $pos;?></th>
        <td><?php echo $listar[1]; ?></td>
        <td><?php echo $listar[2]; ?></td>
        <td><div class="progress">
  <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo$listar[3];?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div></td>
       <td>
           <a class="btn-floating btn-floating waves-effect waves-light black" href="../Controler/jogo.php?id_questao=<?php echo $_GET["id_questao"] . "&id_usuario_ataque=$listar[0]&id_alternativa=".$_GET["id_alternativa"]."&acao=ataca"; ?>"><i class="material-icons">flash_on</i></a>  
          </td>
          
          
    </tr>
  
   <?php $pos++;} ?>
  </tbody>
      </table>
          <br>  
</div>
     </div>     
<?php require_once '../View/rodape.php'; ?>