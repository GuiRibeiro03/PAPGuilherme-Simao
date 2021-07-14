<?php
include_once("includes/bodyBase.inc.php");
top();
$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$id=intval($_SESSION['id']);
$sql="select * from perfis where perfilUserId=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
?>

<body>
<section >
        <a href="perfilUser.php?id=<?php echo $id?>"><button type="button" class="btn btn-light" style="margin-left: 5%; margin-top: 2%"><i class="arrow_back"></i>&nbsp;Voltar</button></a>

<div id="titulo" style="text-align: center; width: 100%; font-weight: bold; margin-top: 2%"><h2>Edita Perfil</h2></div>
    <hr>

    <form action="Confirma/confirmaEditaPerfil.php?id=<?php echo $dados['perfilId'] ?>" style="color: #FFF; margin-left: 20%; margin-top: 5%;margin-bottom: 5%; width: 50%" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Nome de Perfil: </label>
            <input type="text" class="form-control" name="perfilNome" value="<?php echo $dados['perfilNome'] ?>">
        </div>
        <br>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Escolhe uma imagem para o teu avatar:</label>
            <p><input type="file" accept="image/*" name="perfilAvatarURL" src="<?php echo $dados['perfilAvatarURL'] ?>" onchange="preview_image(event)"></p>
            <div style="max-height: 100px; max-width: 100px;"></div>
            <img id="output_image" style="max-height: 100px; max-width: 100px;"/>

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Endereço de Email:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="perfilEmail" value="<?php echo $dados['perfilEmail'] ?>">

        </div>
        <button type="submit" class="btn btn-success">Editar Perfil</button>
    </form>




    <?php
    $sql2="select * from users where userId=".$id;
    $res=mysqli_query($con,$sql2);
    $dados2=mysqli_fetch_array($res);

    ?>
    <form action="Confirma/confirmaEditaPerfilPass.php?id=<?php echo $dados2['userId'] ?>" style="color: #FFF;font-size: 20px; margin-left: 20%; margin-top: 5%;margin-bottom: 5%; width: 50%" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="badge badge-primary" style="font-size: 20px">Palavra-Passe atual:</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="oldPass" placeholder="Palavra-Passe atual" required>
        </div>
<br>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Nova Palavra-Passe:</label>
            <p><input type="password" class="form-control"  style="width: 50%;"  name="newPass" placeholder="Nova plavra-passe" required></p>
        </div>
        <br>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Repita a nova Palavra-Passe:</label>
            <p>  <input type="password" class="form-control"  style="width: 50%;"  name="newPass" placeholder="Repita a nova plavra-passe" required></p>
        </div>
        <br>
        <div class="container" style=" color: #FFFFFF">
            <span class="password" style="font-size:17px;">Esqueci-me da <a href="editaPassword.php" style="font-size:17px; color: #00aff1">palavra-passe</a> atual</span>
        </div>


        <button type="submit" class="btn btn-success">Editar Perfil</button>
    </form>




</section>
</body>

<?php
bottom();
?>