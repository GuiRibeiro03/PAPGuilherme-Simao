<?php
include_once("includes/bodyBase.inc.php");
top();

$con=mysqli_connect("localhost", "root","","pap2021gameon");
$sql="select * from noticias";
$sql_2="select * from jogos inner join reviews on jogoId=reviewJogoId where jogoGlobalRating=100 limit 3";
$sqlJogos="select * from jogos where jogoGlobalRating > 70 order  by jogoGlobalRating desc ";
$sql2_2="select * from jogos where jogoDestaque LIKE 'sim' ";
$sql3="select * from reviews";
$result=mysqli_query($con, $sql);
$result_2=mysqli_query($con,$sql_2);
$result2=mysqli_query($con,$sqlJogos);
$result2_2=mysqli_query($con,$sql2_2);
$result4=mysqli_query($con,$sql3);


?>


    <!-- Update News Section Begin -->
    <section class="update-news-section" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <a href="blog.php"><h5><span>Notícias </span></h5></a>
                    </div>
                    <div class="tab-elem">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#news" role="tab"></a>
                            </li>
                        </ul><!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="news" role="tabpanel">
                                <div class="row">
                                    <div class="un-slider owl-carousel" >
                                        <?php
                                        while ($dadosNoticias=mysqli_fetch_array($result)){
                                            ?>
                                        <div class="col-lg-12" style="outline-color: red; outline-width: 2px" >
                                            <div class="un-big-item set-bg" data-setbg="img/<?php echo $dadosNoticias["noticiaImagemFundoURL"] ?>" style="border-radius: 10px; ">

                                                <div class="ub-text" >
                                                    <h4 style=" color: white;  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;"><a href="ListaBlog.php?id=<?php echo $dadosNoticias["noticiaId"] ?>"><?php echo $dadosNoticias["noticiaTitulo"]?></a></h4>
                                                    <ul >
                                                        <li style="color:#FFF; font-size: 13px">by <span>Admin</span></li>
                                                        <li style="color:#FFF; font-size: 13px"><i class="fa fa-clock-o"></i> <?php echo $dadosNoticias["noticiaData"]?></li>
                                                        <li style="color:#FFF; font-size: 13px"><i class="fa fa-comment"></i>
                                                            <?php
                                                            $sql2="select count(comentarioId) as num1 from comentarios where comentarioEntidadeId=".$dadosNoticias['noticiaId'];
                                                            $result7=mysqli_query($con,$sql2);
                                                            $numComentarios=mysqli_fetch_array($result7);

                                                            echo $numComentarios["num1"] ?> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-preview-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h5> JOGOS EM DESTAQUE:</h5></div>
                </div>
            </div>

            <div class="row">
<?php
$i = 0;
while ($i < 4 && $dadosJogos=mysqli_fetch_array($result2_2)){

    ?>

                <div class="col-lg-3" >
                    <div class="card" style="width: 20rem; height: 100%; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black; border-radius: 2%">
                        <a href="Listajogo.php?id=<?php echo $dadosJogos["jogoId"] ?>"><img src="img/<?php echo $dadosJogos["jogoImagemURL"] ?>" class="card-img-top" alt="..." style="height: 400px"></a>


                        <div class="card-body">
                            <a href="Listajogo.php?id=<?php echo $dadosJogos["jogoId"] ?>"><h4 class="card-title"><strong><?php echo $dadosJogos["jogoNome"]?></strong> &nbsp; </h4></a>

                        </div>

                        <div class="card-text" style="margin-bottom: 5%; margin-left: 5%">
                            <h5  class="card-text"><strong><?php echo $dadosJogos["jogoPreco"]?>€</strong></h5>
                        </div>

                        <div style=" margin-left: 5%; margin-bottom: 20px">

                        <a onclick="adicionaCarrinhoJogo(<?php echo $dadosJogos['jogoId']?>)"  style="color: #dc3545; ">
                            <input type="submit" class=" cart-button" value="Adicionar ao Carrinho" style="font-weight: bold;height: 50px"></a>
                        </div>
                    </div>
                </div>
    <?php
$i = $i + 1;

}
        ?>
            </div>
        </div>
    </section>

    <section class="instagram-post-section spad" style="width: 100%">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-7">
                    <div class="sidebar-option">
                        <div class="best-of-post">
                            <div class="section-title">
                                <h5>O melhor</h5>
                            </div>
                            <?php
                            $i = 0;
                            while ($i < 6 && $dadosJogos2=mysqli_fetch_array($result2)){

                                ?>
                                <div class="bp-item">
                                    <div class="bp-loader">
                                        <div class="loader-circle-wrap">
                                            <div class="loader-circle">
                                                <span class="circle-progress-1" data-cpid="id-<?php echo $i + 1?>" data-cpvalue="<?php echo $dadosJogos2["jogoGlobalRating"]?>" data-cpcolor="#c20000"></span>
                                                <div class="review-point"><?php echo $dadosJogos2["jogoGlobalRating"]?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bp-text" style="width: 100%">
                                        <h5><strong><a href="Listajogo.php?id=<?php echo $dadosJogos2["jogoId"]?>"><?php echo $dadosJogos2["jogoNome"]?></a></strong></h5>
                                    </div>
                                </div>

                                <?php
                                $i = $i + 1;
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-7" style="color: #FFFFFF">
                    <div class="sidebar-option">
                        <div class="best-of-post">
                            <div class="section-title">
                                <br>
                            </div>
                            <?php
                            $i = 0;
                            while ($i < 6   && $dadosJogos2=mysqli_fetch_array($result2)){

                                ?>
                                <div class="bp-item">
                                    <div class="bp-loader">
                                        <div class="loader-circle-wrap">
                                            <div class="loader-circle">
                                                <span class="circle-progress-1" data-cpid="id-<?php echo $i + 1?>" data-cpvalue="<?php echo $dadosJogos2["jogoGlobalRating"]?>" data-cpcolor="#c20000"></span>
                                                <div class="review-point"><?php echo $dadosJogos2["jogoGlobalRating"]?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bp-text" style="width: 100%">
                                        <h5 style="font-size: 22px"><strong><a href="Listajogo.php?id=<?php echo $dadosJogos2["jogoId"]?>"><?php echo $dadosJogos2["jogoNome"]?></a></strong></h5>
                                    </div>
                                </div>
                                <?php
                                $i = $i + 1;
                            }
                            ?>

                        </div>
                    </div>
                </div>



                <!-- NOSSAS ESCHOlHAS -->
                <div class="col-lg-4 col-md-8">
                    <div class="editor-choice">
                        <div class="section-title" style="margin-left: 30px">
                            <h5>As nossas Escolhas:</h5>
                        </div>

                    <?php
                    while ($dadosNoticias2=mysqli_fetch_array($result_2)){
                    ?>
                        <div class="ec-item">
                            <div class="lp-item">
                                <a href="ListaJogo.php?id=<?php echo $dadosNoticias2['jogoId']?>"> <div class="lp-pic set-bg" data-setbg="img/<?php echo $dadosNoticias2["reviewImagemURL"] ?>" style="border-radius: 10px">
                                </div></a>
                                <div class="lp-text">
                                    <h5><a href="ListaJogo.php?id=<?php echo $dadosNoticias2['jogoId']?>"><?php echo $dadosNoticias2['jogoNome']?></a></h5>
                        </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Update News Section End -->


<?php
bottom();
?>