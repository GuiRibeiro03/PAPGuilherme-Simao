
<?php
include_once("../includes/body.inc.php");
top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET["id"]);

$sql="select * from generos where generoId=".$id;
$resultGeneros=mysqli_query($con,$sql);
$dadosGeneros=mysqli_fetch_array($resultGeneros);

?>
<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Editar Tag-Genero</span></div>

<section class="store" style="padding:50px">

    <a href="../backoffice/Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>
<hr>

<form action="../Confirma/confirmaEditaTagGenero.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">

    <label style="color:white; font-size: 15px" class="badge badge-dark">Nome: </label>
    <input type="text" style="height: 99%" name="generoNome" value="<?php echo $dadosGeneros["generoNome"]?>"><hr>

    <input type="Submit" class="btn btn-success" value="Edita" ><br>
</form>

</section>

<?php
bottom();
?>



