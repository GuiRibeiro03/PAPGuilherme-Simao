
<?php
include_once("../includes/body.inc.php");
top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET["id"]);

$sql="select * from plataformas where plataformaId=".$id;
$resultplataformas=mysqli_query($con,$sql);
$dadosPlat=mysqli_fetch_array($resultplataformas);

?>
<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Editar Tag-Plataforma</span></div>

<section class="store" style="padding:50px">

    <a href="../backoffice/Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>
<hr>

<form action="../Confirma/confirmaEditaTagPlataforma.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">

    <label style="color:white; font-size: 15px" class="badge badge-dark">Nome: </label>
    <input type="text" style="height: 99%" name="plataformaNome" value="<?php echo $dadosPlat["plataformaNome"]?>"><hr>

    <input type="Submit" class="btn btn-success" value="Edita" ><br>
</form>

</section>

<?php
bottom();
?>



