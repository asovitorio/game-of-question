<?php
require_once '../Conexao.php';


class QuestaoDao {

    function questoes($id) {

        $con = new Conexao();
        $dbcon = $con->conectar();
        $sql = $dbcon->query("SELECT * FROM questao WHERE id_questao = $id "); 

                while ($linha = mysqli_fetch_array($sql)){
                      
                      return $linha;
            }
            
           
        }//fim da Função questões
   
        function alternativa($id){
            
             $con = new Conexao();
        $dbcon = $con->conectar();
        $sql = $dbcon->query("SELECT * FROM alternativas WHERE questao_id_questao = $id"); 
        
                  while ($linha = mysqli_fetch_array($sql)){
                      utf8_encode($linha[2]);     
     echo" <p>";
     echo" <label>";
        echo"<input class=\"with-gap\" name=\"id_alternativa\" type=\"radio\" value = \" $linha[0]\"/>";
      echo"  <span style=\"text-align: justify;\">".utf8_encode($linha[2])."</span>";
     echo" </label>";
   echo" </p>";
      
            }
           
            return $linha;}//fim da função alternativas
        
    function todas_questoes() {

        $con = new Conexao();
        $dbcon = $con->conectar();
        $sql = $dbcon->query("SELECT * FROM questao ");

        while ($linha = mysqli_fetch_array($sql)) {

            return $linha;
        }
    }//fim da função listar todas
    
    function questoes_respondida($id_usuario, $id_questao) {

        $con = new Conexao();
        $dbcon = $con->conectar();
        $sql = $dbcon->query("SELECT LQ.login_id_login, LQ.questao_id_questao, A.tipo FROM login_has_questao LQ, questao Q, alternativas A WHERE LQ.login_id_login = '$id_usuario' AND LQ.questao_id_questao = '$id_questao' AND A.id_alternativas = LQ.alternativas_id_alternativas GROUP BY LQ.login_id_login ");

        while ($linha = mysqli_fetch_array($sql)) {

            return $linha;
        }
       /* if (mysqli_num_rows($sql) > 0) {
          
            return TRUE;
        } else {
          
            return FALSE;
        }*/
    }
    
      function alternativa_errada($id_usuario,$id_questao,$id_alternativa){
            
             $con = new Conexao();
        $dbcon = $con->conectar();
        $sql = $dbcon->query("SELECT A.tipo FROM alternativas A WHERE A.id_alternativas = $id_alternativa"); 
        
        while ($linha = mysqli_fetch_array($sql)){
            if($linha[0]=="e"){
                $sql = $dbcon->query("INSERT INTO `login_has_questao` (`login_id_login`, `questao_id_questao`, `alternativas_id_alternativas`) VALUES ('$id_usuario', '$id_questao', '$id_alternativa');");
                 header('Location: /trabalho_canvas/View/lista_questoes.php');
            }
           

                 
        }      
        
                     
            
        }

}//fim da classe                    


      

?>


