<?php
include_once("includes/bodyBase.inc.php");
top(GAMESFRONT);


/* $i = count($_POST['genero[]']);
for ($j=0; $j <= $i; $j++){
    $generos[$j] = addslashes($_POST["'genero['$j']'"]);
}
$k = count($_POST['plataforma[]']);
for ($j=0; $j <= $k; $j++){
    $plataformas[$j] = addslashes($_POST["'plataforma['$j']'"]);
}
$l = count($_POST['empresa[]']);
for ($j=0; $j <= $l; $j++){
    $empresas[$j] = addslashes($_POST["'empresa['$j']'"]);
}


if(isset($generos) or isset($plataformas) or isset($empresas)) {
$sql = "select * from jogos inner join jogoplataformas on jogoId = jogoPlataformaJogoId inner join jogogeneros on jogoId = jogoGeneroJogoId where jogoPlataformaPlataformaId = $plataformas[0] and jogoGeneroGeneroId = $generos[0]";
} else $sql = "select * from jogos"; */



$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql = "select * from jogos";
$result=mysqli_query($con,$sql);


?>



    <div style="text-align: center">
    <input type="text" placeholder="Procura o jogo que desejas..." id="search" style="width: 30%;">
    </div>
    <div id="tableContent">

    </div>

    <?php
    bottom();
    ?>



