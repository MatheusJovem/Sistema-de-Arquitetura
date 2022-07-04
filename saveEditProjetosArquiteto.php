<?php
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $custo = $_POST['custo'];
        $materiais = $_POST['materiais'];
        $data = new DateTime( $_POST['prazo']);
        $prazo = $data->format('Y-m-d');
        $estado = $_POST['estado'];
        
        $sqlInsert = "UPDATE projetos 
        SET titulo='$titulo',custo='$custo',materiais='$materiais',prazo='$prazo',estado='$estado' WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: sistemaArquitetoProjetos.php');
?>