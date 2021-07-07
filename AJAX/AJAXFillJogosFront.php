<?php
include_once("../includes/body.inc.php");
$txt=addslashes($_POST['txt']);
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from jogos where jogoNome like '%$txt%' ";



$ord = 0;
if (isset($_GET['ord'])) {
    $ord = $_GET['ord'];
    if ($ord == 1) {
        $sql .= " order by jogoNome ASC";
    } elseif ($ord == 2)  {
        $sql .= " order by jogoId DESC";
    } elseif ($ord == 3)  {
        $sql .= " order by jogoPreco ASC";
    } elseif ($ord == 4)  {
        $sql .= " order by jogoPreco DESC";
    }

}



$result=mysqli_query($con,$sql);
?>



<section class="store" style="height:100%; padding-top: 40px; margin-left: 100px;  background-color: #0d0d0d;color: #FFFFFF">

    <div class="container" style="width: 300px; float: left; height: 100%; position:relative; ">

            <div class="row" style="width: 100%; outline: #5a6268; ">
                <div style="color: #FFFFFF; margin-bottom: 20%; width: 50%">
                    <h5><strong>Preço:</strong></h5>
                    <br>
                </div>
                <div style="color: #FFFFFF;margin-left: 40px; margin-bottom: 30px">
                    <h5><strong>Generos:</strong></h5>
                    <br>
                    <?php
                    $sqlGeneros="select * from generos order by generoNome";
                    $resultGeneros=mysqli_query($con,$sqlGeneros);
                    while ($dadosGeneros=mysqli_fetch_array($resultGeneros)){
                        ?>
                        <br>
                        <li class="list-group-item" >
                            <label class="form-check-label">
                            <div class="form-check">
                                <input type="checkbox" id="genero" class="form-check-input product_check" value="<?php echo $dadosGeneros["generoId"] ?>"> <?php echo $dadosGeneros["generoNome"] ?>
                            </div>
                            </label>
                        </li>
                        <br>
                        <?php
                    }
                    ?>
                </div>

                <div style="color: #FFFFFF; margin-left: 40px;margin-bottom: 30px">
                    <hr>
                    <h5><strong>Plataformas:</strong></h5>
                    <br>
                    <?php
                    $sqlPlataformas="select * from plataformas order by plataformaNome";
                    $resultPlataformas=mysqli_query($con,$sqlPlataformas);
                    while ($dadosPlataformas=mysqli_fetch_array($resultPlataformas)){
                        ?>
                        <br>
                    <li class="list-group-item" >
                        <label class="form-check-label">
                            <div class="form-check">
                        <input id="plataforma" type="checkbox" class="form-check-input product_check" value="<?php echo $dadosPlataformas["plataformaId"] ?>"> <?php echo $dadosPlataformas["plataformaNome"] ?>
                            </div>
                        </label>
                    </li>
                        <br>
                        <?php
                    }
                    ?>
                </div>

                <div style="color: #FFFFFF; margin-left: 40px;  margin-bottom: 30px;">
                    <hr>
                    <h5><strong>Empresas:</strong></h5>
                    <br>
                    <?php

                    $sqlEmpresas="select * from empresas order by empresaNome";
                    $resultEmpresas=mysqli_query($con,$sqlEmpresas);
                    while ($dadosEmpresas=mysqli_fetch_array($resultEmpresas)){
                        ?>
                        <br>
                        <li class="list-group-item" >
                            <label class="form-check-label">
                                <div class="form-check">
                        <input id="empresa" type="checkbox" class="form-check-input product_check" value="<?php echo $dadosEmpresas["empresaId"] ?>"> <?php echo $dadosEmpresas["empresaNome"] ?>
                </div>
                </label>
                </li>
                        <br>
                        <?php
                    }
                    ?>
                </div>
            </div>

    </div>





    <div class="row" style="margin-top: 2%">


        <?php
        $i=0;
        while ($dados=mysqli_fetch_array($result)){
            $i+=1;
            ?>


            <div id="content"  class="col-lg-4 col-md-3" style=" margin-bottom: 5%">

                <div  class="card" style="min-width: 15rem;max-width:21rem; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">

                    <a href="Listajogo.php?id=<?php echo $dados["jogoId"]?>"><img src="img/<?php echo $dados["jogoImagemURL"] ?>" class="card-img-top" alt="..." style="height: 400px"></a>

                    <div class="card-body">

                        <a href="Listajogo.php?id=<?php echo $dados["jogoId"] ?>"><h5 class="card-title"><?php echo $dados["jogoNome"] ?></h5></a>

                        <p class="card-text" style="font-size: 18px"><strong><?php echo $dados["jogoPreco"] ?>€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <a onclick="adicionaCarrinho(<?php echo $dados["jogoId"] ?>)"  style="color: #dc3545;">
                            <input type="submit" class="cart-button" value="Adicionar ao Carrinho" style="height: 50px; font-weight: bold"></a>
                    </div>

                </div>

            </div>

            <?php
        }

        ?>
    </div>


        <script type="text/javascript">
        $(document).ready(function(){

            $(".product_check").click(function (){

                var action = 'data';
                var genero = get_filter_text('genero');
                var plataforma = get_filter_text('plataforma');
                var empresa = get_filter_text('empresa');

            $.ajax({
                url:'action.php',
                method: 'post',
                data:{action:action,genero:genero,plataforma:plataforma,empresa:empresa},
                success:function (result){
                    $("#tableContent").html(result);

                    $("#textChange").text("Filtered Products");
                }

            })


            });


        function get_filter_text(text_id){
            var filterData= [];
            $('#'+text_id+':checked').each(function (){
                filterData.push($(this).val());
            });
            return filterData;
        }



        });


        </script>





</section>