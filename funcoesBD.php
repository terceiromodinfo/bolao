<?php
$conn;
function conexaoServidor() {
    $usuario = 'ds7z2myv4vlueu19';
    $senha = 'rzm8ibkjvd0z5hkp';
    $host = 'p1us8ottbqwio8hv.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    $conn = mysqli_connect($host, $usuario, $senha);
    if (!$conn) {
        die("NÃ£o foi possÃ­vel conectar" . mysqli_error());
    }
    mysqli_query("SET NAMES 'utf8'");
    mysqli_query('SET character_set_connection=utf8');
    mysqli_query('SET character_set_client=utf8');
    mysqli_query('SET character_set_results=utf8');
}

function selecionarBancoDados() {
    $banco = 'ws3ab1vceij8w6zo';
    $bd = mysqli_select_db($conn,$banco);
    if (!$bd) {
        die("NÃ£o foi possÃ­vel selecionar o banco de dados" . mysqli_error());
    }
}

function inserir($sql) {
    if (mysqli_query($sql)) {
        return true;
    } else {
        return false;
    }
}

function buscaRegistro($sql) {
    return mysqli_query($sql);
}

function excluir($sql) {
    if (mysqli_query($sql)) {
        return true;
    } else {
        return false;
    }
}

function atualizarRegistro($sql) {
    if (mysqli_query($sql)) {
        return true;
    } else {
        return false;
    }
}

function cadastrarTime() {
    $sqlApiOuManual = "SELECT api FROM admin";
    $resApiOuManual = buscaRegistro($sqlApiOuManual);
    $ApiOuManual = mysqli_fetch_assoc($resApiOuManual);
    $escolha = $ApiOuManual['api'];
  
    
    if ($escolha == 2) {

        conexaoServidor();
        selecionarBancoDados();
        /* 1. Cria recurso [objeto] do tipo CURL */
        $ch = curl_init();

        /* 2. Configura os parâmetros da requisição [request] */
        curl_setopt($ch, CURLOPT_URL, "http://jsuol.com.br/c/monaco/utils/gestor/commons.js?file=commons.uol.com.br/sistemas/esporte/modalidades/futebol/campeonatos/dados/2017/30/dados.json");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);

        /* 3. Executa a requisição */
        $resultado = curl_exec($ch);
        curl_close($ch);

        /* 4. Transforma o json em um ARRAY */
        $obj = json_decode($resultado, true);

        /* 5. Exibe as informações de fornecedores */
        $Array = $obj;
        $dados = $Array ["fases"]["2528"]["classificacao"]["equipe"];

        

        $consulta = mysqli_query("select * from times");
        if (mysqli_num_rows($consulta) > 0) {
            //echo "TEM DADOS NA TABELA";
            echo "</br>";
            for ($i = 0; $i < 20; $i++) {
                $posicao = $i + 1;
                $id = $obj ["fases"]["2528"]["classificacao"]["grupo"]["Único"][$i];
                $equipes = $Array ["equipes"]["$id"]["nome-comum"];
                $pontos = $dados ["$id"]["pg"]["total"];
                $jogos = $dados ["$id"]["j"]["total"];
                $vitoria = $dados ["$id"]["v"]["total"];
                $empate = $dados ["$id"]["e"]["total"];
                $derrota = $dados ["$id"]["d"]["total"];

                $sql = "UPDATE times SET nome = '$equipes', id = '$id', pontos = '$pontos', jogos = '$jogos', vitorias = '$vitoria', empates = '$empate', derrotas = '$derrota'  WHERE posicao = $posicao";
                //$sql = "UPDATE times SET nome = '$equipes' WHERE posicao = $posicao";
                atualizarRegistro($sql);
            }
        } else {
            //echo "NÃO TEM DADOS NA TABELA";
            for ($i = 0; $i < 20; $i++) {
                $posicao = $i + 1;
                $id = $obj ["fases"]["2528"]["classificacao"]["grupo"]["Único"][$i];
                $equipes = $Array ["equipes"]["$id"]["nome-comum"];
                $pontos = $dados ["$id"]["pg"]["total"];
                $jogos = $dados ["$id"]["j"]["total"];
                $vitoria = $dados ["$id"]["v"]["total"];
                $empate = $dados ["$id"]["e"]["total"];
                $derrota = $dados ["$id"]["d"]["total"];
                $sql = "INSERT INTO times (posicao,nome,id,pontos,jogos,vitorias,empates,derrotas) VALUES ('$posicao','$equipes','$id','$pontos','$jogos','$vitoria','$empate','$derrota')";
                inserir($sql);
            }
        }
    }
}
?>



