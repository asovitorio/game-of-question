<?php

require_once '../Conexao.php';

class energia {

    function lista_energia($id_login) {
        $con = new Conexao();
        $dbcon = $con->conectar();
        $sql = $dbcon->query("SELECT L.id_login, L.nome_login, R.resistencia FROM resistencia R INNER JOIN login L ON L.id_login = R.login_id_login WHERE L.id_login =$id_login");
        while ($energia = mysqli_fetch_array($sql)) {
            return $energia[2];
        }
    }

//fim da função

    function atualizar_energia_ataque($id_login, $res_atual, $ponto) {
        $con = new Conexao();
        $dbcon = $con->conectar();
        $energia_ataque = $res_atual - $ponto;
        $sql = $dbcon->query("UPDATE `resistencia` SET `resistencia` = $energia_ataque WHERE `resistencia`.`id_resistencia` = $id_login AND `resistencia`.`resistencia` = $res_atual; ");
        header('Location: /trabalho_canvas/View/lista_questoes.php?');
    }

    function atualizar_energia_defesa($id_login, $res_atual, $ponto) {
        $con = new Conexao();
        $dbcon = $con->conectar();
        $energia_ataque = $res_atual + $ponto;
        if ($energia_ataque < 100) {
            $sql = $dbcon->query("UPDATE `resistencia` SET `resistencia` = $energia_ataque WHERE `resistencia`.`id_resistencia` = $id_login AND `resistencia`.`resistencia` = $res_atual; ");
            header('Location: /trabalho_canvas/View/lista_questoes.php?');
        } else {
            $sql = $dbcon->query("UPDATE `resistencia` SET `resistencia` = '100' WHERE `resistencia`.`id_resistencia` = $id_login AND `resistencia`.`resistencia` = $res_atual; ");
            header('Location: /trabalho_canvas/View/lista_questoes.php?alerta=1');
        }
    }

    function atualizar_energia_maximo($id_login, $res_atual, $ponto) {
        $con = new Conexao();
        $dbcon = $con->conectar();
        $energia_maximo = 100;
        $sql = $dbcon->query("UPDATE `resistencia` SET `resistencia` = $energia_maximo WHERE `resistencia`.`id_resistencia` = $id_login AND `resistencia`.`resistencia` = $res_atual; ");
        header('Location: /trabalho_canvas/View/lista_questoes.php?alerta=1');
    }

    function busca_energia($id_usuario) {
        $con = new Conexao();
        $dbcon = $con->conectar();
        $sql = $dbcon->query("SELECT L.nome_login, R.resistencia FROM resistencia R, login L WHERE R.login_id_login = L.id_login AND L.id_login = $id_usuario");
        $energia = mysqli_fetch_array($sql);
        return $energia[1];
    }

}

$teste = new energia();
//echo $teste->atualizar_energia_ataque(2,38,12);
//echo $teste->atualizar_energia_defesa(2,65,25);


        