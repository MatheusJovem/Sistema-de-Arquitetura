<?php
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $cliente = $_POST['cliente'];
        $arquiteto = $_POST['arquiteto'];
        $estado = $_POST['estado'];
        
        $sqlInsert = "UPDATE projetos 
        SET titulo='$titulo',cliente='$cliente',arquiteto='$arquiteto',estado='$estado' WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: sistemaAdminProjetos.php');
?>