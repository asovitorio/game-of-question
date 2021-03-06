<?php
require_once '../Conexao.php';
require_once '../Dao/QuestaoDao.php';
require_once '../View/cabecalho.php';
require_once '../model/QuestaoModel.php';
session_start();
$questao_dao = new QuestaoDao();
$nome = $_SESSION["nome_usuario"];
$quest = isset($_GET["questao"]);
$id_usuario = $_SESSION["id_usuario"];

if (isset($_GET["questao"])!=""){
  }else{ }

 $con = new Conexao();
    $dbcon = $con->conectar();
    $sql = $dbcon->query("SELECT L.id_login, L.nome_login, SUM(p.ponto) as SOMA FROM login L, questao Q, login_has_questao S, ponto p WHERE L.id_login = S.login_id_login AND Q.id_questao = S.questao_id_questao AND Q.ponto_id_ponto = P.id_ponto GROUP BY L.id_login ORDER BY SOMA DESC");
   

?>
<form class="alert alert-success" role="alert" action="../View/questoes.php">
    <h5 style="text-align: right;"><span>
            <button  type="submit" class="btn btn-success" name="incremento" value="<?php echo $_SESSION["id_incremento"];?>"  style="text-align: right;">
                <?php echo $_SESSION["nome_usuario"]; ?> <i class="material-icons">exit_to_app</i></button>
        </span></h5>
</form>



      <div class="alert alert-primary" role="alert" >
      <h3>Ranking</h3>
     
      <div  >
          <table class="table table-striped container" style="background-color: white" >
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Pontuação</th>
      <th scope="col">Atacar</th>
    </tr>
  </thead>
  <tbody>
      <?php while($listar = mysqli_fetch_array($sql)){?>
         <tr>
        <th scope="row"><?php echo $listar[0];?></th>
        <td><?php echo $listar[1]; ?></td>
       <td><?php echo $listar[2]; ?></td>
       <td>
          <a class="btn-floating btn-floating waves-effect waves-light red" href="../contoroller/PessoaController.php?id=<?php echo $resutado['id'];?>&acao=deletar"><i class="material-icons">delete</i></a>    
          </td>
          
          
    </tr>
  
   <?php } ?>
  </tbody>
      </table>
          <br>  
</div>
          </div>
<?php require_once '../View/rodape.php'; ?>