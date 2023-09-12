<?php 

session_start();
session_unset();
session_destroy();
for($i=0; $i<3; $i++){
    echo"<script language='javascript' type='text/javascript'>alert('Você saiu')
    ;window.location.href='Login.html'</script>";;
    $i++;
}

exit();
?>
