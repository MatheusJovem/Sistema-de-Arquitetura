<?php
session_start();
include_once('config.php');
// print_r($_SESSION);
if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
$logado = $_SESSION['nome'];
if(!empty($_GET['search']))
{
    $data = $_GET['search'];
    $sql = "SELECT * FROM projetos WHERE id LIKE '%$data%' or titulo LIKE '%$data%' or cliente LIKE '%$data%' or arquiteto LIKE '%$data%' ORDER BY id DESC";
}
else
{
    $sql = "SELECT * FROM projetos WHERE cliente LIKE '%$logado%' ORDER BY id DESC";
}
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Interface Cliente Projetos|Sistema de Arquitetura</title>
    <style>
        h1{
            -webkit-text-stroke-width: 2px;
            -webkit-text-stroke-color: rgba(0, 0, 0, 0.6);
        }
        body{
            background: linear-gradient(rgb(123, 212, 255), rgb(255, 255, 255));
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }


        a.botoes:hover{
            background-color: #56c1ff;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema de Projetos de Arquitetura</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
    <div class="d-flex">
        <a href="sistemaCliente.php" class="btn btn-light">Voltar</a>
    </div>
</nav>
<br>
<div class="m-5">
    <table class="table text-white table-bg">
        <thead>
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Arquiteto</th>
            <th scope="col">Custo</th>
            <th scope="col">Materiais</th>
            <th scope="col">Prazo</th>
            <th scope="col">Autorização</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($user_data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$user_data['titulo']."</td>";
            echo "<td>".$user_data['arquiteto']."</td>";
            echo "<td>".$user_data['custo']."</td>";
            echo "<td>".$user_data['materiais']."</td>";
            echo "<td>".$user_data['prazo']."</td>";
            echo "<td>".$user_data['autorizacao']."</td>";
            echo "<td>".$user_data['estado']."</td>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>