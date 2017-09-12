<?php

include "./funcoesBD.php";

conexaoServidor();
selecionarBancoDados();

/*
 * Logica para somar os pontos de cada usuario
 */

/*
 * Pegando todas as posições atual dos times do brasilerão
 * e jogando dentro de um array para a verificação dde pontos
 */

/*
 * $posicaoCorreta esta variavel sevira para adicionar na posicões do array 1 2 3 4 5 6 7 8
 * Se seguimos a variavel usada no for sera criada a seguinte sequencia 1 2 3 4 17 18 19 20
 */

$posicaoCorreta = 1;

/*
 * Este for serve para colocar em um array os times na sequencia correta para a comparação
 */
for ($giros = 1; $giros < 21; $giros++) {

    $sql = "SELECT * FROM times WHERE posicao = $giros";
    $res_cliente = buscaRegistro($sql);
    $registro = mysqli_fetch_assoc($res_cliente);

    /*
     * If servira para adicionar apenas os quatros primeiros
     * e os quatro ultimos
     */

    if ($giros <= 4 || $giros > 16) {
        $ResultFinal[$posicaoCorreta] = $registro['nome'];
        $posicaoCorreta++;
    }
}

/*
 * Pegando a quantidade de apostadores.
 */

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
/*
 * Saber quantos artilheiros
 */

$sqlQuantidadeDeArtilheiro = "SELECT COUNT(*) FROM artilheiro";
$resQuantidadeDeArtilheiro = buscaRegistro($sqlQuantidadeDeArtilheiro);

$QuantidadeDeArtilheiro = mysqli_result($resQuantidadeDeArtilheiro, 0);

/*
 * pegando os id dos artilheiros 
 */

$sqlIdArtilheiro = "SELECT id FROM artilheiro";
$resIdArtilheiro = buscaRegistro($sqlIdArtilheiro);

$contador2 = 1;
while ($registroIdArtilheiro = mysqli_fetch_assoc($resIdArtilheiro)) {
    $IdArtilheiro[$contador2] = $registroIdArtilheiro['id'];
    $contador2++;
}

/*
 * Pegando as escolha de cada apostador para faser a somatoria de pontos.
 * Este for ira rodar de acordo com a quantidade de usuarios da tabela que foi jogado na variavel valorDeUsuario.
 */

for ($giros2 = 1; $giros2 <= $valorDeUsuarios; $giros2++) {

    /*
     * Saber qual id do usuario esta no banco
     */

    $id = $idUsuario[$giros2];
    $sqlPesquisaId = "SELECT * FROM usuario WHERE id = $id";
    $resPesquisaId = buscaRegistro($sqlPesquisaId);
    $registroDoId = mysqli_fetch_assoc($resPesquisaId);
    



    /*
     * Saber o nome do usuario
     */

    $sql2 = "SELECT usuario FROM usuario WHERE id = $id";
    $res_cliente2 = buscaRegistro($sql2);
    $nome = mysqli_result($res_cliente2, 0);

    /*
     * Adicionando as apostas no array para o algoritomo de de pontuação
     */

    $EscDoApostador[1] = $registroDoId['primeiro'];
    $EscDoApostador[2] = $registroDoId['segundo'];
    $EscDoApostador[3] = $registroDoId['terceiro'];
    $EscDoApostador[4] = $registroDoId['quarto'];
    $EscDoApostador[5] = $registroDoId['deSetimo'];
    $EscDoApostador[6] = $registroDoId['deOitavo'];
    $EscDoApostador[7] = $registroDoId['deNono'];
    $EscDoApostador[8] = $registroDoId['vigesimo'];
    

    /*
     * Variavel para saber os pontos de cada apostador
     */

    $apostador = 0;
    for ($giros3 = 1; $giros3 <= sizeof($EscDoApostador); $giros3++) {
        $EP = $EscDoApostador[$giros3];
        $RF = $ResultFinal[$giros3];
        if ($EP === $RF) {
            $apostador = $apostador + 5;
        } else {
            if ($giros3 <= 4) {
                for ($giros4 = 1; $giros4 <= 4; $giros4++) {
                    $RF = $ResultFinal[$giros4];
                    if ($EP === $RF) {
                        $apostador = $apostador + 2;
                    }
                }
            }
            if ($giros3 >= 4) {
                for ($giros5 = 5; $giros5 <= 8; $giros5++) {
                    $RF = $ResultFinal[$giros5];
                    if ($EP === $RF) {
                        $apostador = $apostador + 2;
                    }
                }
            }
        }
    }
    
    $EscDoArtilhero = $registroDoId['artilheiro'];
    
    /*
     * Adicionar os artilheiro em um array para comparação
     */
    
    for ($giros6 = 1; $giros6 <= $QuantidadeDeArtilheiro; $giros6++) {

        $idArt = $IdArtilheiro[$giros6];

        $sqlNomeArtilheiro = "SELECT nome FROM artilheiro WHERE id = $idArt";
        $resNomeArtilheiro = buscaRegistro($sqlNomeArtilheiro);
        $NomeArtilheiro = mysqli_fetch_assoc($resNomeArtilheiro);

        $AtilheroFinal = $NomeArtilheiro['nome'];
        
        if ($EscDoArtilhero == $AtilheroFinal) {
            $apostador = $apostador + 10;
        } 
         
        
    }

   
    $Apostadores[$giros2] = array(1 => ($id), 2 => ($nome), 3 => ($apostador));
}

function cmp($a, $b) {
    return $a[3] > $b[3];
}
if ($valorDeUsuarios > 1) {
    usort($Apostadores, 'cmp');
} 




/*
 * Pegando a quantidades de apostadores na ordem crecente do banco
 */

$sqlOrdemApostadores = "SELECT COUNT(*) FROM apostadores";
$resOrdemApostadores = buscaRegistro($sqlOrdemApostadores);

$valorOrdemApostadores = mysqli_result($resOrdemApostadores, 0);

/*
 * Fasendo uma consulta para saber se te algo na tabela apostadores
 */

$consulta = mysqli_query("SELECT * FROM apostadores");
$posicao = 1;

/*
 * Apaga todos os gegistro se ouver algum apostador na tabela
 */

if (mysqli_num_rows($consulta) > 0) {
    
    for ($f = 1; $f <= $valorOrdemApostadores; $f++) {
        $sql = "DELETE FROM apostadores WHERE apostadores.posicao = $f;";
        excluir($sql);
    }
}

/*
 * Inseri os apostadores na ordem crecente
 */

for ($a = $valorDeUsuarios - 1; $a >= 0; $a--) {

    $APid = $Apostadores[$a][1];
    $APnome = $Apostadores[$a][2];
    $APpontos = $Apostadores[$a][3];

    $sql = "INSERT INTO apostadores (posicao,id,nome,pontos) VALUES ('$posicao','$APid','$APnome','$APpontos')";
    inserir($sql);


    $posicao++;
}
