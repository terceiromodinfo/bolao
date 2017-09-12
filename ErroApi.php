<?php
include "./funcoesBD.php";

conexaoServidor();


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


    
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="iso-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
        <title>Bootstrap 101 Template</title>

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
                    <a href="#pageTop" class="navbar-brand">Logomarca</a>
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
                <div class="col-sm-6">
                <h2 aling="center">Inserir as informações manualmente</h2>
                </div>
                <div class="col-sm-6">
                    <h2 style="">Modo de preenchimento da tabela do brasileirão</h2>
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
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="1º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="2º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="3º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="4º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="5º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="6º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="7º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="8º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="9º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="10º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="11º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="12º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="13º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="14º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="15º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="16º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="17º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="18º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="19º colocado">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="20º colocado">

                                </div>

                            </form>
                            <button type="button" class="btn btn-success">Cadastrar</button>

                            <button type="button" class="btn btn-success">Atualizar</button>
                        </div>

                        <div class="container col-sm-6">
                            <div class="form-group" align="center">
                                <label>Artilheros:</label>
                            </div>


                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Nome do Artilheiro">                         
                                <br>
                                <input type="email" class="form-control" placeholder="Nome do Artilheiro">                         
                                <br>
                                <input type="email" class="form-control" placeholder="Nome do Artilheiro">                         
                                <br> 
                                <input type="email" class="form-control" placeholder="Nome do Artilheiro">                         
                                <br>
                                <input type="email" class="form-control" placeholder="Nome do Artilheiro">                         
                                <br>
                                <button type="button" class="btn btn-success">Cadastrar</button>
                                <button type="button" class="btn btn-success">Atualizar</button>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="bordad">
                <div class="container col-sm-6 thumbnail" >
                    
                    <br>
                    <form action="" method="POST">
                    <input type="submit" class="btn btn-success" name="api" value="API"/>
                    <input type="submit" class="btn btn-success" name="manual" value="MANUAL"/>
                    </form>
                    <br>
                    <br>
                    <div class="form-group">
                        <h4>Preenchimento do banco de dados     <label style="color: #0000FF;"><?php 
                                    if ($escolha == 2){
                                        print "API";
                                    }  else {
                                        print "Manual";
                                    }
                                ?></label></h4>
                    </div>

                    <div class="borda"><!--  --><!--  --><!--  -->
                        <br>
                        <div style="background: #31b0d5 ; padding: 1px;">
                            <h2 style=""> Gerenciar banco de dados</h2>
                        </div>

                        <br>
                        <form action="" method="POST">
                        <h2>Apagar todos os apostadores  </h2>
                        <input type="submit" name="ApagarUsuario" value="Apagar"/>

                        <h2>Apagar todos os dados dos times</h2>
                        <input type="submit" name="ApagarTimes" value="Apagar"/>
                        </form>
                        <br><br><br><br>
                    </div>
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
