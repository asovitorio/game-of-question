<?php


class AcoesDao {
  
    function iserir_acao($acao,$id_usuario,$id_questao){
         $con = new Conexao();
        $dbcon = $con->conectar();
       $dbcon->query("INSERT INTO `opcao` (`idopcao`, `opcaocol`, `login_id_login`, `questao_id_questao`) VALUES (NULL, '$acao', '$id_usuario', '$id_questao');");
       
    }
    
   function teste_acao($id_usuario,$id_questao){
     $con = new Conexao();
    $dbcon = $con->conectar();
    $sql = $dbcon->query("SELECT opcao.opcaocol FROM opcao WHERE opcao.login_id_login = $id_usuario AND opcao.questao_id_questao=$id_questao");  
    while ($listar = mysqli_fetch_array($sql)){
       echo ($listar[0]);
               
    }
     
 }
 
 function opcoes($a,$b){
     
 if (teste_acao($a, $b) == "d") {
    echo "<a class=\"btn-floating btn-floating waves-effect waves-light green\" href=\"#?&acao=deletar\"><i class=\"material-icons\">healing</i></a>";
} else if (teste_acao($a, $b) == "a") {
    echo "<a class=\"btn-floating btn-floating waves-effect waves-light black\" href=\"#?&acao=deletar\"><i class=\"material-icons\">flash_on</i></a>";
} else if (questoes_respondida($a, $b) == "c") {
    echo "<a class=\"btn-floating btn-floating waves-effect waves-light blue\" href=\"#?&acao=deletar\"><i class=\"material-icons\">attach_money</i></a>";
} else if (teste_acao($a, $b) != "d" && questoes_respondida($a, $b) == "e") {
    if (questoes_respondida($a, $b) == "e") {
        echo "<a class=\"btn-floating btn-floating waves-effect waves-light red\" href=\"#?&acao=deletar\"><i class=\"material-icons\">attach_money</i></a>";
    }
} else {
    echo "<a class=\"btn-floating btn-warning waves-effect waves-light\" href=\"#?&acao=deletar\"><i class=\"material-icons\">help_outline</i></a>";
}
 }
}  
   
    
    //INSERT INTO `login_has_acoes` (`login_id_login`, `acoes_id_acoes`) VALUES ('3', '2');




$teste = new AcoesDao();
//if($teste->acoes($id_login, $id_questao));

//alternativa_certa(4,1);

//$teste->iserir_acao("a",4,1);
