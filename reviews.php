<?php
include_once("includes/bodyBase.inc.php");
top();
$con=mysqli_connect("localhost", "root","","pap2021gameon");
$sql="select * from reviews  inner join jogos on jogoId = reviewJogoId";
$result=mysqli_query($con,$sql);
?>



<section class="store" style="height: auto; width: auto; ">

        <div class="row" style="position: center;!important;">

            <?php
            $i = 0;
            while ($dados=mysqli_fetch_array($result)){
            ?>
            <div class="lp-item">
                <a href="ListaReview.php?id=<?php echo $dados['reviewId']?>"><div class="lp-pic set-bg"  data-setbg="<?php echo $dados["reviewImagemURL"] ?>" style="border-radius: 10px">
                        <div class="review-loader">
                            <div class="loader-circle-wrap">
                                <div class="loader-circle">
                                            <span class="circle-progress" data-cpid="id<?php echo $i+1?>" data-cpvalue="<?php echo $dados['jogoGlobalRating']?>"
                                                  data-cpcolor="#4bcf13"></span>
                                    <div class="review-point"><strong><?php echo $dados['jogoGlobalRating']?></strong></div>
                                </div>
                            </div>
                        </div>
                    </div></a>
                <div class="lp-text">
                    <h6><a href="ListaReview.php?id=<?php echo $dados['reviewId']?>" style="color: white"><?php echo $dados['jogoNome']?></a></h6>
                    <ul>
                        <li><i class="fa fa-clock-o"></i> <?php echo $dados['reviewData']?> </li>
                    </ul>
                </div>
            </div>
            <?php
            $i = $i + 1;
            }
            ?>




        </div>

</section>

<?php
bottom();
?>
