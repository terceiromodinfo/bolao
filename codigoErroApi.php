<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="" method="POST">
            <input type="submit" name="ApagarUsuario" value="Apagar"/>
            <input type="submit" name="ApagarTimes" value="Apagar"/>
            <input type="submit" name="api" value="api"/>
            <input type="submit" name="manual" value="manual"/>
        </form>
    </body>
</html>
<?php
include "./funcoesBD.php";

conexaoServidor();
selecionarBancoDados();
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($post['ApagarUsuario'])){
    $sqlQuantidadeDeApostador = "SELECT COUNT(*) FROM usuario";
    $resQuantidadeDeApostador = buscaRegistro($sqlQuantidadeDeApostador);

    $valorDeUsuarios = mysqli_result($resQuantidadeDeApostador, 0);
    
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
    

    for ($i=1;$i <= $valorDeUsuarios;$i++){
        
        $sql = "DELETE FROM usuario WHERE usuario.id = $idUsuario[$i]";
        excluir($sql);
  
    }
}
if (isset($post['ApagarTimes'])){
    for ($i=1;$i <= 20;$i++){
        
        $sql = "DELETE FROM times WHERE times.posicao = $i";
        excluir($sql);
  
    }
}
if (isset($post['manual'])){
    $consulta = mysqli_query("select api from admin");
   
            
            $sql = "UPDATE admin SET api = '1'";
            atualizarRegistro($sql);
        
        
    
    
}
if (isset($post['api'])){
    $consulta = mysqli_query("select api from admin");
    
        
            $sql = "UPDATE admin SET api = '2'";
            atualizarRegistro($sql);
    
}
$sqlApiOuManual = "SELECT api FROM admin";
$resApiOuManual = buscaRegistro($sqlApiOuManual);
$ApiOuManual = mysqli_fetch_assoc($resApiOuManual);
$escolha = $ApiOuManual['api'];

if ($escolha == 2) {
    print "API";
}else{
    print "Manual";
}
    


?>
