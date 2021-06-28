<?php
  include_once ("includes/bodyBase.inc.php");
  top();

?>



<section class="store" style="margin-left: 10%; margin-top: 5% ">
    <h4>Atualização de Password</h4>
    <br>
    <br>
    <br>
    <form>
        <div class="form-group" >
            <label for="exampleInputEmail1">Endereço de Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Introduza email" style="width: 1000px;">
            <small id="emailHelp" class="form-text text-muted">Irá receber uma notifcação no email inserido para confirmar a troca de password.</small>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <br>
    <br>
    <br>
</section>



<?php
bottom();
?>
