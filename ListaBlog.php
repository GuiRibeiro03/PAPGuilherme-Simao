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
    <section class="details-hero-section set-bg" data-setbg="img/<?php echo $dados["noticiaImagemFundoURL"]?>" style="height: 70%; width: 100%">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="details-hero-text" style="">
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


    <!--Mais noticias -->
    <div class="" style="float: right; margin-top: 20px">
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
                        <a href="ListaBlog.php?id=<?php echo $dados2["noticiaId"]?>"><img src="img/<?php echo $dados2["noticiaImagemFundoURL"]?>" style="height: 140px; width: 180px" alt=""></a>
                    </div>
                    <div class="ti-text" style="width: 40%">
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





    <!-- Details Post Section Begin -->
    <section class="details-post-section spad" style="width: 100%">
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="details-text">
                        <div class="dt-item">
                            <p> <?php echo $dados["noticiaDesenvolvimento"]?> </p>
                        </div>

                        <div class="dt-last-desc">
                            <img src="img/<?php echo $dados["noticiaImagemURL"] ?>" alt="" style="height: 60%; width: 50%;">
                        </div>
                        <div class="dt-tags">
                            <a href="blog.php"><span><?php ?></span></a>
                            <a href="blog.php"><span>PC</span></a>
                            <a href="blogTagExemplo.html"><span>Playstation</span></a>
                            <a href="blog.php"><span>CD Projekt Red</span></a>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </section>
                        <!-- ***********************************Comentários section******************************-->

<div id="comentarios">

</div>

    <!-- Details Post Section End -->

    <!-- Footer Section Begin -->
<?php
bottom();
?>