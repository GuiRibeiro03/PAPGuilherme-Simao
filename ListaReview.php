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
                                                    <div style="margin-right:10px; margin-top: 10px"><?php echo $dados['jogoGlobalRating']?></div>
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
                                                    <div style="padding-left: 10px; padding-top: 10px"><?php echo $dados['jogoUserRating']?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                        <div class="dt-quote">
                            <div style="color: white">
                                <span><b>Simão Bercial</b></span>
                                <span style="float: right"><b>17/11/2020</b></span>
                                <p style="font-size: 30px;margin-top: 15px"><span style="color: lawngreen">90%</span></p>

                            </div>
                            <hr>
                            <br>
                            <p>Embora muito divertido. Parecia que eu já tinha jogado o jogo. A história era boa.
                                Mas às vezes a jogabilidade me deixava querendo. O websling foi maravilhoso,
                                mas ir para os marcadores parecia uma rotina. Particularmente com as missões secundárias que
                                parecem muito decepcionantes, raramente com algum conteúdo interessante envolvido.
                                Apenas os dois vilões principais pareciam uma ameaça válida, deixando os outros facilmente derrotados,
                                mesmo estando em maior número do que você.</p>

                            <p>  Eu sinto que houve muito trabalho em algumas áreas,
                                e não muito em outras, o que me deixou ignorando o conteúdo paralelo depois de um ponto
                                e apenas navegando pela história principal. Eu gostei do meu tempo com o jogo e ficarei feliz
                                em ver como a inevitável sequência o melhora, mas não acho que voltarei para limpar a cidade do pós-jogo.</p>
                            <br>
                            <div class="row" style="margin-left: 5px">

                                <span  id="btnLike" onclick="countClicks(this)" class="fa fa-thumbs-up text-secondary" style="font-size: 20px; margin-right: 5px"></span>
                                <span  id="btnDislike" onclick="countClicks2(this)" class="fa fa-thumbs-down text-secondary" style="font-size: 20px; margin-left: 5px"></span></div>
                        </div>

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

                        <div class="dt-leave-comment" >

                            <span style="font-size: 30px; color: #FFFFFF"> &nbsp;<strong>Deixa um comentário:</ strong</span>
                            <form action="#" style="padding-top: 20px" >
                                <div class="input-list" >
                                    <input type="number" placeholder="Rating" style="width: 100px; color: #FFFFFF;">
                                </div>
                                <textarea required spellcheck="true"  rows="100" placeholder="Message" style="color: #FFFFFF;  "></textarea>
                                <button type="submit">Submeter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Details Post Section End -->
<script>

    localStorage.clickCount = localStorage.clickCount || 0;
    localStorage.clickCount2 = localStorage.clickCount2 || 0;

    function countClicks() {
        localStorage.clickCount++;
        document.getElementById("btnLike").innerHTML = "&nbsp;&nbsp;" + localStorage.clickCount ;
    }
    function countClicks2() {
        localStorage.clickCount2++;
        document.getElementById("btnDislike").innerHTML =  "&nbsp;&nbsp;" + localStorage.clickCount2 ;
    }
</script>
    <!-- Footer Section Begin -->
<?php
bottom();
?>