<?php
include_once ("../includes/body.inc.php");
top();
?>

<body>
<section >


    <form action="Confirma/confirmaAdicionaPerfil.php" style="color: #FFF; margin-left: 20%; margin-top: 5%;width: 50%" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-dark" style="font-size: 20px">Nome de Perfil</label>
            <input type="text" class="form-control" name="perfilNome">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-dark" style="font-size: 20px">Escolhe uma imagem para o teu avatar:</label>
            <input type="file" accept="image/*" name="perfilAvatarURL" onchange="preview_image(event)">
            <div style="max-height: 100px; max-width: 100px;"></div>
            <img id="output_image" style="max-height: 100px; max-width: 100px;"/>

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-dark" style="font-size: 20px">Endereço de Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="perfilEmail">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="badge badge-dark" style="font-size: 20px">Morada</label>
            <input type="password" class="form-control" id="exampleInputPassword1" >
            <label class="badge badge-dark" style="font-size: 15px">Código Postal</label>
            <input type="text" maxlength="4" style="width: 15%; margin-right: 3%">  <input type="text" maxlength="3" style="width: 10%">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="badge badge-dark" style="font-size: 20px">Numero de Telemóvel</label>
            <input type="text" class="form-control" maxlength="9" style="width: 50%;" placeholder="+351...">

        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Eu concordo com a random bullshit</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck2">
            <label class="form-check-label" for="exampleCheck2">Eu aceito receber emails ou newsletter's</label>
        </div>
        <div id="emailHelp" class="form-text"><small>We'll never share your information with anyone else.</small></div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>




</section>
</body>

<?php
bottom();
?>