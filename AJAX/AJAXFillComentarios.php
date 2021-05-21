<?php
include_once ("../includes/config.inc.php");
$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$id=intval($_POST['id']);
$sql="select * from comentarios where comentarioEntidadeId=".$id;
$res=mysqli_query($con,$sql);

?>

<?php
while ($dados=mysqli_fetch_array($res)){
?>



        <div class="dt-quote" style="width: 100%">
            <div style="color: white;">
                <span><b><img src="<?php echo $dados['perfilAvatarURL'];?>" style="border-radius: 50%; width: 50px; height: 50px"> &nbsp; <?php echo $dados["perfilNome"]?></b></span>
                <span style="float: right"><b><?php echo $dados["comentarioData"]?></b></span>
            </div>
            <br>
            <p><?php echo $dados["comentarioTexto"]?></p>

            <div class="row" style="margin-left: 5px">
                <span  id="btnLike" onclick="countClicks(this)" class="fa fa-thumbs-up text-secondary" style="font-size: 20px; margin-right: 5px"></span>
                <span  id="btnDislike" onclick="countClicks2(this)" class="fa fa-thumbs-down text-secondary" style="font-size: 20px; margin-left: 5px"></span></div>
        </div>




    <?php
    if(isset($_SESSION['id'])){
        ?>

        <div class="dt-leave-comment" style="margin-top: 10%">

            <span style="font-size: 30px; color: #FFFFFF"> &nbsp;<strong>Deixa um comentário:</strong> </span>
            <form action="Confirma/ConfirmaAdicionaComentarioNoticia.php?id=<?php echo $id?>" style="padding-top: 20px" method="post">
                <input type="datetime-local" name="comentarioData" style="margin-bottom: 20px">
                <textarea required spellcheck="true" name="comentarioTexto"  rows="100" placeholder="Message" style="color: #FFFFFF; font-size: 17px"></textarea>
                <input type="hidden" name="comentarioEntidade" value="noticia">
                <button type="submit">Comentar</button>
            </form>
        </div>

        <?php
    }else{
        ?>
        <hr>
        <div style="margin: 30px; font-size: 20px; color: #FFFFFF">
        <span>Para comentar nesta review  <span onclick="document.getElementById('id01').style.display='block'"><a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 17px;">
                                            <span class="badge badge-light" style="color: black; font-size: 16px">Login</span></a></span></span>
        <div>
        <hr>
        <?php
    }
    ?>
    <!-- ************************************************FIM************************************************-->

    </div>
    </div>


<?php
if(isset($_SESSION['id'])){
    ?>

    <div class="dt-leave-comment" style="margin-top: 10%">
        <input type="hidden" value="<?php echo $dados['noticiaId'];?>">
        <span style="font-size: 30px; color: #FFFFFF"> &nbsp;<strong>Deixa um comentário:</strong> </span>
        <form action="Confirma/ConfirmaAdicionaComentarioNoticia.php?id=<?php echo $id?>" style="padding-top: 20px" method="post">
            <input type="datetime-local" name="comentarioData" style="margin-bottom: 20px">
            <textarea required spellcheck="true" name="comentarioTexto"  rows="100" placeholder="Message" style="color: #FFFFFF; font-size: 17px"></textarea>
            <input type="hidden" name="comentarioEntidade" value="noticia">
            <button type="submit">Comentar</button>
        </form>
    </div>

    <?php
}else{
?>
<hr>
<div style="margin: 30px; font-size: 20px; color: #FFFFFF">
    <span>Para comentar nesta review  <span onclick="document.getElementById('id01').style.display='block'"><a href="#" style="font-family: 'Montserrat', sans-serif; color: #FFFFFF; font-size: 17px;">
                                            <span class="badge badge-light" style="color: black; font-size: 16px">Login</span></a></span></span>
    <div>
        <hr>
        <?php
        }
        ?>
    </div>

<?php
}
?>


