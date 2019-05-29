<?php
require_once '../Conexao.php';
require_once '../Dao/QuestaoDao.php';
require_once '../model/QuestaoModel.php';
require '../View/status_usuario.php';
require '../View/cabecalho.php';
$id = new QuestaoModel();
$questao_lista = isset($_GET["id_questao"])? $_GET["id_questao"]:1;
$questao_dao = new QuestaoDao();
$questao = array();
$questao = $questao_dao->questoes($questao_lista);
$_SESSION["pontos"] = $_GET["ponto"];


 
?>

        
         
        
        <div class="card " style="">
            <h5 class="card-header  "><?php echo $questao_lista;?> - <?php echo utf8_encode($questao[2]);?></h5> </h5><span style=" margin-right:10px;margin-top: 10px; ">
               
    

                <form action="../View/Ranking.php?id = 1" method="get">
          <div class="card-body container" >
              <h5 class="card-title" style="text-align: justify; font: bold;">Alternativas</h5>
    <?php $listas = $questao_dao->alternativa(($questao_lista)); ?>
       
          <button class="btn waves-effect waves-light" type="submit" name="id_questao" value="<?php echo $questao[0]?>"style="margin-bottom: 20px;">Proxima
    <i class="material-icons right">send</i>
      </button>
     
  </form>
  
  </div>
</div>
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="../View/materialize/js/materialize.js" type="text/javascript"></script>
    </body>
</html>
