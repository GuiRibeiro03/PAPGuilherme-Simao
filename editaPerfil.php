<?php
include_once("includes/bodyBase.inc.php");
top();
$id=intval($_SESSION['id']);
$sql="select * from perfis where perfilUserId=$id";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
?>

<body>
<section >

<div id="titulo" style="text-align: center; width: 100%; font-weight: bold; margin-top: 2%"><h2>Edita Perfil</h2></div>
    <hr>
    <form action="Confirma/confirmaEditaPerfil.php?id=<?php echo $dados['perfilId'] ?>" style="color: #FFF; margin-left: 20%; margin-top: 5%;width: 50%" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Nome de Perfil: </label>
            <input type="text" class="form-control" name="perfilNome" value="<?php echo $dados['perfilNome'] ?>">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Escolhe uma imagem para o teu avatar:</label>
            <input type="file" accept="image/*" name="perfilAvatarURL" src="<?php echo $dados['perfilAvatarURL'] ?>" onchange="preview_image(event)">
            <div style="max-height: 100px; max-width: 100px;"></div>
            <img id="output_image" style="max-height: 100px; max-width: 100px;"/>

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Endereço de Email:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="perfilEmail" value="<?php echo $dados['perfilEmail'] ?>">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="badge badge-primary" style="font-size: 20px">Morada:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="perfilMorada" value="<?php echo $dados['perfilMorada'] ?>">


        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Numero de Telemóvel:</label>
            <input type="text" class="form-control" maxlength="9" style="width: 50%;" placeholder="+351..." name="perfilTele" value="<?php echo $dados['perfilTelefone'] ?>">

        </div>
        <button type="submit" class="btn btn-success">Editar Perfil</button>
    </form>




</section>
</body>

<?php
bottom();
?>