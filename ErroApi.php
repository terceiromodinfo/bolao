<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
?>
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
        if (excluir($sql)) {
            $Resut = "1";
        } else {
            $Resut = "0";
        }
    }
    if ($Resut == 1) {
        print "<script>alert(' excluido com Sucesso!');</script>";
    } else {
        print "<script>alert('Falha em excluir!');</script>";
    }
}



if (isset($post['ApagarTimes'])) {
    for ($i = 1; $i <= 20; $i++) {

        $sql = "DELETE FROM times WHERE times.posicao = $i";
        if (excluir($sql)) {
            $Resut2 = "1";
        } else {
            $Resut2 = "0";
        }
    }
    if ($Resut2 == 1) {
        print "<script>alert(' excluido com Sucesso!');</script>";
    } else {
        print "<script>alert('Falha em excluir!');</script>";
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
/* 
 * modificação feita para o cadastro
 * $nomeDoTimes[$posicao]; estava recebendo $i ao inves de $posicao

 *  */
    for ($i = 0; $i < 20; $i++) {
        $posicao = $i + 1;
        $Nome = $nomeDoTimes[$posicao];
        $sql = "INSERT INTO times (posicao,nome) VALUES ('$posicao','$Nome')";
        if (inserir($sql)) {
            $Resut3 = "1";
        } else {
            $Resut3 = "0";
        }
    }
    if ($Resut3 == 1) {
        print "<script>alert(' enviado com Sucesso!');</script>";
    } else {
        print "<script>alert('Falha em enviar!');</script>";
    }
}


if (isset($post['cadastraArtilheiro'])) {

    $nomeDoArtilheiro = $post["arti"];

    $sql = "INSERT INTO artilheiro (nome) VALUES ('$nomeDoArtilheiro')";
    if (inserir($sql)) {
        print "<script>alert(' enviado com Sucesso!');</script>";
    } else {
        print "<script>alert('Falha no envio!');</script>";
    }
}


if (isset($post['apagarArtilheiro'])) {

    $sqlIdArtilheiro = "SELECT id FROM artilheiro";
    $resIdArtilheiro = buscaRegistro($sqlIdArtilheiro);

    $contador2 = 1;
    while ($registroIdArtilheiro = mysqli_fetch_assoc($resIdArtilheiro)) {
        $IdArtilheiro[$contador2] = $registroIdArtilheiro['id'];
        $contador2++;
    }
    $quantArtilheiros = quantDeLinhas("artilheiro");
    for ($a = 1; $a <= $quantArtilheiros; $a++) {
        print $IdArtilheiro[$a];
        $sql = "DELETE FROM artilheiro WHERE artilheiro.id = $IdArtilheiro[$a]";
        if (excluir($sql)) {
            $Resut4 = "1";
        } else {
            $Resut4 = "0";
        }
    }
    if ($Resut4 == 1) {
        print "<script>alert(' excluido com Sucesso!');</script>";
    } else {
        print "<script>alert('Falha em excluir!');</script>";
    }
}
if (isset($post['ApagarPeloNome'])) {

    $apagarPeloNome = $post["apagarPeloNome"];
    print $apagarPeloNome;

    $sql = "DELETE FROM usuario WHERE usuario.usuario = '$apagarPeloNome'";
    if (excluir($sql)) {
        print "<script>alert(' excluido com Sucesso!');</script>";
    } else {
        print "<script>alert('Falha em excluir !');</script>";
    }
}



$sqlApiOuManual = "SELECT api FROM admin";
$resApiOuManual = buscaRegistro($sqlApiOuManual);
$ApiOuManual = mysqli_fetch_assoc($resApiOuManual);
$escolha = $ApiOuManual['api'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="iso-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
        <title>Bolão</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="estilo.css" rel="stylesheet">


    </head>
    <body class="corpo">
        <nav class="navbar navbar-default navbar-fixed-top corFundoAzul">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-navegacao">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span>  
                    </button>
                    <a href="#pageTop" class="navbar-brand" style="font-weight: bold">Bolão</a>
                </div>

                <div class="collapse navbar-collapse menu-navegacao" id="menu-navegacao">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#page-top"></a></li>
                        <li>
                            <a class="" href="homer.php">Pagina Inicial</a>
                        </li>
                        <li>
                            <a class="" href="Apostas.php">Apostas</a>
                        </li>
                        <li>
                            <a class="" href="ErroApi.php">Configurações</a>
                        </li>
                        <li>
                            <a class="" href="Saindo.php">Sair</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="borda"> 
            <div class=" col-sm-12" style="background: window;">

                <br><br>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h2 aling="center">Configurar as informações manualmente</h2>
                </div>
                   
            </div>
            <div class="col-sm-6">


                <div align="center">


                    <div class="form-group" align="center">

                        <div class="container col-sm-6">
                            <form method="post" action="">


                                <div class="form-group" align="center">
                                    <label>Times:</label>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="1"  placeholder="1º colocado"><br>
                                    <input type="text" class="form-control" name="2" placeholder="2º colocado"><br>
                                    <input type="text" class="form-control" name="3" placeholder="3º colocado"><br>
                                    <input type="text" class="form-control" name="4" placeholder="4º colocado"><br>
                                    <input type="text" class="form-control" name="5" placeholder="5º colocado"><br>
                                    <input type="text" class="form-control" name="6" placeholder="6º colocado"><br>
                                    <input type="text" class="form-control" name="7" placeholder="7º colocado"><br>
                                    <input type="text" class="form-control" name="8" placeholder="8º colocado"><br>
                                    <input type="text" class="form-control" name="9" placeholder="9º colocado"><br>
                                    <input type="text" class="form-control" name="10" placeholder="10º colocado"><br>
                                    <input type="text" class="form-control" name="11" placeholder="11º colocado"><br>
                                    <input type="text" class="form-control" name="12" placeholder="12º colocado"><br>
                                    <input type="text" class="form-control" name="13" placeholder="13º colocado"><br>
                                    <input type="text" class="form-control" name="14" placeholder="14º colocado"><br>
                                    <input type="text" class="form-control" name="15" placeholder="15º colocado"><br>
                                    <input type="text" class="form-control" name="16" placeholder="16º colocado"><br>
                                    <input type="text" class="form-control" name="17" placeholder="17º colocado"><br>
                                    <input type="text" class="form-control" name="18" placeholder="18º colocado"><br>
                                    <input type="text" class="form-control" name="19" placeholder="19º colocado"><br>
                                    <input type="text" class="form-control" name="20" placeholder="20º colocado">

                                </div>
                                <input type="submit" class="btn btn-success" name="cadastraTimes" value="Guardar"/>

                            </form>

                        </div>

                        <div class="container col-sm-6">
                            <div class="form-group" align="center">
                                <label>Artilheros:</label>
                            </div>

                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="arti" placeholder="Nome do Artilheiro">                         
                                    <br>
                                    <input type="submit" class="btn btn-success" name="cadastraArtilheiro" value="Guardar"/>
                                    <input type="submit" class="btn btn-success" name="apagarArtilheiro" value="Apagar Artilheiros"/>
                                    <br><br>
                                    <label style="color: red;">Se outro jogador passar a ser um novo artilheiro será preciso "APAGAR" para inserir um novo</label>
                                    <label style="color: red;">Mas se apenas houver um jogador que atingiu a mesma quantidade de gol do atual artilheiro apenas "GUARDE" um segundo ou mais</label>
                                    <br>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            
                <div class="bordad container col-sm-6 thumbnail" >
                    
                    
                    <div class="col-lg-12">
                        <br/> 
                        <div class="col-lg-7">
                            <h4>Escolha uma forma para o cadastro no banco</h4>
                        </div>
                        <div class="col-lg-3">
                            <form action="" method="POST">
                                <input type="submit" class="btn btn-success" name="api" value="API"/>
                                <br/> 
                                <input type="submit" class="btn btn-success" name="manual" value="MANUAL"/>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <h4 style="color: #0000FF;">
                                <?php
                                if ($escolha == 2) {
                                    print "API";
                                } else {
                                    print "Manual";
                                }
                                ?>
                            </h4>
                        </div>
                        <br><br>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="col-lg-8">
                            <h4>Apagar todos os apostadores  </h4>
                        </div>
                        <div class="col-lg-4">
                            <form action="" method="POST">              
                                <input class="btn btn-danger" type="submit" name="ApagarUsuario" value="Apagar"/>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="col-lg-8"></div>
                        <div class="col-lg-4"></div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="col-lg-8">
                            <h4>Apagar todos os dados dos times</h4>
                        </div>
                        <div class="col-lg-4">
                        <form action="" method="POST"> 
                            <input class="btn btn-danger" type="submit" name="ApagarTimes" value="Apagar"/>
                        </form>
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="col-lg-5">
                            <h4>Apagar apostador expecifico</h4>
                        </div>
                        <form action="" method="POST"> 
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select class="form-control" name="apagarPeloNome">
                                    <option>-- Faça sua escolha --</option>
                                    
                                    <?php
                                    $sqlIdArtilheiro = "SELECT id FROM usuario";
                                    $resIdArtilheiro = buscaRegistro($sqlIdArtilheiro);

                                    $contador2 = 1;
                                    while ($registroIdArtilheiro = mysqli_fetch_assoc($resIdArtilheiro)) {
                                        $IdArtilheiro[$contador2] = $registroIdArtilheiro['id'];
                                        $contador2++;
                                    }
                                    
                                    
                                   $vot = quantDeLinhas("usuario");
                                    for ($i = 1; $i <= $vot; $i++) {
                                        $id = $IdArtilheiro[$i];
                                        $sql = "SELECT usuario FROM usuario WHERE id = $id";
                                        $res_cliente = buscaRegistro($sql);
                                        $dados2 = mysqli_fetch_assoc($res_cliente);
                                        $A = "<option>" . $dados2['usuario'] . "</option>";
                                        print $A;
                                    }
                                    
                                    
                                    ?>           
                                 </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <input class="btn btn-danger" type="submit" name="ApagarPeloNome" value="Apagar"/>                            
                        </div>
                        </form>
                    </div>
                    
                </div>
         
        </div>
        <!-- Fim da Segunda col -->



        <!-- jQuery (obrigatório para plugins Java do Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
<?php
}  else {
    header("location:homer.php");
}
?>
