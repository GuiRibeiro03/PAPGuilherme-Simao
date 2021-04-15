<?php
include_once("includes/bodyBase.inc.php");
top(GAMESFRONT);
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from jogos";
$result=mysqli_query($con,$sql);


?>




<input type="text" placeholder="Procura o jogo que desejas..." id="search" style="width: 30%; margin-left: 30%">

<div id="tableContent">

</div>

<?php
bottom();
?>



