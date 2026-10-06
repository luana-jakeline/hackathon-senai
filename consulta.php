<?php

    include "conexao.php";
    $r = $conexao->query("SELECT * FROM competidores");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competidores</title>

    <style>

        body{
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, Helvetica, sans-serif;

            background:
                linear-gradient(#00000070, #0000007a),
                url("imagem/fundo.jpg");

            background-size: cover;
            background-position: center;
        }

        .container{
            width: 850px;
            padding: 35px 45px;
            background-color: #49060686;
            border-radius: 14px;
            box-shadow: 0 12px 28px #8a252556;
            backdrop-filter: blur(8px);
            border: 1px solid #64121259;
        }

        h1{
            margin-top: 0;
            margin-bottom: 30px;
            color: white;
            font-size: 28px;
            border-bottom: 1px solid #97111a81;
            padding-bottom: 10px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            color: white;
            background-color: #920c0c60;
            border-radius: 5px;
            overflow: hidden;
        }

        th{
            padding: 12px;
            background-color: #be0b17e0;
            text-align: left;
        }

        td{
            padding: 12px;
        }

        tr:hover{
            background-color: #ffffff15;
        }

        button{
            margin-top: 25px;
            padding: 11px 20px;
            border: none;
            border-radius: 6px;
            background-color: #555151c5;
            color: white;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover{
            background-color: #333333;
            transform: translateY(-2px);
        }

    </style>
</head>
<body>
    
<div class="container">
    <h1>Competidores Cadastrados</h1>

    <table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Área de interesse</th>
    </tr>

    <?php while ($linha = $r->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $linha["id"]; ?></td>
            <td><?php echo $linha["nome"]; ?></td>
            <td><?php echo $linha["email"]; ?></td>
            <td><?php echo $linha["area_interesse"]; ?></td>
        </tr>
    <?php } ?>

    </table>
    <button type="button" onclick="window.location.href='index.php';">Voltar para cadastro</button>
</div>
</body>
</html>