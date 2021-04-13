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
                <img src="<?php echo $dados["perfilAvatarURL"] ?>">
                <hr>
                <h4 class="card-title" style="text-align: center"><?php echo $dados["perfilNome"]?></h4>
                <hr>
                <p class="card-text" style="font-size: 18px; margin-left: 10%"><strong></strong>&nbsp;&nbsp;<span class="badge bg-primary" style=" font-size: 100%"><?php echo $dados["userType"]?> &nbsp;<i class="fa fa-user-circle-o"></i></span></p>
                <h4></h4>
            </div>


            <?php
            }
            ?>
        </div>





        <div  style="width:19rem;margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: black">
                <a href="#"><button type="button" class="btn btn-info" style="margin-left: 20%; font-size: 100% ">Edita Perfil <i class="fa fa-edit"></i></button></a>
                <a href="backoffice/Backoffice.php"><button type="button" class="btn btn-danger" style="margin-left: 20%; font-size: 100% ">Backoffice</button></a>
        </div>

    </div>







</section>
<?php
bottom();
?>