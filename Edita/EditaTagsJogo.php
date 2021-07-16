<?php
include_once("../includes/body.inc.php");
top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET["id"]);

$sql="select * from jogos inner join jogogeneros on jogoId=jogoGeneroJogoId
                            inner join jogoplataformas on jogoId=jogoPlataformaJogoId where jogoId=".$id;
$resultjogos=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($resultjogos);

?>
<div style="height: 60px; width: 100%;background-color: red; text-align: center"><span style=" margin-left: 20%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Editar Tags do jogo: <u><?php echo $dados['jogoNome']; ?></u></span></div>

<section class="store" style="padding:50px">

    <a href="../backoffice/Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>
<hr>

<form action="../Confirma/confirmaEditaTagsJogo.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">


    <select class="form-select"  aria-label="Default select example" name="generoId">
        <option value="-1">Escolha o genero...</option>
        <?php
        $sql2="select * from generos ";
        $result2=mysqli_query($con,$sql2);
        while ($dadosGeneros=mysqli_fetch_array($result2)){
            ?>
            <option value="<?php echo $dadosGeneros['generoId']?>"
                <?php
                if($dados["jogoGeneroGeneroId"]==$dadosGeneros["generoId"])
                    echo "Selected" ;
                ?>
            >
                <?php echo $dadosGeneros["generoNome"] ?>
            </option>
            <?php
        }
        ?>
    </select>

    <select class="form-select"  aria-label="Default select example" name="plataformaId">
        <option value="-1">Escolha a plataforma...</option>
        <?php
        $sql3="select * from plataformas";
        $result3=mysqli_query($con,$sql3);
        while ($dadosPlataformas=mysqli_fetch_array($result3)){
            ?>
            <option value="<?php echo $dadosPlataformas['plataformaId']?>"
                <?php
                if($dados["jogoPlataformaPlataformaId"]==$dadosPlataformas["plataformaId"])
                    echo "Selected" ;
                ?>
            >
                <?php echo $dadosPlataformas["plataformaNome"] ?>
            </option>
            <?php
        }
        ?>
    </select><hr>

    <input type="Submit" class="btn btn-success" value="Edita" ><br>
</form>

</section>

<?php
bottom();
?>



