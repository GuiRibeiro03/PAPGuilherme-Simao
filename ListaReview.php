<?php
include_once ("includes/bodyBase.inc.php");
top();
$con=mysqli_connect("localhost", "root","","pap2021gameon");
$id=intval($_GET['id']);
$sql="select * from reviews inner join jogos on jogoId = reviewJogoId where reviewId=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
?>

    <!-- Details Hero Section Begin -->
    <section class="details-hero-section set-bg" data-setbg="<?php echo $dados['reviewImagemURL']?>">
        <div class="container">
            <div class="row">
                    <div class="details-hero-text">
                        <div class="label"><span>Análise</span></div>
                        <h1 style="text-shadow: 2px 2px 0px #FF0000;"><?php echo $dados['jogoNome']?></h1>
                        <ul>
                            <li><span><?php echo $dados['reviewAutor']?></span></li>
                            <li><i class="fa fa-clock-o"></i> <?php echo $dados['reviewData']?></li>

                        </ul>
                    </div>

            </div>
        </div>
    </section>
    <!-- Details Hero Section End -->

    <!-- Details Post Section Begin -->
    <section class="details-post-section" >
        <div class="container">
            <div class="row">
                    <div class="details-text" >

                        <div style="color: white; font-size: 20px;">
                            <span style="color: white;"><b>Analista:</b></span>
                            <span><?php echo $dados['reviewAutor']?>   |</span>
                            &nbsp;
                            <span><?php echo $dados['reviewData']?></span>
                        </div>
<br>
                        <div class="dt-desc">
                            <p style="font-size: 16px;"><?php echo $dados['reviewTexto']?></p>
                        </div>
                        <div class="dt-overall-rating">
                            <div style="color: #FFFFFF; font-size: 40px; margin-left: 40%;"><strong><span><strong>RESULTADOS</strong></span></strong></div>
                            <hr>
                            <div class="or-heading">
                                <div class="or-item" style="margin-left: 30%">
                                    <div class="or-loader" >

                                        <div class="loader-circle-wrap">
                                            <div class="loader-circle">
                                                <span class="circle-progress-2" data-cpid="circle1" data-cpvalue="<?php echo $dados['jogoGlobalRating']?>"  data-cpcolor="#4bcf13"></span>
                                                <div class="review-point">
                                                    <span style="padding-left: 10px; color: #FFFFFF">Global Rating:</span>
                                                    <div style="margin-right:10px; margin-top: 10px; font-size: 70px"><?php echo $dados['jogoGlobalRating']?>%</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="or-loader">

                                        <div class="loader-circle-wrap">
                                            <div class="loader-circle">
                                                <span class="circle-progress-2" data-cpid="circle2" data-cpvalue="<?php echo $dados['jogoUserRating']?>"  data-cpcolor="#c20000"></span>
                                                <div class="review-point">
                                                    <span style="padding-left: 10px; color: #FFFFFF">User Rating:</span>
                                                    <div style="padding-left: 10px; padding-top: 10px; font-size: 70px"><?php echo $dados['jogoUserRating']?>%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>

                        <!-- ***********************************Comentários section******************************-->

                        <?php
                        $sql="select * from comentarios inner join perfis on comentarioPerfilId=perfilid where comentarioEntidade like 'review' and comentarioEntidadeId=$id order by comentarioData desc";
                        $resultComents=mysqli_query($con,$sql);
                        $i=0;
                        while ($dadosComents=mysqli_fetch_array($resultComents)){
                        ?>

                        <div class="dt-quote">
                            <div style="color: white;">
                                <span><b><?php echo $dadosComents["perfilNome"]?></b></span>
                                <span style="float: right"><b><?php echo $dadosComents["comentarioData"]?></b></span>
                            </div>
                            <hr>
                            <br>
                            <p><?php echo $dadosComents["comentarioTexto"]?></p>

                            <div class="row" style="margin-left: 5px">

                                <span  id="btnLike" onclick="countClicks(this)" class="fa fa-thumbs-up text-secondary" style="font-size: 20px; margin-right: 5px"></span>
                                <span  id="btnDislike" onclick="countClicks2(this)" class="fa fa-thumbs-down text-secondary" style="font-size: 20px; margin-left: 5px"></span></div>
                        </div>
                        <?php
                          }
                        ?>


                        <?php
                        if(isset($_SESSION['id'])){
                        ?>

                        <div class="dt-leave-comment" >

                            <span style="font-size: 30px; color: #FFFFFF"> &nbsp;<strong>Deixa um comentário:</strong> </span>
                            <form action="Confirma/ConfirmaAdicionaComentarioReview.php?id=<?php echo $id?>" style="padding-top: 20px" method="post">
                                <input type="datetime-local" name="comentarioData" style="margin-bottom: 20px">
                                <textarea required spellcheck="true" name="comentarioTexto"  rows="100" placeholder="Message" style="color: #FFFFFF; font-size: 17px"></textarea>
                                <input type="hidden" name="comentarioEntidade" value="review">
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

                        <br>
                        <div class="dt-tags">
                            &nbsp;
                            &nbsp;
                            <a href="#"><span id="tag1">Gaming</span></a>
                            <a href="#"><span id="tag2">Platform</span></a>
                            <a href="#"><span id="tag3">Playstation</span></a>
                            <a href="#"><span id="tag4">Marvel</span></a>
                        </div>
                        <div class="dt-share">
                            <div class="ds-title">Partilha:</div>
                            <div class="ds-links">

                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Details Post Section End -->







    <div id="id01" class="modal">

        <form class="modal-content animate" action="confirmaLogin.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="img/Game.png">
            </div>
            <div class="container">
                <select name="utilizador" >
                    <option value="-1">Utilizador...</option>
                    <?php
                    $con=mysqli_connect("localhost","root","","pap2021gameon");
                    $sql="select * from users";
                    $res = mysqli_query($con,$sql);
                    while ($dados=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $dados['userId'] ?>"><?php echo $dados['userName'] ?></option>

                        <?php
                    }
                    ?>
                </select>
                <input type="submit" class="btn btn-danger" value="Entrar">
                <hr>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
                <span class="password">Esqueces-te da <a href="#" style="color: #00aff1">&nbsp;password?</a></span>
            </div>
        </form>
    </div>
    <!-- Footer Section Begin -->
<?php
bottom();
?>