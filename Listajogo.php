<?php
include_once ("includes/bodyBase.inc.php");

top();
$id=intval($_GET['id']);



$sql="select jogos.*, empresaNome, IFNULL(reviewGlobalRating,'N/A') as reviewGlobalRating
     , IFNULL(reviewUserRating,'N/A') as reviewUserRating from jogos  
    inner join empresas on jogoEmpresaId=empresaId 
    left join reviews on jogoId=reviewJogoId
    where jogoId=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);


?>


    <section class="store" style="margin-left: 15%">
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><button type="button" class="btn btn-light"><i class="arrow_back"></i>&nbsp;Voltar</button></a>

    </div>
        <br>
        <br>
        <div class="row" style="width: 100%">
            <div class="container" style="width: 20%";>
            <div class="card">
                <img src="img/<?php echo $dados["jogoImagemURL"] ?>" style="height: 500px"  class="card-img-top" alt="...">

                </div>

            </div>

            <div class="card-body" >
                <div> <h3 style=" padding-top:20px "><strong><?php echo $dados["jogoNome"] ?></strong></h3></div>
                <br>
                <br>
                <h3 class="card-title"><strong><span ><?php echo $dados["jogoPreco"] ?>€</span></strong> </h3>
                <a onclick="adicionaCarrinho(<?php echo $id ?>)"  style="color: #dc3545;">
                <input type="submit" class="btn btn-danger  cart-button" value="Adicionar ao Carrinho"></a>

            </div>







    </section>
<section class="store" >
    <div style="height: 80%; width: 80%; border: 1px #FFFFFF; background-color: black; padding: 10px 50px; color: #FFFFFF; font-size: 25px; margin-top: 200px; margin-bottom: 200px; margin-left: 10%">
        <h2>Acerca do jogo:</h2>
        <hr>
        <div class="row" style="margin-left: 20%">
            <div class="details-text" >
                <div class="dt-overall-rating">
                    <div style="color: #FFFFFF; font-size: 30px; padding-left: 10px;"><strong><span >Resultado Global:</span></strong></div>
                    <div class="or-heading">
                        <div class="or-item" style="padding-left: 150px">
                            <div class="or-loader">

                                <div class="loader-circle-wrap">
                                    <div class="loader-circle">
                                        <span class="circle-progress-2" data-cpid="circle1" data-cpvalue="<?php echo $dados['reviewGlobalRating']?>"  data-cpcolor="#4bcf13"></span>
                                        <div class="review-point">
                                            <span style="padding-left: 5px; color: #FFFFFF">Global Rating:</span>
                                            <div style="font-size: 50px; text-align: center"><?php if( $dados['reviewGlobalRating'] != 'N/A'){ echo $dados['reviewGlobalRating']."<span style='font-size: 50px; text-align: center; color:#FFFFFF;'>%</span>";   }else{ echo "N/A"; } ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="or-loader">

                                <div class="loader-circle-wrap">
                                    <div class="loader-circle">
                                        <span class="circle-progress-2" data-cpid="circle2" data-cpvalue="<?php echo $dados['reviewUserRating']?>"  data-cpcolor="#c20000"></span>
                                        <div class="review-point">
                                            <span style="padding-left: 10px; color: #FFFFFF">User Rating:</span>
                                            <div style="font-size: 50px; text-align: center"><?php if( $dados['reviewUserRating'] != 'N/A'){ echo $dados['reviewUserRating']."<span style='font-size: 50px; text-align: center; color:#FFFFFF;'>%</span>%</span>";   }else{ echo "N/A"; } ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
            <div style=" text-align: center; max-width: 1800px;!important; min-width: 400px;!important; height: auto;!important; " >
                <?php echo $dados["jogoTrailer"] ?>
            </div>
        <hr>
        <div>
            <h3>Resumo:</h3>
            <?php echo $dados["jogoSinopse"] ?>
        </div>
        <hr>
        <?php
        $con=mysqli_connect("localhost","root","","pap2021gameon");

        $sql1="SELECT * FROM jogos
                inner join jogogeneros on jogoId=jogoGeneroJogoId 
                inner join jogoplataformas on jogoId=jogoPlataformaJogoId
                inner join generos on jogoGeneroGeneroId=generoId
                inner join plataformas on jogoPlataformaPlataformaId=plataformaId
                where jogoId=".$id;

        $result1=mysqli_query($con,$sql1);
        $dados1=mysqli_fetch_array($result1);
        ?>
        <div class="row" style="width: 100%; text-align: center; margin-left: 10%">
            <h4 style="margin-left: 30px">Empresa:</h4><span>&nbsp;<?php echo $dados["empresaNome"] ?></span>
            <h4 style="margin-left: 30px">Género: </h4><span>&nbsp;<?php echo $dados1["generoNome"] ?></span>
            <h4 style="margin-left: 30px">Plataforma: </h4><span>&nbsp;<?php echo $dados1["plataformaNome"] ?></span>
        </div>
    </div>
    </section>
<?php
bottom();
?>