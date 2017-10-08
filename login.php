<html>
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

    <body style="background: #31b0d5" border-width= "thick">

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <font>

        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-3">
                    <div class="form-login">
                        <form method ="POST" action =" " align="center" bgcolor= "blue">
                            <h4>Login do Administrador</h4>
                            <input type="text" class="form-control input-sm chat-input" placeholder="username"  name="login" required/>
                            <br>
                            <input type="password" class="form-control input-sm chat-input" placeholder="password" name="senha"/>
                            <br>
                            <input type = "submit" class="btn btn-primary btn-md" name = "logar" value = "fazer login"/>


                        </form>
                        <br>
                        <br>
                        <div align="center">
                            <a href="parciais.php" class="btn btn-lg btn-success btn-md">Ver Parciais <i class="fa fa-sign-in"></i></a>
                       </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
<?php
include './funcoesBD.php';
conexaoServidor();

$txtTitulo = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($txtTitulo['logar'])) {
    $login = $txtTitulo['login'];
    $senha = $txtTitulo['senha'];

    $sql = "SELECT * FROM admin WHERE usernome='$login' AND usersenha='$senha'";
    $linhas = 0;
    $res_administrador = buscaRegistro($sql);


    $linhas = mysqli_num_rows($res_administrador);


    if ($linhas > 0) {

        session_start();

        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header("location:index.php");
    } else {
        print "<label>
			<p><strong>senha ou login incorretos!</p>
			<p><strong> Clica <a href = login.php> Aqui</a> para tentar novamente </strong></p>
			</label>";
    }
    unset($_POST['logar']);
}

