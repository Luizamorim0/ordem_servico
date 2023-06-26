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
        <script><!-- comment -->
            function ok(){
            setTimeout("window.location='cad_cliente.php'");
            }
            
            function erro(){
            setTimeout("window.location='cad'");
            }
            
            
            </script>
        
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

        
        
        <?php include './menu.php'; ?> 

        <div class="container">
            <h6 class="blue-text lighten-2">Cadastramento de Cliente</h6>
        </div>
        
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Peça 1</th>
                        <th>Valor 1</th>
                        <th>Peça 2</th>
                        <th>Valor 2</th>
                        <th>Peça 3</th>
                        <th>Valor 3</th>
                    </tr>
                </thead>
                <?php 
                $nome     = $_POST['nome'];
                $email    = $_POST['email'];
                $cpf      = $_POST['cpf'];
                $peca_1       = $_POST['peca_1'];
                $valor1 = $_POST['valor1'];
                $peca_2 = $_POST['peca_2'];
                $valor2 = $_POST['valor2'];
                $peca_3 = $_POST['peca_3'];
                $valor3 = $_POST['valor3'];
                echo '   
                 <tbody>
                    <tr>
                        <td>' . $nome . '</td>
                        <td>' . $email . '</td>
                        <td>' . $cpf . '</td>
                        <td>' . $peca_1 . '</td>
                        <td>' . $valor1 . '</td>
                        <td>' . $peca_2 . '</td>
                        <td>' . $valor2 . '</td>
                        <td>' . $peca_3 . '</td>
                        <td>' . $valor3 . '</td>
                    </tr>
                 </tbody> ';
                include './conexao.php';
 $inserir = $conn ->query("INSERT INTO usuarios   VALUES
     ('$nome','$email','$cpf','$peca_1','$valor1','$peca_2','$valor2','$peca_3','$valor3')");      

 if($inserir){
     echo" <hr><br><p>Cliente cadastrado com sucesso!! <br><hr>";
     header("Refresh:3; URL=exibiros.php");

 }else{
     echo" <hr><br><p>Cliente não cadastrado<br><hr>";
 }
 ?>
     </table>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>