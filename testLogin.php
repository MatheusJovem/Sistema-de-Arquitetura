<?php
    session_start();
    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['senha']) && !empty($_POST['tipo']))
    {
        include_once('config.php');
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];

        $sql = "SELECT * FROM usuarios WHERE nome = '$nome' and senha = '$senha' and tipo = '$tipo'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['nome']);
            unset($_SESSION['senha']);
            unset($_SESSION['tipo']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            $_SESSION['tipo'] = $tipo;
            switch ($tipo) {
                case "cliente":
                    header('Location: sistemaCliente.php');
                    break;
                case "arquiteto":
                    header('Location: sistemaArquiteto.php');
                    break;
                case "admin":
                    header('Location: sistemaAdmin.php');
                    break;
            }
        }
    }
    else
    {
        header('Location: login.php');
    }
?>