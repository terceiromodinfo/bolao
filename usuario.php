<?php
    include './testeUsuario.php';
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
                            <a class="" href="Saindo.php">Sair</a>
                        </li>

                        
                    </ul>
                </div>

            </div>
        </nav>
        <br><br>
        <div class="container col-sm-12" style="background: window;">
            <div class="container col-sm-2"></div>
            <div class="container col-sm-5">
                                  
                    <h1 style="
                        font-family: monospace;
                        font-weight: bold;
                        color: darkorange;
                        "><?php print"  ";print $registroDoIdUser['usuario'];?> </h1>
                    
               
            </div>
            <div class="container col-sm-5">
                <h1 style="
                        font-family: monospace;
                        font-weight: bold;
                        color: #0000FF;
                        ">
                        <?php
                          print "  ".$registroDoIdUser2['pontos']." Pontos "; 
                        ?>
                    </h1>
            </div>
         <br>
        </div>
        <!--Primeira col-sm-2 -->
        <div class="container col-sm-2">
            <h2></h2>
         
            <!--Fim Primeira col-sm-2 -->


            <!--Segunda col-sm-4-->
        </div>
        <div class=" col-sm-4">
            <h2></h2>
            

                
                <div class="form-group" align="center">
                    <h4 style="color: #228B22; font-weight: bold;">Times:</h4>
                </div>
                <table class="table table-striped" style="background: #e6e6e6">
                    
                    <tr>
                        <td><h4 class="td tabs" ><?php print"1º  ";print $registroDoIdUser['primeiro']?></h4></td>
                    </tr>
                    <tr>
                        <td><h4><?php print"2º  ";print $registroDoIdUser['segundo']?></h4></td>
                    </tr>
                    <tr>
                        <td><h4><?php print"3º  ";print $registroDoIdUser['terceiro']?></h4></td>
                    </tr>
                    <tr>
                        <td><h4><?php print"4º  ";print $registroDoIdUser['quarto']?></h4></td>
                    </tr>
                    
                    
                    
                </table>
            <br><br><br>
            
            <table class="table table-striped" style="background: #e6e6e6">
                    
                    <tr>
                        <td><h4><?php print"17º  ";print $registroDoIdUser['deSetimo']?></h4></td>
                    </tr>
                    <tr>
                        <td><h4><?php print"18º  ";print $registroDoIdUser['deOitavo']?></h4></td>
                    </tr>
                    <tr>
                        <td><h4><?php print"19º  ";print $registroDoIdUser['deNono']?></h4></td>
                    </tr>
                    <tr>
                        <td><h4><?php print"20º  ";print $registroDoIdUser['vigesimo']?></h4></td>
                    </tr>
                    
                    
                    
                </table>
                
        
        </div>

        <!--Fim da Segunda col-sm-4-->


        <!--Terceira col-sm-4-->

        <div class="col-sm-4 ">

            <div class="form-group" align="center" style="padding-top: 10px;">
                <h4 style="color: yellow; font-weight: bold;">Artilhero:</h4>
                </div>

            <table class="table table-striped" style="background: #e6e6e6">
                <tr>
                    <td>
                        <h4><?php print"  ";print $registroDoIdUser['artilheiro']?></h4>
                    </td>
                </tr>
            </table>
     
        </div>
        <!--Fim Terceira col-sm-4-->


        <!--Quarta col-sm-2-->
        <div class="container col-sm-2">
            
        </div>
            
            
            
            <!--Fim Quarta col-sm-2-->


            <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
            <script src="js/bootstrap.min.js"></script>
    </body>
</html>