<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";

$conexao = new mysqli($servidor, $usuario,
$senha, "hackathon");
$conexao->set_charset("utf8");
?>