<?php
include_once("../includes/body.inc.php");

$con=mysqli_connect("localhost", "root","","pap2021gameon");
$txt=addslashes($_POST['txt']);
$sql="select * from reviews inner join jogos on jogoId = reviewJogoId where jogoNome like '%$txt%' ";

$result=mysqli_query($con,$sql);

?>



<section class="store" style="height: 100%; width: 100%;  text-align: center; margin-bottom: 5%;margin-top: 5%">

        <div class="row" style="height: 100%; width: 100%;  text-align: center">

            <?php
            $i = 0;
            while ($dados=mysqli_fetch_array($result)){
            ?>
            <div class="lp-item">
                <a href="ListaReview.php?id=<?php echo $dados['reviewId']?>"><img src="<?php echo $dados["reviewImagemURL"] ?>" style="border-radius: 10px">

                    </img></a>
                <div class="lp-text">
                    <h6><a href="ListaReview.php?id=<?php echo $dados['reviewId']?>" style="color: white"><?php echo $dados['jogoNome']?></a></h6>
                    <ul>
                        <li><i class="fa fa-clock-o"></i> <?php echo $dados['reviewData']?> &nbsp;
                            <i class="fa fa-comment"></i>
                            <?php
                            $sql2="select count(comentarioId) as num1 from comentarios where comentarioEntidadeId=".$dados['reviewId'];
                            $result2=mysqli_query($con,$sql2);
                            $dados2=mysqli_fetch_array($result2);

                            echo $dados2["num1"] ?> </li>
                    </ul>
                </div>
            </div>
            <?php
            $i = $i + 1;
            }
            ?>




        </div>

</section>
