<?php
include_once ("includes/bodyBase.inc.php");
$con=mysqli_connect(HOST,USER, PASSWORD,DATABASE);
$id=intval($_GET['id']);
$perfilId=intval($_SESSION['id']);
top();

$sql="select * from moradas inner join perfis on moradaPerfilId=perfilId where perfilId=".$perfilId;
$res=mysqli_query($con,$sql);

$dados=mysqli_fetch_array($res);



?>


<section class="store">
    <h3>Adiciona Morada</h3>


    <form style="color: #FFF; margin-left: 20%; margin-top: 5%;margin-bottom: 5%; width: 50%" action="confirmaEditaMorada.php?id=<?php echo $id; ?>&id2=<?php echo $_SESSION['id']?>" method="post">
        <div class="form-group">
            <label>Endereço de Morada:</label>
            <input type="text"  class="form-control"  name="moradaTexto" placeholder="ex: rua principal..." value="<?php echo $dados['moradaTexto'];?>">

        </div>
        <div class="form-group">
            <label>Número de Telefone:</label>
            <input type="text"  class="form-control" name="moradaTelefone" placeholder="ex: rua principal..." maxlength="9" value="<?php echo $dados['moradaTelefone'];?>">
        </div>

        <button type="submit" class="btn btn-danger" >Adicionar</button>
    </form>

</section>



<?php
bottom();

?>
