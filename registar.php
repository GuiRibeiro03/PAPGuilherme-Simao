<?php
include_once ("includes/bodyBase.inc.php");
top();
if(!isset($_SESSION['id'])){
?>

<div style="width: 100%; height: 100px; text-align: center; margin-top: 5%; font-weight: bold"><div class="label"><h2>Registo</h2></div></div>



    <form class="modal-content animate" action="confirmaRegistar.php" method="post" enctype="multipart/form-data" >

        <div class="container" style="margin-top: 5%;margin-bottom: 2%">

            <div class="form-floating mb-3">
                <label for="floatingInput"  id="userName" style="color: #FFF; background-color: #0d0d0d; border-radius: 4px;width: 180px; text-align: center"><b>Nome de Utilizador:</b></label>
                <input type="text" class="form-control" id="floatingInput" name="userName" placeholder="Introduza o seu nome.."  required> <!-- PerfilNome -->
            </div>

            <div class="form-floating mb-3">
                <label id="password" for="floatingInput" style="color: #FFF; background-color: #0d0d0d; border-radius: 4px; width: 130px; text-align: center"><b>Palavra-passe:</b></label>
                <input type="password" class="form-control" id="floatingInput"  name="password" placeholder="Introduza uma password que se lembre.."  required> <!-- Password -->
            </div>



            <div class="form-floating mb-3">
                <label id="password" for="floatingInput" style="color: #FFF; background-color: #0d0d0d; border-radius: 4px; width: 130px; text-align: center"><b>Email:</b></label>
                <input type="email" class="form-control" id="floatingInput"  name="email" placeholder="ex: teste@gmail.com" required> <!-- Password -->
            </div>


            <div class="form-floating mb-3">
                <label id="imagem" for="floatingInput" style="color: #FFF; background-color: #0d0d0d; padding: 5px 10px 5px 10px; border-radius: 4px; width: auto; text-align: center"><b>Imagem de Perfil:</b></label> <!-- Imagem -->
            </div>
            <input type="file" accept="image/*" name="perfilAvatarURL" onchange="preview_image(event)" style="color: darkgray">


            <div style="float: right"> <button type="submit" style=" border-radius: 10px;background-color: #FF0000; height: 45px; width: 100px"><strong>Registar</strong></button></div>
        </div>

    </form>

<?php
}else{
    echo "<script> window.location='index.php'; </script>";
}


bottom()
?>
