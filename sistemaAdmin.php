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
        $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or nome LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
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
    <title>Interface Admin|Sistema de Arquitetura</title>
    <style>
        h1{
            padding-top: 150px;
            font-size: 80px;
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
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.3);
            padding: 30px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        a.botoes{
            text-decoration: none;
            color: white;
            border: 3px solid #56c1ff;
            border-radius: 10px;
            padding: 10px;
        }
        a.botoes:hover{
            background-color: #56c1ff;
        }
        .space {
            width: 7px;
            height: auto;
            display: inline-block;
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
    </nav>
    <br>
    <?php
        echo "<h1>Bem vindo <u>$logado</u></h1>";
    ?>
    <br>
    <div class="box">
        <a class="botoes" href="sistemaAdminClientes.php">Gerenciar Clientes</a>
        <div class="space">
        </div>
        <a class="botoes" href="sistemaAdminProjetos.php">Gerenciar Projetos</a>
    </div>
</html>