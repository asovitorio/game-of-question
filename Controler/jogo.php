<?php

require_once '../Dao/RespostaDao.php';
require_once '../Dao/energia.php';
require_once '../Dao/AcoesDao.php';


session_start();
$nome = $_SESSION["nome_usuario"];
$id_questao = $_GET["id_questao"];
$altetrnativa = $_GET["id_alternativa"];
$id_usuario = $_SESSION["id_usuario"];
$id_usuario_ataque = $_GET["id_usuario_ataque"];
$ponto = $_SESSION["pontos"];

$acao = $_GET["acao"];
$energia_dao = new energia();
$opcao = new AcoesDao();

//pontuar
switch ($acao) {
    case "pontuar":
        $inserir_ponto = new RespostaDao();
        $inserir_ponto->inserir_resposta($id_usuario, $id_questao, $altetrnativa);
        break;

    //cura
    case "cura":
        $energia = $_GET["energia"];
        $cura = new energia();
        $cura->atualizar_energia_defesa($id_usuario, $energia, $ponto);
        $opcao->iserir_acao("d", $id_usuario, $id_questao);



        //ataque
        break;

    case "ataca":
        $ataque = new energia();
        $ataque_energia = $ataque->busca_energia($id_usuario_ataque);
        $cura = new energia();
        $cura->atualizar_energia_ataque($id_usuario_ataque, $ataque_energia, $ponto);
        $opcao->iserir_acao("a", $id_usuario, $id_questao);


        break;
}
?>




