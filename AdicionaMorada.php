<?php
include_once("includes/bodyBase.inc.php");
top();

$perfilId=intval($_GET['id']);
?>

<section class="store">



    <form style="color: #FFF; margin-left: 20%; margin-top: 5%;margin-bottom: 5%; width: 50%" action="confirmaAdicionaMorada.php?id=<?php echo $perfilId; ?>" method="post">
        <h4 style="margin-bottom: 10%">Adiciona Morada:</h4>
        <div class="form-group">
            <label>Endereço de Morada:</label>
            <input type="text"  class="form-control"  name="moradaTexto" placeholder="ex: rua principal...">

        </div>
        <div class="form-group">
            <label>Número de Telefone:</label>
            <input type="text"  class="form-control" name="moradaTelefone" placeholder="ex: rua principal..." maxlength="9">
        </div>

        <button type="submit" class="btn btn-danger" >Adicionar</button>
    </form>

</section>





<?php

bottom();

?>




