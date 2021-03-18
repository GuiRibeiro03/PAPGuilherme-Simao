<?php
include_once("../includes/body.inc.php");
top();
$id=intval($_GET["id"]);
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from noticias where noticiaId=".$id;
$result=mysqli_query($con, $sql);
$dados=mysqli_fetch_array($result)
?>

<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Edita Review</span></div>

<section class="store" style="margin-top: 100px; margin-left: 50px">
    <a href="../backoffice/NoticiasBackoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>

    <form action="../Confirma/confirmaEditaNoticia.php?id=<?php $id ?>" method="post" enctype="multipart/form-data">
        <h4>Titulo:</h4>
        <input type="text" name="noticiaTitulo"  value="<?php echo $dados["noticiaTitulo"] ?>" style="width: 50%;">
        <br>
        <br>


        <div id="wrapper" style="color: #FFFFFF">
            <input type="file" accept="image/*" name="noticiaImagemFundoURL" value="../img/wallpapers/<?php echo $dados["noticiaImagemFundoURL"]?>" onchange="preview_image(event)">
            <img id="output_image"/>
        </div>
        <br>
        <div id="wrapper" style="color: #FFFFFF">
            <input type="file" accept="image/*" name="noticiaImagemURL" value="<?php echo $dados["noticiaImagemURL"]?>" onchange="preview_image(event)">
            <img id="output_image"/>
        </div>
        <br>


        <div style="width: 100%;">
            <h4>Desenvolvimento:</h4>
            <textarea cols="100" rows="20" name="noticiaDesenvolvimento"  value="<?php echo $dados["noticiaDesenvolvimento"]?>"> <?php echo $dados["noticiaDesenvolvimento"]?></textarea>
        </div>

        <br>

        <div style="margin-top: 40px; margin-bottom: 40px">
            <h4>Data:</h4>
            <input type="date" name="noticiaData" value="<?php echo $dados["noticiaData"]?>">

        </div>



        <input type="Submit" class="btn btn-danger" value="Adiciona"><br>

    </form>
</section>



<?php
bottom();
?>



