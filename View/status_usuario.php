<?php
require_once '../Conexao.php';
require_once '../Dao/QuestaoDao.php';
require_once '../View/cabecalho.php';
require_once '../model/QuestaoModel.php';
require_once '../Dao/energia.php';
session_start();
$questao_dao = new QuestaoDao();
$nome = $_SESSION["nome_usuario"];
$quest = isset($_GET["questao"]);
$id_usuario = $_SESSION["id_usuario"];
if (isset($_GET["questao"])!=""){
  }else{ }

    $con = new Conexao();
    $dbcon = $con->conectar();
    $sql = $dbcon->query("SELECT Q.id_questao, Q.questao, P.ponto, Q.tipo FROM questao Q, ponto P
WHERE Q.ponto_id_ponto = P.id_ponto");
    
    $energia = new energia();
    $ener_valores = $energia->lista_energia($id_usuario);
   
 $ener_valores;    
    
        if($ener_valores<0){
            header('Location: /trabalho_canvas/View/game_over.php');
        }
?>
<div class="center"><img src="../image/nome.png" class="img-fluid " alt="Responsive image" style="height: 100px; "></div>

<div class="alert btn-info container-fluid  " role="alert" >
    
            <form   action="../View/loginView.html"> 
                <h5> <span></span><span style="float: right"><button  type="submit" class="btn btn-success" >SAIR <i class="material-icons">
                            exit_to_app
                        </i></button></h5>
        </form>
            <button type="button" class="btn btn-success">
 <?php echo $_SESSION["nome_usuario"];?><span class="badge badge-light"><?php  echo $ener_valores."%"?></span>
  <span class="sr-only"> <h5>Energia</h5></span>
</button>
           
           <div class="progress">
               <div class="progress-bar bg-warning" role="progressbar" style="width: <?php  echo $ener_valores;?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
           </div> 



<?php require_once '../View/rodape.php'; ?>