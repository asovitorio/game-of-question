<?php
require_once '../Dao/usuarioDao.php';
require '../View/cabecalho.php';

$email="";
$senha="";
if(isset($_GET)&& !empty($_GET)){
$email = $_GET['email'];

($senha = $_GET['senha']);
}
$usuariodao = new usuarioDao();


if($usuariodao->logar($email, md5($senha))>0){
   // echo "<div class='p-3 mb-2 bg-primary text-white'>$i</div>";
    echo'<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Logado</h4>
  <p>Parabéns você acessou o Scientific Toy </p>
  <hr>
  <p class="mb-0">Obrigado por Acessar nosso sistema. <a class="btn btn-outline-success" href="../View/lista_questoes.php"><i class="material-icons">send</i></a></p> 
</div>';
  
}  else {
    // echo "<div class='p-3 mb-2 bg-primary text-white'>$i</div>";
    echo'<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Erro</h4>
  <p>Impossivel fazer o login</p>
  <hr>
  <p class="mb-0">Usuário ou Senha Invalido.  <a href="../View/Ranking.html">Voltar</a> </p>
</div>';
}
    ?>
    
