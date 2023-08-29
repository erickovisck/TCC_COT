<?php
//conexao com banco

$servidor="localhost:3306";
$usuario="root";
$senha="";
$banco="tccbeta";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);
$mens="";
if($conexao->connect_error){
   /* if($servidor=="localhost:3306"){
        $servidor="localhost:3308";
        $conexao=null;
        $conexao = new mysqli($servidor, $usuario, $senha, $banco);
          }

          
          if($servidor=="localhost:3308"){
            $servidor="localhost:3306";
            $conexao=null;
              }else{
              
    
              }
              $conexao = new mysqli($servidor, $usuario, $senha, $banco); */
  die("erro conexao servidor");
}else{
    $mens="Servidor online <br>";
}


?>



