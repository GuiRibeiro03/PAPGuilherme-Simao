<?php
include_once ("includes/bodyBase.inc.php");
top();


?>
<section class="store" >

<div class="row">

    <div  class="col-lg-4 col-md-3" style="alignment: left">

        <div  class="card" style="width: 19rem; margin-left: 20px; margin-right: 10px; margin-top: 5%;margin-bottom: 5%; background-color: black; box-shadow: 10px 10px 2px 1px rgb(255, 255, 255) ;">
<?php
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from perfis inner join users on perfilUserId=userId where perfilId=".$_GET["id"];
$result=mysqli_query($con, $sql);
while ($dados=mysqli_fetch_array($result)){
?>
            <div class="card-body">
                <!--<img src="<?php echo $dados["perfilAvatarURL"] ?>" alt="Avatar" >-->

                <h5 class="card-title" style="text-align: center;">Olá, <?php echo $dados["perfilNome"]?></h5>
<br>
                <p class="card-text" style="font-size: 18px; width: 100%; float: left"><strong></strong>&nbsp;&nbsp;<span class="badge bg-primary" style=" font-size: 100%"><?php echo $dados["userType"]?> &nbsp;<i class="fa fa-user-circle-o"></i></span></p>
                <h4></h4>
            </div>
            <?php
            }
            ?>
        </div>




        <div class="container" >

            <div class="coise" style="box-shadow: 10px 10px 2px 1px rgb(255, 255, 255);">
                <ul class="list-group" style="width: 19rem; margin-left: 10px; margin-right: 10px; background-color: #0d0d0d; color: #FFF; font-weight: bold">
                    <li class="list-group-item"><h4>Painel da Conta</h4></li>
                </ul>
<?php

$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql2="select * from perfis inner join users on perfilUserId=userId where perfilId=".$_GET["id"];
$result2=mysqli_query($con, $sql2);
$dados=mysqli_fetch_array($result2);
if($dados['userType']=='admin'){
?>

    <ul class="list-group" style="width: 19rem; margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: #0d0d0d; color: #FFF; font-weight: bold">
        <a href="editaPerfil.php?id=<?php echo $_GET['id'] ?>" style="color: #FFFFFF; background-color: #0d0d0d; font-weight: bold"><li class="list-group-item">Definições de Perfil <i class="fa fa-edit"></i></li></a>
        <a href="backoffice/Backoffice.php" style="color: #FFFFFF; font-weight: bold; background-color: black"><li class="list-group-item">Backoffice</li></a>
        <a href="meusAnuncios.php?id=<?php echo $_GET['id']?>"><li class="list-group-item">Meus Anúncios</li></a>
    </ul>
    <?php
}elseif ($dados['userType']=='editor'){
    ?>

    <ul class="list-group" style="width:19rem;margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: black">
        <li class="list-group-item"><a href="editaPerfil.php?id=<?php echo $_GET['id'] ?>"><button type="button" class="btn btn-info" style="margin-left: 20%; font-size: 100% ">Definições de Perfil <i class="fa fa-edit"></i></button></a></li>
        <li class="list-group-item"><a href="backoffice/reviewsBackoffice.php"><button type="button" class="btn btn-danger" style="margin-left: 20%; font-size: 100% ">Lista de desejos</button></a></li>
    </ul>

    <?php
}elseif ($dados['userType']=='user'){
    ?>

    <ul class="list-group" style="width:19rem;margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: black">
        <a href="editaPerfil.php?id=<?php echo $_GET['id'] ?>" style="color: #FFFFFF; background-color: #0d0d0d; font-weight: bold"><li class="list-group-item">Definições de Perfil <i class="fa fa-edit"></i></li></a>
        <a href="#"><li class="list-group-item">Lista de desejos</li></a>
        <a href="#"><li class="list-group-item">Meus Anúncios</li></a>

    </ul>

    <?php
}
    ?>
            </div>
        </div>

        <?php
        if($dados['userState']=='inativo'){

            echo "<badge class='badge badge-danger'>User Inativo</badge>";

        }elseif ($dados['userState']=='pendente'){
            echo "<badge class='badge badge-warning'>User Pendente </badge>";
        }

        ?>

    </div>


    <div class="container-lg" style="width: 30%; margin-top: 5%">
        <div class="bp-item" style="margin-bottom: 5%">
            <h4>Informações de Contacto</h4>

            <hr>
            <div>
                <ul style="font-size: 20px; margin-bottom: 3%" >
                <li><?php echo $dados['perfilNome']?></li>
                <li><?php echo $dados['perfilEmail']?></li>
                <li><?php echo $dados['perfilTelefone']?></li>
                </ul>
                <a href="editaPerfil.php?id=<?php echo $dados['perfilId']?>"><button style="background-color: red; font-size: 20px; padding: 7px 7px">Editar</button></a>
            </div>

        </div>
        <div class="bp-item" style="margin-bottom: 5%">

            <h4>Informações de Morada</h4>
            <hr>
            <div>
                <ul style="font-size: 20px;  margin-bottom: 3%" >
                    <li><?php echo $dados['perfilMorada']?></li>
                </ul>
                <a href="editaPerfil.php?id=<?php echo $dados['perfilId']?>"><button style="background-color: red; font-size: 20px; padding: 7px 7px">Editar</button></a>
            </div>

        </div>

    </div>



</div>




</section>
<?php
bottom();
?>