<?php



function teste_acao($id_usuario,$id_questao){
     $con = new Conexao();
    $dbcon = $con->conectar();
    $sql = $dbcon->query("SELECT opcao.opcaocol FROM opcao WHERE opcao.login_id_login = $id_usuario AND opcao.questao_id_questao=$id_questao");  
    while ($lista = mysqli_fetch_array($sql)){
        return $lista[0];
    }
 }
 function questoes_respondida($id_usuario, $id_questao) {

        $con = new Conexao();
        $dbcon = $con->conectar();
        $sql = $dbcon->query("SELECT LQ.login_id_login, LQ.questao_id_questao, A.tipo FROM login_has_questao LQ, questao Q, alternativas A WHERE LQ.login_id_login = '$id_usuario' AND LQ.questao_id_questao = '$id_questao' AND A.id_alternativas = LQ.alternativas_id_alternativas GROUP BY LQ.login_id_login ");

        while ($linha = mysqli_fetch_array($sql)) {

            return $linha[2];
        }
 }
 
 
/*if($resposta[2] == 'c'){
      echo "<a class=\"btn-floating btn-floating waves-effect waves-light blue\" href=\"#?id_questao=$listar[0]&acao=deletar\"><i class=\"material-icons\">attach_money</i></a>";}if($resposta[2] == 'e'){     echo "<a class=\"btn-floating btn-floating waves-effect waves-light red\" href=\"#&acao=deletar\"><i class=\"material-icons\">highlight_off</i></a>";
} if($resposta[2] == ''){ echo "<a class=\"btn-floating btn-warning waves-effect waves-light \" href=\"../View/questoes.php?id_questao=$listar[0]&ponto=$listar[2]\"><i class=\"material-icons\">help_outline</i></a>";}*/
?>