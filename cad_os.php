<?php
    session_start();
    include_once('conexao.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION[$senha]) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }
    $logado = $_SESSION['email'];

    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM cliente WHERE id LIKE '%$data%' or nome LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM cliente ORDER BY id DESC";
    }
    $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
    <head>

        <!--Import Google Icon Font-->
        <meta charset="UTF-8"> <!-- comment -->
        <title>HOME</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <?php
        include './menu.php';
        ?> 
        <form action="recebe_cad_os.php" method="post">  
 
            <div class="container">
                <div class="row">
                    <h5 class="green-text lighten-3">Cadastro de Clientes</h5>
                    
                    <div class="col s7">
                        <label class="black-text">Nome Completo </label>
                        <input type="text" name="nome">
                    </div>

                    <div class="col s5">
                        <label class="black-text">E-mail Pessoal </label>
                        <input type="text" name="email" required="">
                    </div>

                   
                    <div class="col s3">
                        <label class="black-text">CPF </label>
                        <input type="text" name="cpf">
                    </div>

                    

                    <div class="col s3">
                        <label class="black-text">Peça 1 </label>
                        <input type="text" name="peca_1">
                    </div>

                    <div class="col s3">
                        <label class="black-text">Valor 1 </label>
                        <input type="text" name="valor1">
                    </div>

                    <div class="col s3">
                        <label class="black-text">Peça 2 </label>
                        <input type="text" name="peca_2">
                    </div>

                    <div class="col s3">
                        <label class="black-text">Valor 2 </label>
                        <input type="text" name="valor2">
                    </div>
                    
                    <div class="col s3">
                        <label class="black-text">Peça 3 </label>
                        <input type="text" name="peca_3">
                    </div>
                    
                    <div class="col s3">
                        <label class="black-text">Valor 3 </label>
                        <input type="text" name="valor3">
                    </div>
                    
                    

                    <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar
                        <i class="material-icons right">send</i>
                    </button>
                    </form>
                
             </div>
            </div>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>