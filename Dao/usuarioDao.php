<?php


require_once '../Conexao.php';
session_start();
class usuarioDao{
      function logar($email,$senha){
             $con = new Conexao();
      $dbcon =  $con->conectar();
        $sql = $dbcon->query("SELECT * FROM `login` WHERE email_login = '$email' AND senha_login = '$senha' ");
   while ($res = mysqli_fetch_array($sql)){
    $_SESSION["id_usuario"] = $res[0];
    $_SESSION["nome_usuario"] = $res[1];}
if(mysqli_num_rows($sql)>0){
   
    return TRUE;
    
}else{
    return FALSE;

}
        
    }
    
    function inserir($nome,$data,$email, $senha){
  
     $con = new Conexao();
        $dbcon = $con->conectar();
         $sql = $dbcon->query("INSERT INTO `login` (`id_login`, `nome_login`, `email_login`, `data_nascimento_login`, `senha_login`, `tipo_login`) VALUES (NULL, '$nome', '$email', '$data', '$senha', 'USER');");
         if($sql>0){
             $id_usu = mysqli_insert_id($dbcon);
             $dbcon->query("INSERT INTO `resistencia` (`id_resistencia`, `resistencia`, `login_id_login`) VALUES (NULL, '100', '$id_usu')"); 
            echo'<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Cadastro</h4>
  <p>Inserido com Sucesso</p>
  <hr>
  <p class="mb-0"> Volte e faça o login <a href="../View/loginView.html" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">
arrow_back
</i></a> </p>
</div>';
                         
         }  else {
             echo "Erro ao salvar";
         }
         
         
         
    }
     
}





