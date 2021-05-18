<?php
include_once ('includes/config.inc.php');
$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
if(isset($_POST['action'])){
    $sql="select * from jogos 
    inner join jogogeneros on jogoId=jogoGeneroJogoId 
    inner join jogoplataformas on jogoId=jogoPlataformaJogoId 
where jogoEmpresaId != '' ";


    if(isset($_POST['genero'])){
        $genero = implode('","', $_POST['genero']);
        $sql.="AND  jogoGeneroGeneroId IN('".$genero."')";
    }if(isset($_POST['plataforma'])){
        $plataforma = implode('","', $_POST['plataforma']);
        $sql.="AND  jogoPlataformaPlataformaId IN('".$plataforma."')";
    }if(isset($_POST['empresa'])){
        $empresa = implode('","', $_POST['empresa']);
        $sql.="AND  jogoEmpresaEmpresaId IN('".$empresa."')";
    }


    $result = mysqli_query($con,$sql);
    $output='';

    if($result=num_row>0){
        while ($row=$result=mysqli_fetch_array($result)){
    $output.= "<div id='content'  class='col-lg-4 col-md-3' style=' margin-bottom: 5%'>

                <div  class='card' style='max-width: 23rem; min-width: 15rem; width: auto; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black'>

                    <a href="Listajogo.php?id=''.$dados['jogoId'].'' "><img src="img/<?php echo $dados["jogoImagemURL"] ?>'"' class="card-img-top" alt="..." style="height: 400px"></a>
                    <a href="\Listajogo.php?id="" \"></a>


                    <div class="card-body">

                        <a href="Listajogo.php?id=<?php echo $dados["jogoId"] ?>"><h5 class="card-title"><?php echo $dados["jogoNome"] ?></h5></a>

                        <p class="card-text" style="font-size: 18px"><strong><?php echo $dados["jogoPreco"] ?>€</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <a onclick="adicionaCarrinho(<?php echo $dados["jogoId"] ?>)"  style="color: #dc3545;">
                            <input type="submit" class="cart-button" value="Adicionar ao Carrinho" style="height: 50px; font-weight: bold"></a>
                    </div>

                </div>

            </div>";
        }
    }


}



?>
