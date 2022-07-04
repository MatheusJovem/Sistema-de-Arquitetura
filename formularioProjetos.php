<?php
    if(isset($_POST['submit']))
    {
        print_r('Título: ' . $_POST['titulo']);
        print_r('<br>');

        include_once('config.php');

        $titulo = $_POST['titulo'];
        $cliente = $_POST['cliente'];
        $arquiteto = $_POST['arquiteto'];
        $autorizacao = $_POST['autorizacao'];
        $estado = $_POST['estado'];

        $result = mysqli_query($conexao, "INSERT INTO projetos(titulo,cliente,arquiteto,autorizacao,estado) 
        VALUES ('$titulo','$cliente','$arquiteto','$autorizacao','$estado')");

        header('Location: sistemaAdminProjetos.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reg Projeto|Sistema de Arquitetura</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(rgb(123, 212, 255), rgb(255, 255, 255));
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid #00a6ff;
        }
        legend{
            border: 1px solid #00a6ff;
            padding: 10px;
            text-align: center;
            background-color: #00a6ff;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: #00a6ff;
        }
        #submit{
            background-image: linear-gradient(to right, rgb(96, 172, 255), rgb(96, 172, 255));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right, rgb(0, 166, 255), rgb(0, 151, 255));
        }
        .voltar{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <a class="voltar" href="sistemaAdminProjetos.php">Voltar</a>
    <div class="box">
        <form action="formularioProjetos.php" method="POST">
            <fieldset>
                <legend><b>Registrar novo Projeto</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="titulo" id="titulo" class="inputUser" required>
                    <label for="titulo" class="labelInput">Título do Projeto</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="cliente" id="cliente" class="inputUser" required>
                    <label for="cliente" class="labelInput">Cliente Associado</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="arquiteto" id="arquiteto" class="inputUser" required>
                    <label for="arquiteto" class="labelInput">Arquiteto Associado</label>
                </div>
                <br>
                <label for="autorizacao">Autorização de Início</label>
                <select name="autorizacao" id="autorizacao">
                    <option value="0">Não Autorizado</option>
                    <option value="1">Autorizado</option>
                </select>
                <br><br>
                <label for="estado">Estado do Projeto</label>
                <select name="estado" id="estado">
                    <option value="nIniciado">Não Iniciado</option>
                    <option value="andamento">Em Andamento</option>
                    <option value="pausado">Pausado</option>
                    <option value="finalizado">Finalizado</option>
                </select>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>