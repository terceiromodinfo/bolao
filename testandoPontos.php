
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
 * Este for serve para colocar em um array os times na sequencia correta
 */
for ($i = 1; $i < 21; $i++) {


    $sql = "SELECT * FROM times WHERE posicao = $i";
    $res_cliente = buscaRegistro($sql);

    $registro = mysql_fetch_assoc($res_cliente);
    
    /*
     * If servira para adicionar apenas os quatros primeiros
     * e os quatro ultimos
     */
    
    
    if ($i <= 4 || $i > 16) {

        $ResultFinal[$posicaoCorreta] = $registro['nome'];
        $posicaoCorreta++;
        //print $ResultFinal[$i]."<br />";
    }
}

/*
 * Pegando a quantidade de apostadores.
 */

$sql = "SELECT COUNT(*) FROM usuario";
$res = buscaRegistro($sql);

$valorDeUsuarios = mysql_result($res, 0);

/*
 * pegando os id dos apostadores 
 */

$sql = "SELECT id FROM usuario";
$res = buscaRegistro($sql);

$contador = 1;
while ($registro = mysql_fetch_assoc($res)) {
    $idUsuario[$contador] = $registro['id'];
    $contador++;
}



/*
 * Pegando as escolha de cada apostador para faser a somatoria de pontos.
 * Este for ira rodar de acordo com a quantidade de usuarios da tabela que foi jogado na variavel valorDeUsuario.
 */
for ($b = 1; $b <= $valorDeUsuarios; $b++) {
    $id = $idUsuario[$b];
    $sql = "SELECT * FROM usuario WHERE id = $id";
    $res_cliente = buscaRegistro($sql);
    $registro = mysql_fetch_assoc($res_cliente);

    $sql2 = "SELECT usuario FROM usuario WHERE id = $id";
    $res_cliente2 = buscaRegistro($sql2);
    $registro3 = mysql_result($res_cliente2, 0);




    $EscDoApostador[1] = $registro['primeiro'];
    $EscDoApostador[2] = $registro['segundo'];
    $EscDoApostador[3] = $registro['terceiro'];
    $EscDoApostador[4] = $registro['quarto'];
    $EscDoApostador[5] = $registro['deSetimo'];
    $EscDoApostador[6] = $registro['deOitavo'];
    $EscDoApostador[7] = $registro['deNono'];
    $EscDoApostador[8] = $registro['vigesimo'];


    $apostador = 0;
    
    // textes de codigos
    /*
    $arrayDeTexte = ['','Corinthians','Grêmio','Santos','Palmeiras','Flamengo','Cruzeiro','Botafogo','Atlético-PR','Fluminense','Sport','Atlético-MG','Vasco','Ponte Preta','Bahia','Coritiba','Vitória','Chapecoense','Avaí','São Paulo','Atlético-GO'];
       
    
    
       for ($i = 1; $i <= sizeof($ResultFinal); $i++) {
           $EP = $arrayDeTexte[$i];
           $RF = $ResultFinal[$i];
           
           if ($EP === $RF) {
               print $EP." = ".$RF."        ------------   ";
               print "<br/>";
               print "<br/>";
           } else {
               print $EP." != ".$RF;
               print "<br/>";
               print "<br/>";
           }
       }
    */
    //fim to texte
    
    
    
    for ($i = 1; $i <= sizeof($EscDoApostador); $i++) {
        $EP = $EscDoApostador[$i];
        $RF = $ResultFinal[$i];
        if ($EP === $RF) {
            $apostador = $apostador + 5;
        } else {
            
            if ($i <= 4) {
                for ($j = 1; $j <= 4; $j++) {
                    $RF = $ResultFinal[$j];
                    if ($EP === $RF) {
                        $apostador = $apostador + 2;
                        
                    }
                }
            }
            
            
            if ($i >= 4) {
                for ($l = 5; $l <= 8; $l++) {
                    $RF = $ResultFinal[$l];
                    if ($EP === $RF) {
                        $apostador = $apostador + 2;
                        
                    }
                }
            }
             
        }
    }
    /*
      if ($EscDoArtilhero == $AtilheroFinal) {
      $apostador = $apostador + 10;
      }
    */ 
    
    print $registro3." ";
    //print "</br>";
    //print_r($EscDoApostador);
    //print "</br>";
    //print "</br>";
    //print_r($ResultFinal);
    //print "</br>";
    print $apostador;
   
    print "</br>";
     
     
}








 

                
            
    