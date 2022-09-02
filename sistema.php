<?php 
include_once('config.php');
session_start();
//print_r($_SESSION);

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
    $logado = $_SESSION['email'];
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    $result = $conexao->query($sql);

   //print_r($result); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body {
    background-image: linear-gradient(to right, rgb(236, 33, 26), rgb(99, 14, 11));
    text-align: center;
    color: white;
}
h1{
    font-size: 30px;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark text-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA MARKS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    
    <?php 
    echo "<h1>Bem vindo <u>$logado</u></h1>";
    
    ?>
    <div class= "m-5">
    <table class="table text-white">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Senha</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">Sexo</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
      <th scope="col">Endereço</th>
      <th scope="col">...</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    while($user_data = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['nome']."</td>";
        echo "<td>".$user_data['senha']."</td>";
        echo "<td>".$user_data['email']."</td>";
        echo "<td>".$user_data['telefone']."</td>";
        echo "<td>".$user_data['sexo']."</td>";
        echo "<td>".$user_data['data_nasc']."</td>";
        echo "<td>".$user_data['cidade']."</td>";
        echo "<td>".$user_data['estado']."</td>";
        echo "<td>".$user_data['endereço']."</td>";
        echo "<td>ações</td>";
        echo "</tr>";
    }

    ?>
   
  </tbody>
</table>
    </div>
</body>
</html>