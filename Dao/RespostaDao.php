<?php

require_once '../Conexao.php';

$array = array();

class RespostaDao {

    function resposta($id_login, $id_questao, $id_alternativa) {
        $con = new Conexao();
        $dbcon = $con->conectar();

        if (alternativa_certa($id_questao, $id_alternativa)) {
            $dbcon->query("INSERT INTO `login_has_questao` (`login_id_login`, `questao_id_questao`) VALUES ('$id_login', '$id_questao');");
            echo "resposta correta denovo";
        } else {
            echo "resposta errada";
        }
    }
    function inserir_resposta($id_usuario, $id_questao, $id_alternativa){
        $con = new Conexao();
        $dbcon = $con->conectar();
         $sql = $dbcon->query("INSERT INTO `login_has_questao` (`login_id_login`, `questao_id_questao`, `alternativas_id_alternativas`) VALUES ('$id_usuario', '$id_questao', '$id_alternativa');");
         if($sql>0){
            header('Location: /trabalho_canvas/View/lista_questoes.php');
         }
         
    }
    
   
}

function alternativa_certa($id_questao, $id_alternativa) {
    $con = new Conexao();
    $dbcon = $con->conectar();
    $sql = $dbcon->query("SELECT * FROM alternativas WHERE questao_id_questao = $id_questao AND id_alternativas = $id_alternativa ");

    while ($linha = mysqli_fetch_array($sql)) {
        if ($linha[3] == "c") {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

//fim da função alternativa certa






