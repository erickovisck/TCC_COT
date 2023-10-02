<?php
    session_start();

    require_once "conexao/conexao.php";




       $usuario = $_SESSION["usuario"];
    
     

     
       if(is_null($usuario["email"])){
           session_unset();
       session_destroy();
           header("Location: Login.php");
           exit();
       }
       //echo $nomeUsuario;
if($_SERVER["REQUEST_METHOD"]==="POST"){
$pesquisa=$_POST["pesquisa"];
$_SESSION['pesquisa']=$pesquisa;
include_once "pesquisa.php";
    }
       $conexao->close(); 
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">

    <title>Document</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/menu.css">


</head>

<body>
    <div class="cabecalho">
        <nav role="navigation">
            <div id="menuToggle">

                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>



                <ul id="menu">
                    <h2>Usuário: <?= $usuario['nome_usuario']?> </h2>
                    <li><a href="perfil.php">Perfil</a></li>
                    <li><a href="ajuda.php">Ajuda</a></li>
                    <li><a href="configuracoes.php">Configurações</a></li>
                    <li><a href="amigos.php">Amigos</a></li>
                    <li><a href="autores.php">Autores</a></li>
                    <li><a href="sobre_nos.php">Sobre nós</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>


            </div>
        </nav>



        <div class="s128">
            <form>
                <div class="inner-form">
                    <div class="row">
                        <div class="input-field first" id="first">
                            <input class="input" id="inputFocus" type="text" placeholder="Keyword" />
                            <button class="clear" id="clear">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>


    </div>

    <main class="principal">
        <div class="banners">
            <a href="banners.php">Banners</a>
        </div>
        <div class="meio">
            <div class="comunidade">
                <a href="comunidade.php"> Comunidade</a>
            </div>
            <div class="itens">
                <a href="itens.php">Itens</a>
            </div>
        </div>
        <div class="sugestao">
            <a href="sugestao.php"> Sugestão de livros</a>
        </div>
    </main>
    <script>
    var btnDelete = document.getElementById('clear');
    var inputFocus = document.getElementById('inputFocus');
    //- btnDelete.on('click', function(e) {
    //-   e.preventDefault();
    //-   inputFocus.classList.add('isFocus')
    //- })
    //- inputFocus.addEventListener('click', function() {
    //-   this.classList.add('isFocus')
    //- })
    btnDelete.addEventListener('click', function(e) {
        e.preventDefault();
        inputFocus.value = ''
    })
    document.addEventListener('click', function(e) {
        if (document.getElementById('first').contains(e.target)) {
            inputFocus.classList.add('isFocus')
        } else {
            // Clicked outside the box
            inputFocus.classList.remove('isFocus')
        }
    });
    </script>
    <script src="js/extesion/choices.js"></script>
    <script src="js/extesion/custom-materialize.js"></script>
    <script src="js/extention/flatpickr.js"></script>
    <script src="js/main" .js></script>
</body>

</html>
