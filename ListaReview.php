<?php
include_once ("includes/bodyBase.inc.php");
top();
$con=mysqli_connect("localhost", "root","","pap2021gameon");
$id=intval($_GET['id']);
$sql="select * from reviews inner join jogos on jogoId = reviewJogoId where reviewId=".$id;


$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
?>




    <!-- Details Hero Section End -->

    <!-- Details Post Section Begin -->
    <section class="details-post-section" style="margin-left: auto; margin-top: 3%">
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="margin-left: 2%"><button type="button" class="btn btn-light"><i class="arrow_back"></i>&nbsp;Voltar</button></a>
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
        <div class="container"  ">
            <div class="row">
                    <div class="details-text"  style="width: 100%">

                        <div class="dt-desc" style="margin-top: 5%; margin-bottom: 5%; ">
                            <p style="font-size: 16px;"><?php echo $dados['reviewTexto']?></p>
                        </div>


                        <div class="dt-overall-rating">
                            <div style="color: #FFFFFF; font-size: 40px; margin-left: 40%;"><strong><span><strong>RESULTADOS</strong></span></strong></div>
                            <hr>
                            <div class="or-heading">
                                <div class="or-item" style="margin-left: 30%">
                                    <div class="or-loader" >

                                        <div class="loader-circle-wrap" style="border-radius: 50%">
                                            <div class="loader-circle" >
                                                <span class="circle-progress-2" data-cpid="circle1" data-cpvalue="<?php echo $dados['jogoGlobalRating']?>"  data-cpcolor="#4bcf13" ></span>
                                                <div class="review-point" >
                                                    <span style="padding-left: 10px; color: #FFFFFF">Global Rating:</span>
                                                    <div style="margin-right:10px; margin-top: 10px; font-size: 50px"><?php echo $dados['jogoGlobalRating']?>%</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="or-loader">

                                        <div class="loader-circle-wrap" style="border-radius: 50%">
                                            <div class="loader-circle">
                                                <span class="circle-progress-2" data-cpid="circle2" data-cpvalue="<?php echo $dados['jogoUserRating']?>"  data-cpcolor="#c20000"></span>
                                                <div class="review-point">
                                                    <span style="padding-left: 10px; color: #FFFFFF">User Rating:</span>
                                                    <div style="padding-left: 10px; padding-top: 10px; font-size: 50px"><?php echo $dados['jogoUserRating']?>%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<hr>
                                <div style=" text-align: center; max-width: 1920px;!important; min-width: 400px;!important; height: auto;!important; " >
                                    <?php echo $dados["jogoTrailer"] ?>
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

                        <div class="dt-quote" style="width: 100%; margin-top: 10%">

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
                            <form action="Confirma/ConfirmaAdicionaComentarioReview.php?id=<?php echo $id?>" style="padding-top: 20px" method="post">
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
                            <?php

                            $con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
                            $sql2="select empresaNome,generoNome,plataformaNome from jogos 

										inner join empresas on jogoEmpresaId=empresaId
										inner join jogogeneros on jogoId=jogoGeneroJogoId
										inner join generos on jogoGeneroGeneroId=generoId
										inner join jogoplataformas on jogoPlataformaJogoId=jogoId
										inner join plataformas on jogoPlataformaPlataformaId=plataformaId
                                        inner join reviews on reviewJogoId=jogoId
																			
										 where jogoId=".$dados['jogoId'];


                            $res2=mysqli_query($con,$sql2);
                            while ($dados2=mysqli_fetch_array($res2)){

                            ?>


                            <a href="#"><span id="tag1"><?php echo $dados2['empresaNome'] ?></span></a>
                            <a href="#"><span id="tag2"><?php echo $dados2['generoNome'] ?></span></a>
                            <a href="#"><span id="tag3"><?php echo $dados2['plataformaNome'] ?></span></a>

                                <?php
                            }
                                ?>
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

        <form class="modal-content animate" action="confirmaLogin2.php" method="post">
            <div class="imgcontainer">
                <img src="img/Game.png">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">

                <div class="form-floating mb-3">
                    <label for="floatingInput"  id="userName" style="color: #FFF; background-color: #0d0d0d; border-radius: 4px;width: 180px; text-align: center"><b>Nome de Utilizador:</b></label>
                    <input type="text" class="form-control" id="floatingInput" name="nome"  required>
                </div>

                <div class="form-floating mb-3">
                    <label id="password" for="floatingInput" style="color: #FFF; background-color: #0d0d0d; border-radius: 4px; width: 130px; text-align: center"><b>Palavra-passe:</b></label>
                    <input type="password" class="form-control" id="floatingInput"   name="password" required>
                </div>
                <button type="submit" style="background-color: #FF0000; height: 45px; width: 100px"><strong>Login</strong></button>
                <hr>

            </div>

            <div class="container" style="background-color:#f1f1f1; color: #0d0d0d">
                <span class="password">Esqueci-me da <a href="editaPassword.php" style="color: #00aff1">palavra-passe?</a></span>
            </div>
        </form>
    </div>
    <!-- Footer Section Begin -->
<?php
bottom();
?>