<?php

include_once '../Conexao.php';
include_once '../Dao/usuarioDao.php';
require_once '../View/cabecalho.php';


$nome = isset($_POST["nome"])?$_POST["nome"]:'';
$nascimento = isset($_POST["data_nasc"])?$_POST["data_nasc"]:'';
$email = isset($_POST["email"])?$_POST["email"]:'';
$senha =md5(isset($_POST["senha"])?$_POST["senha"]:'');





$usuariodao = new usuarioDao();

 

    $con = new Conexao();
      $dbcon =  $con->conectar();
        $sql = $dbcon->query("SELECT * FROM `login` WHERE email_login = '$email' ");
if(mysqli_num_rows($sql)>0){
   echo'<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Não Cadastrado</h4>
  <p>Email já foi Cadastrado na base de dados! </p>
  <hr>
  <p class="mb-0"> Entre com um email valido <a href="../View/cadastro_usuario.html" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">
arrow_back
</i></a> </p>
</div>';
}else{
  if($usuariodao->inserir($nome, $nascimento, $email, $senha)>0){
     
    
   }
   

}
 
        
        
   // if(>1){
     
    
//}




//$sql = $dbcon->query("SELECT * FROM dblogin2 WHERE email='$email'");

//if(mysqli_num_rows($sql)>0){

  //  echo "Email já Cadastrado";
//}else{
    
   // echo "<h1>continuar<h1>";
    
   //}

   require_once '../View/rodape.php';