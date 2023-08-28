<?php 

session_start();
session_unset();
session_destroy();
for($i=0; $i<3; $i++){
    echo"Você saiu";
    $i++;
}
header("Location: index.php");
exit();
?>