<?php
include_once ("includes/bodyBase.inc.php");
top();

$id=intval($_GET["id"]);
$con = mysqli_connect("localhost", "root", "","pap2021gameon");
$sql="select * from noticias where noticiaId=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);



$sql2="select * from noticias limit 5";
$result2=mysqli_query($con,$sql2);

?>
    <!-- Details Hero Section Begin -->

    <!-- Details Hero Section End -->

    <!-- Details Post Section Begin -->
    <section class="details-post-section spad" style="width: 100%; margin-top: 2% " >
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="details-hero-text" >
                        <div class="label"><span>Notícia</span></div>
                        <h3 style=" font-size: 30px; color: white;  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;"><?php echo $dados["noticiaTitulo"]?></h3>
                        <ul>
                            <li>by <span>Admin</span></li>
                            <li><i class="fa fa-clock-o"></i> <?php echo $dados["noticiaData"]?></li>
                            <li><i class="fa fa-comment-o"></i> 20</li>
                        </ul>
                    </div>
                </div>
            </div>

        <div class="container" >
            <div class="row">

                    <div class="details-text">
                       <br>
                        <div class="dt-item" >
                            <span style="color: #FFFFFF"> <?php echo $dados["noticiaDesenvolvimento"]?> </span>
                        </div>

                        <div class="dt-last-desc" style="text-align: center">
                            <img src="img/<?php echo $dados["noticiaImagemURL"] ?>" alt="" style="width: 60%;">
                        </div>
                        <div class="dt-tags">
                                                    <a href="blog.php"><span>PC</span></a>
                            <a href="blogTagExemplo.html"><span>Playstation</span></a>
                            <a href="blog.php"><span>CD Projekt Red</span></a>
                        </div>



                        <!-- ***********************************Comentários section******************************-->

                        <?php
                        $sql="select * from comentarios inner join perfis on comentarioPerfilId=perfilid where comentarioEntidade like 'noticia' and comentarioEntidadeId=$id order by comentarioData desc";
                        $resultComents=mysqli_query($con,$sql);
                        $i=0;
                        while ($dadosComents=mysqli_fetch_array($resultComents)){
                            ?>

                            <div class="dt-quote" style="width: 100%">
                                <div style="color: white;">
                                    <span><b><?php echo $dadosComents["perfilNome"]?></b></span>
                                    <span style="float: right"><b><?php echo $dadosComents["comentarioData"]?></b></span>
                                </div>
                                <hr>
                                <br>
                                <p><?php echo $dadosComents["comentarioTexto"]?></p>

                                <div class="row" style="margin-left: 5px">
                                    <span  id="btnLike" onclick="countClicks(this)" class="fa fa-thumbs-up text-secondary" style="font-size: 20px; margin-right: 5px"></span>
                                    <span  id="btnDislike" onclick="countClicks2(this)" class="fa fa-thumbs-down text-secondary" style="font-size: 20px; margin-left: 5px"></span>
                                    <span style="margin-left: 90%"><a href="Elimina/eliminaComentario.php?id=<?php echo $dadosComents['comentarioId'];?>" ><i class="fa fa-trash"></i></a></span>
                                </div>
                            </div>






                            <?php
                        }
                        ?>


                        <?php
                        if(isset($_SESSION['id'])){
                            ?>

                            <div class="dt-leave-comment" style="margin-top: 10%">

                                <span style="font-size: 30px; color: #FFFFFF"> &nbsp;<strong>Deixa um comentário:</strong> </span>
                                <form action="Confirma/ConfirmaAdicionaComentarioNoticia.php?id=<?php echo $id?>" style="padding-top: 20px" method="post">

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
                        </div>



                            <div class="row-cols-2" style="width: 100%;">
                                <div class="details-hero-text" style="margin-bottom: 2%" >
                                <div class="label"><span style="font-size: 20px">Mais Notícias:</span></div>
                                </div>


                                    <?php
                                    while($dados2=mysqli_fetch_array($result2)){
                                        ?>
                                        <div class="trending-item">

                                            <div class="ti-pic">
                                                <a href="ListaBlog.php?id=<?php echo $dados2["noticiaId"]?>"><img src="img/<?php echo $dados2["noticiaImagemFundoURL"]?>" style="height: 140px; width: 180px" alt=""></a>
                                            </div>
                                            <div class="ti-text">
                                                <h6><a href="ListaBlog.php?id=<?php echo $dados2["noticiaId"]?>"><?php echo $dados2["noticiaTitulo"]?></a>
                                                </h6>
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i><?php echo $dados2["noticiaData"]?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

</div>

    </section>
    <!-- Details Post Section End -->

    <!-- Footer Section Begin -->
<?php
bottom();
?>