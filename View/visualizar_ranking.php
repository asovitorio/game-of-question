<?php
require_once '../Conexao.php';
require_once '../Dao/QuestaoDao.php';
require_once '../View/cabecalho.php';
require_once '../View/status_usuario.php';
require_once '../model/QuestaoModel.php';


$questao_dao = new QuestaoDao();
$nome = $_SESSION["nome_usuario"] . "- usuario<br> ";

@$_SESSION["pontos"];

if (isset($_GET["questao"]) != "") {
    
} else {
    
}
$sangue = new energia();
$con = new Conexao();
$dbcon = $con->conectar();
$sql = $dbcon->query("SELECT L.id_login AS ID,L.nome_login AS NOME,SUM(P.ponto),R.resistencia as soma FROM login L, questao Q, alternativas A, ponto P, login_has_questao S, resistencia R WHERE S.login_id_login = L.id_login AND S.questao_id_questao = Q.id_questao AND S.alternativas_id_alternativas = A.id_alternativas AND q.id_questao = a.questao_id_questao AND P.id_ponto = q.ponto_id_ponto AND A.tipo = 'c' AND l.id_login = R.login_id_login GROUP BY l.id_login ORDER BY SUM(P.ponto) DESC;");


?>




<div class="  indigo container">
    <div class="badge indigo " style=" ">Voltar<br> <a class="btn-floating btn-floating waves-effect waves-light green" style="float:top; margin: 1px" href="../View/lista_questoes.php"><i class="material-icons">arrow_back</i></a></div>


    <div style="text-align: center"><h3>Ranking</h3></div><td>



        <div  >
            <table class="table table-striped container" style="background-color: white" >
                <thead>
                    <tr>
                        <th scope="col" style="">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Pontuação</th>
                        <th scope="col">energia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $pos = 1;
                    while ($listar = mysqli_fetch_array($sql)) { ?>
                        <tr>

                            <th scope="row"><?php echo $pos; ?></th>
                            <td><?php echo $listar[1]; ?></td>
                            <td><?php echo $listar[2];
                    $pos++; ?></td>
                            <td><div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo$listar[3]; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div></td>


                        </tr>

<?php } ?>
                </tbody>
            </table>
            <br>  
        </div>
</div>     
<?php require_once '../View/rodape.php'; ?>