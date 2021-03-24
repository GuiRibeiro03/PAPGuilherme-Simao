<?php
include_once("includes/bodyBase.inc.php");
top();

$con=mysqli_connect("localhost", "root","","pap2021gameon");
$sql2="select * from noticias";
$sql_2="select * from jogos inner join review on jogoId=reviewJogoId where jogoGlobalRating=100";
$sqlJogos="select * from jogos where jogoGlobalRating > 70";
$sql2_2="select * from jogos where jogoDestaque LIKE 'sim' ";
$sql3="select * from reviews";
$result=mysqli_query($con, $sql2);
$result_2=mysqli_query($con,$sql_2);
$result2=mysqli_query($con,$sqlJogos);
$result2_2=mysqli_query($con,$sql2_2);
$result4=mysqli_query($con,$sql3);
?>


    <!-- Update News Section Begin -->
    <section class="update-news-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h5><span>Notícias </span></h5>
                    </div>
                    <div class="tab-elem">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#news" role="tab">Noticias</a>
                            </li>
                        </ul><!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="news" role="tabpanel">
                                <div class="row">
                                    <div class="un-slider owl-carousel" >
                                        <?php
                                        while ($dadosNoticias=mysqli_fetch_array($result)){
                                            ?>
                                        <div class="col-lg-12" >
                                            <div class="un-big-item set-bg" data-setbg="img/<?php echo $dadosNoticias["noticiaImagemFundoURL"] ?>">

                                                <div class="ub-text" >
                                                    <div class="label"><span>Notícias</span></div>
                                                    <h4 style=" color: white;  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;"><a href="ListaBlog.php?id=<?php echo $dadosNoticias["noticiaId"] ?>"><?php echo $dadosNoticias["noticiaTitulo"]?></a></h4>
                                                    <ul>
                                                        <li>by <span>Admin</span></li>
                                                        <li><i class="fa fa-clock-o"></i> <?php echo $dadosNoticias["noticiaData"]?></li>
                                                        <li><i class="fa fa-comment-o"></i> 20</li>
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
                        <h5> PRODUTOS EM DESTAQUE:</h5>
                        <a href="backoffice/jogosBackoffice.php"> <button type="button" class="btn btn-primary" >Backoffice</button></a>
                    </div>
                </div>
            </div>

            <div class="row">
<?php
$i = 0;
while ($i < 4 && $dadosJogos=mysqli_fetch_array($result2_2)){

    ?>

                <div class="col-lg-3">
                    <div class="card" style="width: 300px; height:100%; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">
                        <a href="Listajogo.php?id=<?php echo $dadosJogos["jogoId"] ?>"><img src="img/<?php echo $dadosJogos["jogoImagemURL"] ?>" class="card-img-top" alt="..." style="height: 400px"></a>
                        <span class="badge badge-danger">Bom Negocio!</span>

                        <div class="card-body">
                            <a href="Listajogo.php?id=<?php echo $dadosJogos["jogoId"] ?>"><h4 class="card-title"><strong><?php echo $dadosJogos["jogoNome"]?></strong> &nbsp; </h4></a>
                                <h5  class="card-text"><?php echo $dadosJogos["jogoPreco"]?>€</h5>
                            <button class="btn btn-danger  cart-button" style="color: #dc3545"><strong>
                                <span class="add-to-cart" style="color: #FFFFFF">Adicionar ao Carrinho</span>
                                <span class="added" style="color: #FFFFFF">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                            </strong>
                            </button>

                            <script>
                                const cartButtons<?php echo $i + 1?>=document.querySelectorAll('.cart-button');
                                cartButtons<?php echo $i + 1?>.forEach(button => {
                                    button.addEventListener('click',cartClicker);
                                });

                                function cartClicker() {
                                    var cart=0;
                                    let button = this;
                                    button.classList.add('clicked');
                                    document.getElementById("bdg<?php echo $i + 1?>").innerHTML = cart + 1;
                                }
                            </script>

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

    <section class="instagram-post-section spad">
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
                                    <div class="bp-text">
                                        <h6><a href="Listajogo.php?id=<?php echo $dadosJogos2["jogoId"]?>"><?php echo $dadosJogos2["jogoNome"]?></a></h6>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i> </li>
                                        </ul>
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
                                    <div class="bp-text">
                                        <h6><a href="Listajogo.php?id=<?php echo $dadosJogos2["jogoId"]?>"><?php echo $dadosJogos2["jogoNome"]?></a></h6>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i> </li>
                                        </ul>
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
                        <div class="section-title">
                            <h5>Ultimas Notícias:</h5>
                        </div>

                    <?php
                    while ($dadosNoticias2=mysqli_fetch_array($result_2)){
                    ?>
                        <div class="ec-item">
                            <div class="lp-item">
                                <a href="ListaJogo.php?id=<?php echo $dadosNoticias2['jogoId']?>"> <div class="lp-pic set-bg" data-setbg="img/<?php echo $dadosNoticias2["reviewImagemURL"] ?>">
                                </div></a>
                                <div class="lp-text">
                                    <h6><a href="ListaJogo.php?id=<?php echo $dadosNoticias2['jogoId']?>"><?php echo $dadosNoticias2['jogoNome']?></a></h6>
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