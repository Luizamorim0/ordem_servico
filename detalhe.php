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
        <style type="text/css">
            p{
               text-align: justify;
            }
        </style>
      <!--Import Google Icon Font-->
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
    <center><h2>Detalhes</h2></center>
    <div class="row">
        <table>
            <thead>
               <th>ID</th>
               <th>Nome</th>
               <th>E-mail</th>
               <th>Senha</th>
               <th>CPF</th>
               <th>RG </th>
               <th>Telefone </th>
               <th>Endereço </th>
            </thead>
            <?php
             include './conexao.php';
             $id_pesquisa = $_GET['id'];
     echo "ID selecionado: " , $id_pesquisa,"<br>";
     $sql = "SELECT * FROM cliente WHERE id='$id_pesquisa'";
     $restultado = mysqli_query($conn, $sql);
     while ($dados = mysqli_fetch_array($restultado)) {
            ?>
            <tbody>
                 <td> <?php echo  $dados['id'] ?></td>
                 <td> <?php echo $dados['nome'] ?></td>
                 <td> <?php echo $dados['email'] ?></td>
                 <td> <?php echo $dados['senha'] ?></td>
                 <td> <?php echo $dados['cpf'] ?></td>
                 <td> <?php echo $dados['rg'] ?></td>
                 <td> <?php echo $dados['telefone'] ?></td>
                 <td> <?php echo $dados['endereco'] ?></td>
                 
         <td> 
          <a href="cad_os.php?id=<?php echo $dados['id'] ?>">
          <i class="material-icons prefix" title="Gerar OS">content_paste
</i> 
          </a>   
         </td>   
                 
              </tbody>
            
        <?php } ?>
    </div>
</div>

            
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js">
      
      </script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>