<?php

include "conexao.php";

$nome = "";
$email = "";
$area_interesse = "";
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $area_interesse = $_POST["area_interesse"];


    if ($nome === "" || $email === "" 
    || $area_interesse === "" ){

    $mensagem = "Preencha todos o campos.";
} else {

    $verificar = $conexao->query("SELECT * FROM competidores WHERE email = '$email'");

    if($verificar->num_rows > 0){
        $mensagem = "Este e-mail já está cadastrado.";

    } else{

    $sql = "INSERT INTO competidores (nome, 
    email, area_interesse) VALUES ('$nome','$email',
    '$area_interesse')";
        $conexao->query($sql);
        $mensagem = "Cadastro realizado com sucesso!";
    }
}

}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon SENAI</title>

    <style>

        body{
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, Helvetica, sans-serif;
            

            background:
                linear-gradient(#00000070, #4903034f),
                url("imagem/fundo.jpg");

            background-size: cover;
            background-position: center;
            }

        .container {
            width: 650px;
            padding: 35px 45px;
            background-color: #49060686;
            border-radius: 14px;
            box-shadow: 0 12px 28px #8a252556;
            backdrop-filter: blur(8px);
            border: 1px solid #64121259;

        }

        .cabecalho{
            display: flex;
            align-items: center;
            gap: 30px;
            margin-bottom: 30px;
        }

        .logo{
            width: 200px;
            height: auto;

        }

        .titulo h1{
            margin:0;
            color: #ffff;
            font-size: 28px;
            border-bottom: 1px solid #a8161fb7;
            padding-bottom: 5px;
        }

        .titulo p{
            margin: 5px 0 0;
            color: #dddddd;
            font-size: 15px;
        }

        input{
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #f1d4d4f1;
            border-radius: 7px;
            background-color: #f3e5e5dc;
            font-size: 15px;
            color: #333;
        }

        input::placeholder{
            color: #6e3333a8;
        }

        label{
            display: block;
            margin-bottom: 5px;
            color: #ffff;
            font-size: 15px;
            font-weight: bold;

        }

        button{
            padding: 11px 20px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            margin-right: 8px;
            transition: 0.2s;
        }

        button:hover{
            transform: translateY(-2px);
        }

        button[type="submit"]{
            background-color: #a50c16e0;
            color: white;
        }

        button[type="submit"]:hover{
            background-color: #c51521;
        }

        button[type="button"] {
            background-color: #555151c5;
            color: white;
        }

        button[type="button"]:hover {
            background-color: #333333;
        }

        form{
            width: 80%;
            margin: auto;
        }

        .mensagem{
            width: 80%;
            margin: 0 auto 20px auto;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 6px;
            background-color: #ffffff20;
            border: 1px solid #ffffff40;
            color: white;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="container">
    <div class="cabecalho">
        <img class="logo" src="imagem/logo-senai.png" alt="SENAI-SP">
        <div class="titulo">
            <h1>Cadastro de Competidor</h1>
            <p>Hackathon</p>
        </div>
    </div>

        <?php if ($mensagem !== "") { ?>
            <p class="mensagem"><?php echo $mensagem; ?></p>
        <?php } ?>


    <form method = "POST">
        <label>Nome:</label>
            <input type="text" name ="nome" placeholder="nome" value="<?php echo $nome; ?>"><br>
        <label>email:</label>
            <input type="email" name="email" placeholder="email" value="<?php echo $email; ?>"><br>
        <label>Área de interesse:</label>
            <input type="text" name="area_interesse"  placeholder="sua área de interesse" value="<?php echo $area_interesse; ?>"><br>

        <button type="submit">Cadastrar</button>

        <button type="button" onclick="window.location.href='consulta.php';">Consultar</button>

        <button class="limpar" type="button" onclick="window.location.href='index.php';">Limpar</button>
    </form>
    </div>
</body>
</html>
