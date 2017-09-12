<?php
include "funcoesBD.php";

?>
<?php header("Content-type: text/html; charset=utf-8");
conexaoServidor();
selecionarBancoDados();?>
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

        <div class="container">
            <div class="row">               

                <div class="container col-sm-2">  <!--Primeira col-sm-2 -->
                   
                    
                </div> <!--Fim Primeira col-sm-2 -->
                <form method="post" action="">
                <div class="col-sm-4"> <!--Segunda col-sm-4-->
                    <h2>.</h2>
                    

                        <div class="form-group" align="center">
                            <label>Nome:</label>
                            <input type="nome" class="form-control"  placeholder="Nome do apostador" name="usuario">
                        </div>
                        <br><br>
                        <div class="form-group" align="center">
                            <label>Times:</label>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="1">

                                <option>-- Selecione o 1º colocado --</option>
                                <?php
                                for ($i = 1; $i < 21; $i++) {
                                    $sql = "SELECT nome FROM times WHERE posicao = $i";
                                    $res_cliente = buscaRegistro($sql);
                                    $dados2 = mysqli_fetch_assoc($res_cliente);
                                    $A = "<option>" . $dados2['nome'] . "</option>";
                                    print $A;
                                }
                                ?>
                            </select> 
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="2">
                                <option>-- Selecione o 20º colocado --</option>
                                <?php
                                for ($i = 1; $i < 21; $i++) {
                                    $sql = "SELECT nome FROM times WHERE posicao = $i";
                                    $res_cliente = buscaRegistro($sql);
                                    $dados2 = mysqli_fetch_assoc($res_cliente);
                                    $A = "<option>" . $dados2['nome'] . "</option>";
                                    print $A;
                                }
                                ?>           
                            </select> 
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="3">
                                <option>-- Selecione o 20º colocado --</option>
                                <?php
                                for ($i = 1; $i < 21; $i++) {
                                    $sql = "SELECT nome FROM times WHERE posicao = $i";
                                    $res_cliente = buscaRegistro($sql);
                                    $dados2 = mysqli_fetch_assoc($res_cliente);
                                    $A = "<option>" . $dados2['nome'] . "</option>";
                                    print $A;
                                }
                                ?>           
                            </select> 
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="4">
                                <option>-- Selecione o 20º colocado --</option>
                                <?php
                                for ($i = 1; $i < 21; $i++) {
                                    $sql = "SELECT nome FROM times WHERE posicao = $i";
                                    $res_cliente = buscaRegistro($sql);
                                    $dados2 = mysqli_fetch_assoc($res_cliente);
                                    $A = "<option>" . $dados2['nome'] . "</option>";
                                    print $A;
                                }
                                ?>            
                            </select> 
                        </div>
                        <br><br>

                        <div class="form-group">
                            <select class="form-control" name="17">
                                <option>-- Selecione o 20º colocado --</option>
                                <?php
                                for ($i = 1; $i < 21; $i++) {
                                    $sql = "SELECT nome FROM times WHERE posicao = $i";
                                    $res_cliente = buscaRegistro($sql);
                                    $dados2 = mysqli_fetch_assoc($res_cliente);
                                    $A = "<option>" . $dados2['nome'] . "</option>";
                                    print $A;
                                }
                                ?>            
                            </select> 
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="18">
                                <option>-- Selecione o 20º colocado --</option>
                                <?php
                                for ($i = 1; $i < 21; $i++) {
                                    $sql = "SELECT nome FROM times WHERE posicao = $i";
                                    $res_cliente = buscaRegistro($sql);
                                    $dados2 = mysqli_fetch_assoc($res_cliente);
                                    $A = "<option>" . $dados2['nome'] . "</option>";
                                    print $A;
                                }
                                ?>            
                            </select> 
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="19">
                                <option>-- Selecione o 20º colocado --</option>
                                <?php
                                for ($i = 1; $i < 21; $i++) {
                                    $sql = "SELECT nome FROM times WHERE posicao = $i";
                                    $res_cliente = buscaRegistro($sql);
                                    $dados2 = mysqli_fetch_assoc($res_cliente);
                                    $A = "<option>" . $dados2['nome'] . "</option>";
                                    print $A;
                                }
                                ?>           
                            </select> 
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="20">
                                <option>-- Selecione o 20º colocado --</option>
                                <?php
                                for ($i = 1; $i < 21; $i++) {
                                    $sql = "SELECT nome FROM times WHERE posicao = $i";
                                    $res_cliente = buscaRegistro($sql);
                                    $dados2 = mysqli_fetch_assoc($res_cliente);
                                    $A = "<option>" . $dados2['nome'] . "</option>";
                                    print $A;
                                }
                                ?>           
                            </select> 
                        </div>
                        <input class="btn btn-success" type = "submit" name ="CadastraUsuario" value = "Cadastrar"/>
                    

                    
                    </div><!--Fim da Segunda col-sm-4-->

                    <div class="col-sm-4 topo"><!--Terceira col-sm-4-->
                        <br>   
                        
                            <div class="form-group" align="center">
                                <label>Artilhero:</label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nome do Artilheiro" name="artilheiro">
                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

                       

                    </div> <!--Fim Terceira col-sm-4-->
                    </form>
                <?php
                                include './codigoApostas.php';
                ?>
                    <div class=" col-sm-2">
                        <div class="container col-sm-12" style="top: 20px;">
                            <div class="container col-sm-2"></div>
                            <div class="container col-sm-8">
                            
                        </div>
                        <div class="container col-sm-2"></div>
                    </div>
                </div><!--Quarta col-sm-2-->
            </div>
        </div>



        <!--Fim Quarta col-sm-2-->


        <!-- jQuery (obrigatório para plugins Java do Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>