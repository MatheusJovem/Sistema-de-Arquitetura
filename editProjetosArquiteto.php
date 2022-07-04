<?php
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM projetos WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $titulo = $user_data['titulo'];
                $custo = $user_data['custo'];
                $materiais = $user_data['materiais'];
                $prazo = $user_data['prazo'];
                $estado = $user_data['estado'];
            }
        }
        else
        {
            header('Location: sistemaArquitetoProjetos.php');
        }
    }
    else
    {
        header('Location: sistemaArquitetoProjetos.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Projeto Aqr|S.A</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(rgb(255, 255, 255), rgb(123, 212, 255));
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
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
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
            color: dodgerblue;
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
    <a class="voltar" href="sistemaArquitetoProjetos.php">Voltar</a>
    <div class="box">
        <form action="saveEditProjetosArquiteto.php" method="POST">
            <fieldset>
                <legend><b>Editar Projeto</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="titulo" id="titulo" class="inputUser" value=<?php echo $titulo;?> required>
                    <label for="titulo" class="labelInput">Título do Projeto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" min="1" step="0.1" name="custo" id="custo" class="inputUser" value=<?php echo $custo;?> required>
                    <label for="custo" class="labelInput">Custo Total</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="materiais" id="materiais" class="inputUser" value=<?php echo $materiais;?> required>
                    <label for="materiais" class="labelInput">Materiais Necessários</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="date" name="prazo" id="prazo" class="inputUser" value=<?php echo $prazo;?> required>
                    <label for="prazo" class="labelInput">Prazo de Conclusão</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" value=<?php echo $estado;?> >
                    <label for="estado" class="labelInput">Estado do Projeto</label>
                </div>
                <br><br>
				<input type="hidden" name="id" value=<?php echo $id;?>>
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>