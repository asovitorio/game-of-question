<?php


class Conexao {
private $host="localhost";
private $usuario="root";
private $senha = "admin";
private $banco= "bd_questionario";


function conectar(){
       
    $dbcon = mysqli_connect($this->host, $this->usuario, $this->senha,  $this->banco);
    return $dbcon;

    if($dbcon){echo " Conectado com sucesso";
}else{
        echo "erro ao conectar <br>";
    }

}



}
