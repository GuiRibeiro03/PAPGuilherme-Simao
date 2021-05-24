<?php
include_once ("includes/bodyBase.inc.php");
top();


?>
<section class="store">



    <div  class="col-lg-4 col-md-3">

        <div  class="card" style="width: 19rem; margin-left: 10px; margin-right: 10px; margin-top: 10px; background-color: black">
<?php
$con=mysqli_connect("localhost","root","","pap2021gameon");
$sql="select * from perfis inner join users on perfilUserId=userId where perfilId=".$_GET["id"];
$result=mysqli_query($con, $sql);
while ($dados=mysqli_fetch_array($result)){
?>
            <div class="card-body">
                <img src="<?php echo $dados["perfilAvatarURL"] ?>" alt="Avatar">
                <hr>
                <h5 class="card-title" style="text-align: center;"><?php echo $dados["perfilNome"]?></h5>
                <hr>
                <p class="card-text" style="font-size: 18px; margin-left: 10%"><strong></strong>&nbsp;&nbsp;<span class="badge bg-primary" style=" font-size: 100%"><?php echo $dados["userType"]?> &nbsp;<i class="fa fa-user-circle-o"></i></span></p>
                <h4></h4>
            </div>


            <?php
            }
            ?>
        </div>




<?php
if($dados['userType']=='admin'){
?>
        <div  style="width:19rem;margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: black">
                <a href="editaPerfil.php?id=<?php echo $_GET['id'] ?>"><button type="button" class="btn btn-info" style="margin-left: 20%; font-size: 100% ">Definições de Perfil <i class="fa fa-edit"></i></button></a>
                <a href="backoffice/Backoffice.php"><button type="button" class="btn btn-danger" style="margin-left: 20%; font-size: 100% ">Backoffice</button></a>
        </div>
    <?php
}elseif ($dados['userType']=='editor'){
    ?>

    <div  style="width:19rem;margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: black">
        <a href="editaPerfil.php?id=<?php echo $_GET['id'] ?>"><button type="button" class="btn btn-info" style="margin-left: 20%; font-size: 100% ">Definições de Perfil <i class="fa fa-edit"></i></button></a>
        <a href="backoffice/reviewsBackoffice.php"><button type="button" class="btn btn-danger" style="margin-left: 20%; font-size: 100% ">Reviews</button></a>
    </div>

    <?php
}elseif ($dados['userType']=='user'){
    ?>
        <div  style="width:19rem;margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: black">
            <a href="editaPerfil.php?id=<?php echo $_GET['id'] ?>"><button type="button" class="btn btn-info" style="margin-left: 20%; font-size: 100% ">Definições de Perfil <i class="fa fa-edit"></i></button></a>
            <a href="backoffice/reviewsBackoffice.php"><button type="button" class="btn btn-danger" style="margin-left: 20%; font-size: 100% ">Lista de desejos</button></a>
        </div>
    <?php
}
    ?>

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