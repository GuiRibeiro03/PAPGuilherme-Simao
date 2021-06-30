<?php
include_once("includes/bodyBase.inc.php");
top(REVIEWSFRONT);
$con=mysqli_connect("localhost", "root","","pap2021gameon");
$sql="select * from reviews inner join jogos on jogoId = reviewJogoId";

$result=mysqli_query($con,$sql);

?>

<div style="text-align: center; ">
    <input type="text" placeholder="Procura a review que desejas..." id="search" style="width: 30%;">
</div>

<div id="tableContent">

</div>

<?php
bottom();
?>
