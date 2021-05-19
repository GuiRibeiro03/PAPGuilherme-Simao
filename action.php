<?php
include_once ('includes/config.inc.php');
$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
if(isset($_POST['action'])){
    $sql="select * from jogos 
    inner join jogogeneros on jogoId=jogoGeneroJogoId 
    inner join jogoplataformas on jogoId=jogoPlataformaJogoId 
where jogoEmpresaId != '' ";


    $sql2="select * from generos";
    $sql3="select * from empresas";
    $sql4="select * from plataformas";


    if(isset($_POST['genero'])){
        $genero = implode('","', $_POST['genero']);
        $sql.="AND  jogoGeneroGeneroId IN('".$genero."')";
    }if(isset($_POST['plataforma'])){
        $plataforma = implode('","', $_POST['plataforma']);
        $sql.="AND  jogoPlataformaPlataformaId IN('".$plataforma."')";
    }if(isset($_POST['empresa'])){
        $empresa = implode('","', $_POST['empresa']);
        $sql.="AND  jogoEmpresaId IN('".$empresa."')";
    }


    $result = mysqli_query($con,$sql);
    $result2=mysqli_query($con,$sql2);
    $result3=mysqli_query($con,$sql3);
    $result4=mysqli_query($con,$sql4);
   $dadosEmpresas=mysqli_fetch_array($result3);
   $dadosGeneros=mysqli_fetch_array($result2);
   $dadosPlataformas=mysqli_fetch_array($result4);

    $output='';

    if($result->num_rows>0){

        while ($dados=$result->fetch_assoc()){
    $output .= '
<div class=" container" style="width: 300px; float: left; height: 100%; position:relative; ">

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
                        <li class="list-group-item" style="color: #0b0b0b">
                            <label class="form-check-label">
                            <div class="form-check">
                                <input type="checkbox" id="genero" class="form-check-input product_check" value="'. $dadosGeneros["generoId"].'"> '.$dadosGeneros["generoNome"].'
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
                    <li class="list-group-item" style="color: #0b0b0b">
                        <label class="form-check-label">
                            <div class="form-check">
                        <input id="plataforma" type="checkbox" class="form-check-input product_check" value="'. $dadosPlataformas["plataformaId"].'"> '.$dadosPlataformas["plataformaNome"].'
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
                        <li class="list-group-item" style="color: #0b0b0b">
                            <label class="form-check-label">
                                <div class="form-check">
                        <input id="empresa" type="checkbox" class="form-check-input product_check" value="'. $dadosEmpresas["empresaId"].'"> '.$dadosEmpresas["empresaNome"].'
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
        <div class="row-cols-3" style="margin-left: 10%">
           
      
            <div id="content"  class="col-lg-4 col-md-3" style=" margin-bottom: 5%">

                <div  class="card" style="max-width: 23rem; min-width: 15rem; width: auto; padding-left: 10px; padding-right: 10px; padding-top: 10px; background-color: black">
                  <a href="Listajogo.php?id='.$dados['jogoId'].'  ">
                    
                    
                <img src="img/'.$dados['jogoImagemURL'].'" class="card-img-top" alt="..." style="height: 400px"></a>

                    <div class="card-body">

                        <a href="Listajogo.php?id="'.$dados['jogoId'].'" "><h5 class="card-title">'.$dados['jogoNome'].'</h5></a>

                        <p class="card-text" style="font-size: 18px"><strong>'.$dados['jogoPreco'].' €</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <a onclick="adicionaCarrinho('.$dados["jogoId"].')"  style="color: #dc3545;">
                            <input type="submit" class="cart-button" value="Adicionar ao Carrinho" style="height: 50px; font-weight: bold"></a>
                    </div>

                </div>

            </div>
            
            </div>';
        }
        }else{
        $output="<h3>Não foi possível econtrar um Jogo";
    }
echo $output;

}




?>
