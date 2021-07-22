<?php
include_once("includes/bodyBase.inc.php");
top(GAMESFRONT);


$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql = "select * from jogos";



$ord = 0;
if (isset($_GET['ord'])) {
    $ord = $_GET['ord'];
    if ($ord == 1) {
        $sql .= " order by jogoNome ASC";
    } elseif ($ord == 2)  {
        $sql .= " order by jogoId DESC";
    } elseif ($ord == 3)  {
        $sql .= " order by jogoPreco ASC";
    } elseif ($ord == 4)  {
        $sql .= " order by jogoPreco DESC";
    }

}

$result=mysqli_query($con,$sql);
?>



<div style="text-align: center; width: 100%; margin-left: 20%">
    <input type="text" placeholder="Procura o jogo que desejas..." id="search" style="width: 30%; height: 40px; border-radius: 10px; margin-top: 3%; margin-right: 40%">
    </div>


    <div id="tableContent">

    </div>



    <?php
    bottom();
    ?>



