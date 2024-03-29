<?php
include_once("includes/bodyBase.inc.php");
top();

$con = mysqli_connect("localhost", "root", "", "pap2021gameon");
$sql = "select * from noticias where noticiaEscolha like 'sim' order by noticiaId desc ";
$sql_2 = "select * from jogos inner join reviews on jogoId=reviewJogoId where reviewGlobalRating=100 order by jogoId desc limit 3 ";
$sqlJogos = "select * from jogos inner join reviews on jogoId=reviewJogoId where reviewGlobalRating >= 70 order by reviewGlobalRating desc ";
$sql2_2 = "select * from jogos  where jogoDestaque LIKE 'sim' order by jogoId desc ";
$sql3 = "select * from reviews";
$result = mysqli_query($con, $sql);
$result_2 = mysqli_query($con, $sql_2);
$result2 = mysqli_query($con, $sqlJogos);
$result2_2 = mysqli_query($con, $sql2_2);
$result4 = mysqli_query($con, $sql3);


?>


    <!-- Update News Section Begin -->
    <section class="update-news-section">
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
                                    <div class="un-slider owl-carousel">
                                        <?php
                                        while ($dadosNoticias = mysqli_fetch_array($result)) {
                                            ?>
                                            <div class="col-lg-12" style="outline-color: red; outline-width: 2px">
                                                <div class="un-big-item set-bg"
                                                     data-setbg="img/<?php echo $dadosNoticias["noticiaImagemFundoURL"] ?>"
                                                     style="border-radius: 10px; ">

                                                    <div class="ub-text">
                                                        <h4 style=" color: white;  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                                                            <a href="ListaBlog.php?id=<?php echo $dadosNoticias["noticiaId"] ?>"><?php echo $dadosNoticias["noticiaTitulo"] ?></a>
                                                        </h4>
                                                        <ul>
                                                            <li style="color:#FFF; font-size: 13px">by
                                                                <span>Admin</span></li>
                                                            <li style="color:#FFF; font-size: 13px"><i
                                                                        class="fa fa-clock-o"></i> <?php echo $dadosNoticias["noticiaData"] ?>
                                                            </li>
                                                            <li style="color:#FFF; font-size: 13px"><i
                                                                        class="fa fa-comment"></i>
                                                                <?php
                                                                $sql2 = "select count(comentarioId) as num1 from comentarios where comentarioEntidadeId=" . $dadosNoticias['noticiaId'];
                                                                $result7 = mysqli_query($con, $sql2);
                                                                $numComentarios = mysqli_fetch_array($result7);

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
                <div class="lp-slider owl-carousel" style="background-color: black; height: auto; border-radius: 1%">
                    <?php
                    $i = 0;
                    while ($dadosJogos = mysqli_fetch_array($result2_2)) {

                        ?>



                        <div class="row-cols-lg-1">
                            <div class="card" style="width: 21rem; height: 100%; padding: 10px; background-color: black; ">
                                <a href="Listajogo.php?id=<?php echo $dadosJogos["jogoId"] ?>"><img src="img/<?php echo $dadosJogos["jogoImagemURL"] ?>" class="card-img-top" alt="..." style="height: 400px"></a>


                                <div class="card-body" style="margin-bottom: 20px">
                                    <a href="Listajogo.php?id=<?php echo $dadosJogos["jogoId"] ?>">
                                        <h6 style="height: 27px" id="titulo" class="card-title" ><strong><?php echo $dadosJogos["jogoNome"]?></strong></h6></a>

                                </div>

                                <div class="card-text" style="margin: 3%;">
                                    <h5  class="card-text"><strong><?php echo $dadosJogos["jogoPreco"]?>€</strong></h5>
                                </div>

                                <div id="altura">
                                    <a onclick="adicionaCarrinho(<?php echo $dadosJogos['jogoId']?>)"  style="color: #dc3545; ">
                                        <input type="submit" class="cart-button" value="Adicionar ao Carrinho" style="font-weight: bold; height: 50px"></a>
                                </div>
                            </div>
                        </div>




                        <?php
                    }
                    ?>




                </div>
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
                            while ($i < 5 && $dadosJogos2 = mysqli_fetch_array($result2)) {

                                ?>
                                <?php if($dadosJogos2["reviewGlobalRating"] != 100){?>
                                <div class="bp-item">
                                    <div class="bp-loader">
                                        <div class="loader-circle-wrap">
                                            <div class="loader-circle">
                                                <span class="circle-progress-1" data-cpid="id-<?php echo $i + 1 ?>"
                                                      data-cpvalue="<?php echo $dadosJogos2["reviewGlobalRating"] ?>"
                                                      data-cpcolor="#c20000"></span>

                                                <div class="review-point"><?php echo $dadosJogos2["reviewGlobalRating"] ?>%</div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="bp-text">
                                        <span  style="font-size: 21px"><strong><a href="Listajogo.php?id=<?php echo $dadosJogos2["jogoId"] ?>"><?php echo $dadosJogos2["jogoNome"] ?></a></strong>
                                        </span>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>


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
                            while ($i < 5 && $dadosJogos2 = mysqli_fetch_array($result2)) {

                                ?>

                                <?php if($dadosJogos2["reviewGlobalRating"] != 100){?>
                                <div class="bp-item">
                                    <div class="bp-loader">
                                        <div class="loader-circle-wrap">
                                            <div class="loader-circle">
                                                <span class="circle-progress-1" data-cpid="id-<?php echo $i + 1 ?>"
                                                      data-cpvalue="<?php echo $dadosJogos2["reviewGlobalRating"] ?>"
                                                      data-cpcolor="#c20000"></span>

                                                    <div class="review-point"><?php echo $dadosJogos2["reviewGlobalRating"] ?>%</div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="bp-text">
                                        <span style="font-size: 21px" ><strong><a href="Listajogo.php?id=<?php echo $dadosJogos2["jogoId"] ?>"><?php echo $dadosJogos2["jogoNome"] ?></a></strong>
                                        </span>
                                    </div>
                                </div>

                                    <?php
                                }
                                ?>
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
                        while ($dadosNoticias2 = mysqli_fetch_array($result_2)) {
                            ?>
                            <div class="ec-item">
                                <div class="lp-item">
                                    <a href="ListaJogo.php?id=<?php echo $dadosNoticias2['jogoId'] ?>">
                                        <div class="lp-pic set-bg"
                                             data-setbg="img/<?php echo $dadosNoticias2["reviewImagemURL"] ?>"
                                             style="border-radius: 10px">
                                        </div>
                                    </a>
                                    <div class="lp-text">
                                        <h5>
                                            <a href="ListaJogo.php?id=<?php echo $dadosNoticias2['jogoId'] ?>"><?php echo $dadosNoticias2['jogoNome'] ?></a>
                                        </h5>
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