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

        }
    }


}



?>
