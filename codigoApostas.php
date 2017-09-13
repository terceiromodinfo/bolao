<?php

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    conexaoServidor();
    
    
    $nome = $post['usuario'];
    $um = $post['1'];
    $dois = $post['2'];
    $tres = $post['3'];
    $quatro = $post['4'];
    $desessete = $post['17'];
    $desoito = $post['18'];
    $desenove = $post['19'];
    $vinte = $post['20'];
    $artilheiro = $post['artilheiro'];



if (isset($post['CadastraUsuario'])) {
    
    $sql = "INSERT INTO usuario (usuario, primeiro, segundo, terceiro, quarto, deSetimo, deOitavo, deNono, vigesimo, artilheiro) VALUES ('$nome','$um','$dois','$tres','$quatro','$desessete','$desoito','$desenove','$vinte','$artilheiro')";
    if (inserir($sql)) {
        print "<script>alert(' enviado com Sucesso!');</script>";
    } else {
        print "<script>alert('Email enviado com Sucesso!');</script>";
    } 
}