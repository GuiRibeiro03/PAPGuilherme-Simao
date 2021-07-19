<?php
include_once('includes/config.inc.php');
$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
if (isset($_POST['action'])) {
    $sql = "select * from jogos 
    inner join jogogeneros on jogoId=jogoGeneroJogoId 
    inner join jogoplataformas on jogoId=jogoPlataformaJogoId ";


    $sql2 = "select * from generos";
    $sql3 = "select * from empresas";
    $sql4 = "select * from plataformas";


    if (isset($_POST['genero'])) {
        $genero = implode('","', $_POST['genero']);
        $sql .= "where  jogoGeneroGeneroId IN('" . $genero . "')";
    }
    if (isset($_POST['plataforma'])) {
        $plataforma = implode('","', $_POST['plataforma']);
        $sql .= "where  jogoPlataformaPlataformaId IN('" . $plataforma . "')";
    }
    if (isset($_POST['empresa'])) {
        $empresa = implode('","', $_POST['empresa']);
        $sql .= "where  jogoEmpresaId IN('" . $empresa . "')";
    }


    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sql2);
    $result3 = mysqli_query($con, $sql3);
    $result4 = mysqli_query($con, $sql4);
    $dadosEmpresas = mysqli_fetch_array($result3);
    $dadosGeneros = mysqli_fetch_array($result2);
    $dadosPlataformas = mysqli_fetch_array($result4);

    $output = '<button onclick="location.reload()" class="btn btn-light" style="margin-left: 5%"><i class="arrow_back"></i>&nbsp;Voltar</button>
                <div class="row" style="margin-top: 2%; margin-left: 5%">';

    if ($result->num_rows > 0) {

        while ($dados = $result->fetch_assoc()) {
            $output .= '
        <div id="content"  class="col-lg-4 col-md-4" style="margin-bottom: 5%; padding-left: 5%">

                <div  class="card" style="width: 19rem; padding: 10px 10px 10px 10px; background-color: black">

                     <a href="Listajogo.php?id=' . $dados['jogoId'] . ' "><img src="img/' . $dados['jogoImagemURL'] . '" class="card-img-top" alt="..." style="height: 400px"></a>

                    <div class="card-body">

                       <a href="Listajogo.php?id="' . $dados['jogoId'] . '" "><h5 class="card-title">' . $dados['jogoNome'] . '</h5></a>

                        <p class="card-text" style="font-size: 18px"><strong>' . $dados['jogoPreco'] . ' €</strong>&nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span></p>

                        <a onclick="adicionaCarrinho(' . $dados["jogoId"] . ')"  style="color: #dc3545;">
                            <input type="submit" class="cart-button" value="Adicionar ao Carrinho" style="height: 50px; font-weight: bold"></a>
                    </div>

                </div>

            </div>
            
           
             ';

        }
        $output.=" </div>";

    } else {
        $output = '<section class="store"><button onclick="location.reload()" class="btn btn-light" style="margin-left: 5%"><i class="arrow_back"></i>&nbsp;Voltar</button>
                <div style="text-align: center; margin-top: 4%; margin-bottom: 3%"><h3>Não foi possível econtrar um Jogo</h3></div></section>';
    }
    echo $output;

}


?>
