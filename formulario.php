<?php
    if(isset($_POST['submit']))
    {
        print_r('Nome: ' . $_POST['nome']);
        print_r('<br>');

        include_once('config.php');

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,senha,tipo) 
        VALUES ('$nome','$senha','$tipo')");

        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro|Sistema de Arquitetura</title>
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
    <a class="voltar" href="home.html">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Cadastrar novo Usuário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome de Usuário</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br>
                <label for="tipo">Tipo de Usuário</label>
                <select name="tipo" id="tipo">
                    <option value="cliente">Cliente</option>
                    <option value="arquiteto">Arquiteto</option>
                </select>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>