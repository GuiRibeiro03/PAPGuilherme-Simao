<?php
include_once("includes/bodyBase.inc.php");
top();

$con=mysqli_connect("localhost", "root","","pap2021gameon");
$sql="select * from noticias";
$sql2="select * from jogos";
$sql3="select * from reviews";
$result=mysqli_query($con,$sql);
$result2=mysqli_query($con,$sql2);
$result3=mysqli_query($con,$sql2);
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
                                    <div class="un-slider owl-carousel">
                                        <div class="col-lg-12" >

                                    <?php
                                                while ($dadosNoticias=mysqli_fetch_array($result)){
                                        ?>
                                            <div class="un-big-item set-bg" data-setbg="img/wallpapers/<?php echo $dadosNoticias["noticiaImagemFundoURL"] ?>">

                                                <div class="ub-text" >
                                                    <div class="label"><span>Notícias</span></div>
                                                    <h4 style=" color: white;  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;"><a href="#"><?php echo $dadosNoticias["noticiaTitulo"]?></a></h4>
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
                    </div>
                </div>
            </div>

            <div class="row">
<?php
$i = 0;
while ($i < 4){
    $dadosJogos=mysqli_fetch_array($result2)
    ?>
                <div class="col-lg-3">
                    <div class="card" style="width: 300px; height:100%; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">
                        <img src="img/jogos/<?php echo $dadosJogos["jogoImagemURL"] ?>" class="card-img-top" alt="...">
                        <span class="badge badge-danger">Bom Negocio!</span>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dadosJogos["jogoNome"]?> &nbsp; <?php echo $dadosJogos["jogoPreco"]?>€</h5>
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
while ($i < 6){
    $dadosJogos2=mysqli_fetch_array($result3);
    $dadosReviews=mysqli_fetch_array($result4);
    ?>
                            <div class="bp-item">
                                <div class="bp-loader">
                                    <div class="loader-circle-wrap">
                                        <div class="loader-circle">
                                        <span class="circle-progress-1" data-cpid="id-1" data-cpvalue="<?php echo $dadosJogos2["jogoGlobalRating"]?>" data-cpcolor="#c20000"></span>
                                            <div class="review-point"><?php echo $dadosJogos2["jogoGlobalRating"]?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bp-text">
                                    <h6><a href="#"><?php echo $dadosJogos2["jogoNome"]?></a></h6>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> <?php echo $dadosReviews["reviewData"]?></li>
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
                            while ($i < 6){
                                $dadosJogos2=mysqli_fetch_array($result3);
                                $dadosReviews=mysqli_fetch_array($result4);
                                ?>
                                <div class="bp-item">
                                    <div class="bp-loader">
                                        <div class="loader-circle-wrap">
                                            <div class="loader-circle">
                                                <span class="circle-progress-<?php echo $i + 1?>" data-cpid="id-<?php echo $i + 1?>" data-cpvalue="<?php echo $dadosJogos2["jogoGlobalRating"]?>" data-cpcolor="#c20000"></span>
                                                <div class="review-point"><?php echo $dadosJogos2["jogoGlobalRating"]?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bp-text">
                                        <h6><a href="#"><?php echo $dadosJogos2["jogoNome"]?></a></h6>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i> <?php echo $dadosReviews["reviewData"]?></li>
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
                            <h5>As nossas escolhas:</h5>
                        </div>




                        <div class="ec-item">
                            <div class="lp-item">
                                <a href="criticaGOW.php"> <div class="lp-pic set-bg" data-setbg="img/reviewIMG/godofwar.jpg">
                                    <div class="review-loader">
                                        <div class="loader-circle-wrap">
                                            <div class="loader-circle">
                                            <span class="circle-progress" data-cpid="id2" data-cpvalue="100"
                                                  data-cpcolor="#4bcf13"></span>
                                                <div class="review-point">100</div>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                                <div class="lp-text">
                                    <h5><a href="criticaGOW.php">God Of War</a></h5>
                        </div>
                            </div>
                        </div>




                            <div class="lp-item">
                                <a href="criticaTLoU2.php"> <div class="lp-pic set-bg" data-setbg="img/reviewIMG/thelastofus2.jpg">
                                    <div class="review-loader">
                                        <div class="loader-circle-wrap">
                                            <div class="loader-circle">
                                            <span class="circle-progress" data-cpid="id3" data-cpvalue="95"
                                                  data-cpcolor="#4bcf13"></span>
                                                <div class="review-point">95</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lp-text">
                                    <h5><a href="criticaTLoU2.php">The Last of Us 2</a></h5>

                            </div></a>
                            </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Update News Section End -->


<?php
bottom();
?>