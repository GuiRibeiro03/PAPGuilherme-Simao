<?php
include_once ("includes/bodyBase.inc.php");
top();


?>
<section class="store" >



    <div  class="col-lg-4 col-md-3" style="alignment: left">

        <div  class="card" style="width: 19rem; margin-left: 20px; margin-right: 10px; margin-top: 5%;margin-bottom: 5%; background-color: black; box-shadow: 10px 10px 2px 1px rgba(255, 255, 255);">
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

            <div class="coise" style="box-shadow: 10px 10px 2px 1px rgba(255, 255, 255);">
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
        <li class="list-group-item">A third item</li>
        <li class="list-group-item">A fourth item</li>
        <li class="list-group-item">And a fifth one</li>
    </ul>
    <?php
}elseif ($dados['userType']=='editor'){
    ?>

    <ul class="list-group" style="width:19rem;margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: black">
        <li class="list-group-item"><a href="editaPerfil.php?id=<?php echo $_GET['id'] ?>"><button type="button" class="btn btn-info" style="margin-left: 20%; font-size: 100% ">Definições de Perfil <i class="fa fa-edit"></i></button></a></li>
        <li class="list-group-item"><a href="backoffice/reviewsBackoffice.php"><button type="button" class="btn btn-danger" style="margin-left: 20%; font-size: 100% ">Lista de desejos</button></a></li>
        <li class="list-group-item">A third item</li>
        <li class="list-group-item">A fourth item</li>
        <li class="list-group-item">And a fifth one</li>
    </ul>

    <?php
}elseif ($dados['userType']=='user'){
    ?>

    <ul class="list-group" style="width:19rem;margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: black">
        <li class="list-group-item"><a href="editaPerfil.php?id=<?php echo $_GET['id'] ?>"><button type="button" class="btn btn-info" style="margin-left: 20%; font-size: 100% ">Definições de Perfil <i class="fa fa-edit"></i></button></a></li>
        <li class="list-group-item"><a href="backoffice/reviewsBackoffice.php"><button type="button" class="btn btn-danger" style="margin-left: 20%; font-size: 100% ">Lista de desejos</button></a></li>
        <li class="list-group-item">A third item</li>
        <li class="list-group-item">A fourth item</li>
        <li class="list-group-item">And a fifth one</li>
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


</section>
<?php
bottom();
?>