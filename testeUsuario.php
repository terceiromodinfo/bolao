<?php
include './funcoesBD.php';
conexaoServidor();
selecionarBancoDados();

$idUser = $_GET['id'];

$sqlPesquisaIdUser = "SELECT * FROM usuario WHERE id = $idUser";
$resPesquisaIdUser = buscaRegistro($sqlPesquisaIdUser);
$registroDoIdUser = mysqli_fetch_assoc($resPesquisaIdUser);

$sqlPesquisaIdUser2 = "SELECT pontos FROM apostadores WHERE id = $idUser";
$resPesquisaIdUser2 = buscaRegistro($sqlPesquisaIdUser2);
$registroDoIdUser2 = mysqli_fetch_assoc($resPesquisaIdUser2);


