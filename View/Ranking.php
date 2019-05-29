<?php
require_once '../Conexao.php';
require_once '../Dao/QuestaoDao.php';
require_once '../View/cabecalho.php';
require_once '../View/status_usuario.php';
require_once '../model/QuestaoModel.php';
require_once '../model/../Dao/energia.php';


$questao_dao = new QuestaoDao();

$nome = $_SESSION["nome_usuario"];
 $_GET["id_questao"];
$altetrnativa = $_GET["id_alternativa"];
$id_usuario = isset($_SESSION["id_usuario"]);
$ponto = $_SESSION["pontos"];
$energia = $ener_valores;

if (isset($_GET["questao"]) != "") {
    
} else {
    
}

$con = new Conexao();
$dbcon = $con->conectar();

$sql = $dbcon->query("SELECT L.id_login AS ID,L.nome_login AS NOME,SUM(P.ponto),R.resistencia as soma FROM login L, questao Q, alternativas A, ponto P, login_has_questao S, resistencia R WHERE S.login_id_login = L.id_login AND S.questao_id_questao = Q.id_questao AND S.alternativas_id_alternativas = A.id_alternativas AND q.id_questao = a.questao_id_questao AND P.id_ponto = q.ponto_id_ponto AND A.tipo = 'c' AND l.id_login = R.login_id_login GROUP BY l.id_login ORDER BY SUM(P.ponto) DESC;");
//attach_money
?>


<?php $questao_dao->alternativa_errada($_SESSION["id_usuario"],$_GET["id_questao"],$_GET["id_alternativa"]); ?>
<div class="alert indigo container-fluid"  >
            <table class="table table-striped container" style="background-color: white; " >
 <div class="badge indigo  " style=" ">Pontuar<br> <a class="btn-floating btn-floating waves-effect waves-light blue" style="float:top; margin: 1px" href="../Controler/jogo.php?acao=pontuar&id_questao=<?php echo $_GET["id_questao"] . "&id_usuario=$id_usuario&energia=$energia&ponto=$ponto&id_alternativa=".$_GET["id_alternativa"]; ?>"><i class="material-icons">attach_money</i></a></div>

    <div class="badge indigo " style=" ">Cura<br> <a class="btn-floating btn-floating waves-effect waves-light green" style="float:top; margin: 1px" href="../Controler/jogo.php?acao=cura&id_questao=<?php echo $_GET["id_questao"] . "&id_usuario=$id_usuario&energia=$energia&ponto=$ponto&id_alternativa=".$_GET["id_alternativa"]; ?>"><i class="material-icons">healing</i></a></div>

    <div class="badge indigo " style=" ">Atacar<br> <a class="btn-floating btn-floating waves-effect waves-light black" href="ataque.php?id_questao=<?php echo $_GET["id_questao"] . "&i_usuario=$id_usuario&id_alternativa=".$_GET["id_alternativa"]; ?>"><i class="material-icons">flash_on</i></a>    </div>

    <div style="text-align: center"><h3>Ranking</h3></div><td>



        
                <thead>
                    <tr>
                        <th scope="col" style="">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Pontuação</th>
                        <th scope="col">Energia</th>
                    </tr>
                </thead>
                <tbody>
<?php $pos = 1; while ($listar = mysqli_fetch_array($sql)) { ?>
                        <tr>
                            
                            <th scope="row"><?php echo $pos; ?></th>
                                <td><?php echo $listar[1]; ?></td>
                                <td><?php echo $listar[2]; $pos++;?></td>
                                <td><div class="progress">
  <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo$listar[3];?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div></td>
                            
               
                        </tr>

<?php }?>
                </tbody>
            </table>
            <br>  
        </div>
</div> 

<?php require_once '../View/rodape.php'; ?>