<?php
include_once ("includes/bodyBase.inc.php");
top();

$id=intval($_GET["id"]);
$con = mysqli_connect("localhost", "root", "","pap2021gameon");
$sql="select * from noticias where noticiaId=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);



$sql2="select * from noticias";
$result2=mysqli_query($con,$sql2);
$dados2=mysqli_fetch_array($result2);
?>
    <!-- Details Hero Section Begin -->
    <section class="details-hero-section set-bg" data-setbg="img/<?php echo $dados["noticiaImagemFundoURL"]?>">
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
        </div>
    </section>
    <!-- Details Hero Section End -->

    <!-- Details Post Section Begin -->
    <section class="details-post-section spad" >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="details-text">
                        <div class="dt-item">
                            <p> <?php echo $dados["noticiaDesenvolvimento"]?> </p>
                        </div>

                        <div class="dt-last-desc">
                            <img src="img/<?php echo $dados["noticiaImagemURL"] ?>" alt="">
                        </div>
                        <div class="dt-tags">
                            <a href="blog.php"><span><?php ?></span></a>
                            <a href="blog.php"><span>PC</span></a>
                            <a href="blogTagExemplo.html"><span>Playstation</span></a>
                            <a href="blog.php"><span>CD Projekt Red</span></a>
                        </div>
                        <div class="dt-share">
                            <div class="ds-title">Sociais</div>
                            <div class="ds-links">
                                <div class="ds-links">

                                    <span id="btnLike" onclick="countClicks(this)" class="fa fa-thumbs-up text-danger"></span>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                </div>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="dt-related-post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="#" class="rp-prev">
                                        <span>Anterior</span>
                                        <div class="rp-pic">
                                            <img src="img/details/prev.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="blog2.html" class="rp-next">
                                        <span>Próximo</span>
                                        <div class="rp-pic">
                                            <img src="img/details/next.jpg" alt="">
                                        </div>
                                        <div class="rp-text">
                                            <h6>Watch dogs legion decepciona</h6>
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                                <li><i class="fa fa-comment-o"></i> 20</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dt-author">
                            <div class="da-pic">
                                <img src="img/pessoas/bacano1.jpg" alt="">
                            </div>
                            <div class="da-text">
                                <h5>João Abilio</h5>
                                <p>Editor para o site Game ON e entusiasta de gaming</p>
                                <div class="da-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="dt-comment">
                            <h4>Comentários</h4>
                            <div class="dc-item">
                                <div class="dc-pic">
                                    <img src="img/pessoas/bacano2.jpg" alt="">
                                </div>
                                <div class="dc-text">
                                    <h5>André Bandeira</h5>
                                    <span class="c-date">15 Aug 2017</span>
                                    <p>Estou farto de esperar!!!! Quero o jogo agora!!</p>
                                    <a href="#" class="reply-btn"><span>Responder</span></a>
                                </div>
                            </div>
                            <div class="dc-item reply-item">
                                <div class="dc-pic">
                                    <img src="img/pessoas/bacano3.jpg" alt="">
                                </div>
                                <div class="dc-text">
                                    <h5>Ana Barros</h5>
                                    <span class="c-date">15 Aug 2017</span>
                                    <p>Podemos ter que esperar mas o jogo irá ficar mais completo quanto mais esperarmos, por isso apressar os desenvolvedores não é uma boa ideia!!!</p>
                                    <a href="#" class="reply-btn"><span>Responder</span></a>
                                </div>
                            </div>
                            <div class="dc-item">
                                <div class="dc-pic">
                                    <img src="img/pessoas/bacano4.jpg" alt="">
                                </div>
                                <div class="dc-text">
                                    <h5>Eduardo Ferreira</h5>
                                    <span class="c-date">15 Aug 2017</span>
                                    <p>Espero que o jogo não saia incompleto e com inúmeros bugs, não quero esperar mas jogar um jogo incompleto não é divertido.</p>
                                    <a href="#" class="reply-btn"><span>Responder</span></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="dt-leave-comment">
                            <h4>Deixa um comentário</h4>
                            <form action="#">
                                <textarea placeholder="Mensagem...  "></textarea>
                                <button type="submit">Submeter</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7">
                    <div class="sidebar-option">

                        <div class="hardware-guides">
                            <div class="section-title">
                                <h5>Mais noticias</h5>
                            </div>
                            <?php
                            while($dados2=mysqli_fetch_array($result2)){
                            ?>
                            <div class="trending-item">
                                <div class="ti-pic">
                                    <img src="img/<?php echo $dados["noticiaImagemFundoURL"]?>" style="height: 80px; width: 80px" alt="">
                                </div>
                                <div class="ti-text">
                                    <h6><a href="ListaBlog.php?id=<?php echo $dados["noticiaId"]?>"><?php echo $dados["noticiaTitulo"]?></a>
                                    </h6>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i><?php echo $dados["noticiaData"]?></li>

                                    </ul>
                                </div>
                            </div>
                           <?php
                            }
                           ?>
                        <div class="hardware-guides">
                            <div class="section-title">
                                <h5>Contacte um administrador</h5>
                            </div>
                            <div class="trending-item">
                                <div class="ti-text">
                                    <ul>
                                        <li><i class="fa fa-envelope"></i>simaobercial80@gmail.com <br>
                                            <i class="fa fa-phone"></i>914064958</li>
                                    </ul>
                                    <br>
                                    <ul>
                                        <li><i class="fa fa-envelope"></i>guilhas.ribeiro23@yahoo.com <br>
                                            <i class="fa fa-phone"></i>227tiratirametemete</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Details Post Section End -->

    <!-- Footer Section Begin -->
<?php
bottom();
?>