<?php
include_once ("../includes/body.inc.php");
top();
?>

<body>
<section >


    <form action="../Confirma/confirmaAdicionaPerfil.php" style="color: #FFF; margin-left: 20%; margin-top: 5%;width: 50%" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Nome de Perfil: </label>
            <input type="text" class="form-control" name="perfilNome">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Escolhe uma imagem para o teu avatar:</label>
            <input type="file" accept="image/*" name="perfilAvatarURL" onchange="preview_image(event)">
            <div style="max-height: 100px; max-width: 100px;"></div>
            <img id="output_image" style="max-height: 100px; max-width: 100px;"/>

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Endereço de Email:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="perfilEmail">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="badge badge-primary" style="font-size: 20px">Morada:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="perfilMorada">


        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-primary" style="font-size: 20px">Numero de Telemóvel:</label>
            <input type="text" class="form-control" maxlength="9" style="width: 50%;" placeholder="+351..." name="perfilTele">

        </div>
        <button type="submit" class="btn btn-success">Criar Perfil</button>
    </form>




</section>
</body>

<?php
bottom();
?>