<?php
include_once("includes/bodyBase.inc.php");
top(GAMESFRONT);


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



