<?php
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];
        
        $sqlInsert = "UPDATE usuarios 
        SET nome='$nome',senha='$senha',tipo='$tipo' WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: sistemaAdmin.php');

?>