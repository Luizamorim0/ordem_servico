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
        <title>Exibir Clientes</title>
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

        <div class="container">
            <p>
            <h6>Clientes Cadastrados</h6>
        </p>
        
            <div class="row">
                <div class="col s6">
            <form action="exibir_cliente.php" method="post">
                <label>Nome de pesquisa: </label>
                <input type="text" name="pesquisa">
                </div>  
                 <div class="col s6">
                <button class="btn waves-effect waves-light" type="submit" name="action">Pesquisa
                <i class="material-icons right">send</i>
                </button>
            </form>
            </div>
        </div>
        
        
        
           
            <table class="bordered highlight">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>E-MAIL</th>
                        
                    </tr>
                </thead
                
                <tbody>
                     <?php
                       include './conexao.php';
                       
                       $pesquisa = @$_POST['pesquisa'];
                       echo 'Nome Pesquisado:<div class="red-text">' .$pesquisa ."</div> <br>";
                       
                       
                       $sql = "SELECT * FROM cliente WHERE nome LIKE '%".$pesquisa."%'";
                       $resultado = mysqli_query($conn, $sql);
                       while ($dados = mysqli_fetch_array($resultado)) {
                           ?>
                             <tbody>
                                 <tr>
                                    <td><?php  echo $dados['id'] ?> </td>
                                    <td class="red-text"><?php  echo $dados['nome'] ?> </td>
                                    <td><?php  echo $dados['email'] ?> </td>
                                    
                                    <td> 
                      <a href="detalhe.php?id=<?php echo $dados['id'] ?>">
                        <i class="material-icons prefix">format_list_bulleted</i> 
                      </a>   
                    </td>              
                    <td> 
                      <a href="cad_os.php?id=<?php echo $dados['id'] ?>">
                          <i class="material-icons prefix" title="ADD OS">add_circle</i> 
                      </a>   
                    </td>                     
                                 </tr>
                                 <?php  } ?>
                              </tbody>
                          
                         
                       
                    
                    
                </tbody>
                
            </table>    
    
    
    
    
    </div>
        
        
        

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>
