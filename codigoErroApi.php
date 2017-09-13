<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="" method="POST">
            <input type="submit" name="apagarArtilheiro" value="Apagar"/>
            
        </form>
    </body>
</html>
<?php
include "./funcoesBD.php";

conexaoServidor();


$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($post['ApagarUsuario'])) {

    $valorDeUsuarios = quantDeLinhas("usuario");

    /*
     * pegando os id dos apostadores 
     */

    $sqlIdApostador = "SELECT id FROM usuario";
    $resIdApostador = buscaRegistro($sqlIdApostador);

    $contador = 1;
    while ($registro = mysqli_fetch_assoc($resIdApostador)) {
        $idUsuario[$contador] = $registro['id'];
        $contador++;
    }


    for ($i = 1; $i <= $valorDeUsuarios; $i++) {

        $sql = "DELETE FROM usuario WHERE usuario.id = $idUsuario[$i]";
        excluir($sql);
    }
}
if (isset($post['ApagarTimes'])) {
    for ($i = 1; $i <= 20; $i++) {

        $sql = "DELETE FROM times WHERE times.posicao = $i";
        excluir($sql);
    }
}
if (isset($post['manual'])) {
    $consulta = mysqli_query("select api from admin");


    $sql = "UPDATE admin SET api = '1'";
    atualizarRegistro($sql);
}
if (isset($post['api'])) {
    $consulta = mysqli_query("select api from admin");

    $sql = "UPDATE admin SET api = '2'";
    atualizarRegistro($sql);
}

if (isset($post['cadastraTimes'])) {
    
    for ($a = 1; $a <= 20; $a++) {
        $nomeDoTimes[$a] = $post["$a"];
    }


    for ($i = 0; $i < 20; $i++) {
        $posicao = $i + 1;
        $sql = "DELETE FROM times WHERE times.posicao = $posicao;";
        excluir($sql);
    }

    for ($i = 0; $i < 20; $i++) {
        $posicao = $i + 1;
        $Nome = $nomeDoTimes[$i];
        $sql = "INSERT INTO times (posicao,nome) VALUES ('$posicao','$Nome')";
        inserir($sql);
    }
}
if (isset($post['cadastraArtilheiro'])) {
       
        $nomeDoArtilheiro = $post["arti"];
        
        $sql = "INSERT INTO artilheiro (nome) VALUES ('$nomeDoArtilheiro')";
        inserir($sql);
       
}
if (isset($post['apagarArtilheiro'])) {
    
    $sqlIdArtilheiro = "SELECT id FROM artilheiro";
    $resIdArtilheiro = buscaRegistro($sqlIdArtilheiro);

    $contador2 = 1;
    while ($registroIdArtilheiro = mysqli_fetch_assoc($resIdArtilheiro)) {
        $IdArtilheiro[$contador2] = $registroIdArtilheiro['id'];
        $contador2++;
    }
    $n = quantDeLinhas("artilheiro");
    for ($a = 1; $a <= $n; $a++) {
     print $IdArtilheiro[$a];
        $sql = "DELETE FROM artilheiro WHERE artilheiro.id = $IdArtilheiro[$a]";
        excluir($sql);
       } 
}