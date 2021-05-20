<?php
include_once("../includes/body.inc.php");
top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET["id"]);

$sql="select * from  jogogeneros where jogoGeneroJogoId=".$id;
$sql1="select * from jogoplataformas where jogoPlataformaJogoId=".$id;


?>
<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Editar Tags do Jogo <?php echo $id ?></span></div>

<section class="store" style="padding:50px">

    <a href="../backoffice/Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>
<hr>

<form action="../Confirma/confirmaEditaTagsJogo.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">

    <label style="color:white; font-size: 15px" class="badge badge-dark">Genero: </label>
    <select class="form-select"  aria-label="Default select example" name="generoId">
        <option value="-1">Escolha o genero...</option>
        <?php
        $sql2="select * from generos ";
        $result=mysqli_query($con,$sql2);
        while ($dadosGeneros=mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $dadosGeneros['generoId']?>">
                <?php echo $dadosGeneros["generoNome"] ?>
            </option>
            <?php
        }
        ?>
    </select> <hr>
    <label style="color:white; font-size: 15px" class="badge badge-dark">Plataforma: </label>
    <select class="form-select"  aria-label="Default select example" name="plataformaId">
        <option value="-1">Escolha a plataforma...</option>
        <?php
        $sql3="select * from plataformas  ";
        $result2=mysqli_query($con,$sql3);
        while ($dadosPlataformas=mysqli_fetch_array($result2)){
            ?>
            <option value="<?php echo $dadosPlataformas['plataformaId']?>">
                <?php echo $dadosPlataformas["plataformaNome"] ?>
            </option>
            <?php
        }
        ?>
    </select> <hr>

    <input type="Submit" class="btn btn-success" value="Edita" ><br>
</form>

</section>

<?php
bottom();
?>



