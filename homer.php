
<?php
session_start();
include "./testandoValor.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="estilo.css" rel="stylesheet">

        <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
        <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="">
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
                            <a class="" href="Index.php">Pagina Inicial</a>
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
                <div class='col-sm-6'> 
                    <br><br>
                    <h3 align="center">Classificação Brasileirão 2017:</h3>
                    <table class="table table-hover ">
                        <tr class="corLinhaTituloTabela info">
                            <th>#</th>
                            <th>Classificação</th>
                            <th>P</th>
                            <th>J</th>
                            <th>V</th>
                            <th>E</th>
                            <th>D</th>
                        </tr>

                        <?php
                        conexaoServidor();
                        selecionarBancoDados();
                        cadastrarTime();

                        for ($i = 1; $i < 21; $i++) {
                            $sql = "SELECT * FROM times WHERE posicao = $i";
                            $res_cliente = buscaRegistro($sql);
                            $dados2 = mysql_fetch_assoc($res_cliente);
                                                       
                                $classe = 0;
                                if ($i < 5) {
                                    $classe = 'corLibertadores fonteNumerosTabela';
                                } else if ($i > 4 & $i < 7) {
                                    $classe = 'corPreLibertadores fonteNumerosTabela';
                                } else if ($i > 6 & $i < 13) {
                                    $classe = 'corSulAmericana fonteNumerosTabela';
                                } else if ($i > 12 & $i < 17) {
                                    $classe = 'fonteNumerosTabela';
                                } else if ($i > 16 ) {
                                    $classe = 'corReibaxamento fonteNumerosTabela';
                                }
                            print"<tr>";    
                                print "<td class='$classe'>" . $dados2 ['posicao'] . "</td>";
                                
                                print "<td>" . $dados2['nome'] . "</td>";                            
                                print "<td>" . $dados2['pontos'] . "</td>";                          
                                print "<td>" . $dados2['jogos'] . "</td>";
                                print "<td>" . $dados2['vitorias'] . "</td>";
                                print "<td>" . $dados2['empates'] . "</td>";
                                print "<td>" . $dados2['derrotas'] . "</td>";
                            print"</tr>";
                        }                                                                                     
                        
                        ?>
                        <tr class="">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>
                    <table class="table table-bordered">
                        <tr class="corLinhaTituloTabela">
                            <td><span class="glyphicon glyphicon-stop corLibertadores" aria-hidden="true"></span> libertadores</td>
                            <td><span class="glyphicon glyphicon-stop corPreLibertadores" aria-hidden="true"></span> pré-libertadores</td>                            
                        </tr>
                        <tr class="corLinhaTituloTabela">
                            <td><span class="glyphicon glyphicon-stop corSulAmericana" aria-hidden="true"></span>  copa sul-americana</td>
                            <td><span class="glyphicon glyphicon-stop corReibaxamento" aria-hidden="true"></span> rebaixados</td>  
                        </tr>
                    </table>             
                </div>   
                                        
                <br><br><br><br>
                <div class='col-sm-6 fundo'>
                    <h3 align="center">Tabela com a classificação dos apostadores:</h3>
                    <div class="">
                        <br>
                        <div class="textoPreto">
                            <!--<img class="img-responsive imgCampo" src='img/verde.png'>-->                            
                            <table class="table table-striped alinharTabela table-hover" style="background: #ebebeb;
                                   color: black;
                                   font-size: 20px;
                                   font-family: cursive;
                                   font-weight: bold">
                                <tr class="fundoBraco">
                                    <th>#</th>
                                    <th>Classificação</th>
                                    <th>Pontos</th>
                                </tr>
                                <?php
                                conexaoServidor();
                                selecionarBancoDados();
                                function passar(){
                                    header('Location: testeUsuario.php'); 
                                }
                                
                                $selecionarApostadores = "SELECT COUNT(*) FROM apostadores";
                                $resOrdemApostadores = buscaRegistro($selecionarApostadores);
                                $quantidadeApostadores = mysql_result($resOrdemApostadores, 0);
                                
                                for ($i = 1; $i <= $quantidadeApostadores; $i++) {
                                    
                                    $sql = "SELECT * FROM apostadores WHERE posicao = $i";
                                    $res_cliente = buscaRegistro($sql);
                                    $dados2 = mysql_fetch_assoc($res_cliente);
                                    print"<tr class='fundoBraco'>";
                                    print "<a href=''>";
                                    print "<td style='color: DimGray;'>" . $i . "</td>";                                    
                                    print "<td><a href='usuario.php?id=".$dados2['id']."'>" . $dados2 ['nome'] . "</a></td>";
                                    print "<td style='color: 
OrangeRed;'>" . $dados2['pontos'] . "</td>";
                                    print "</a>";
                                    print"</tr>";
                                    
                                    
                                }
                                ?>                                                                
                            </table> 
                        </div>
                    </div>
                </div>
            </div>    
        </div>    
        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>