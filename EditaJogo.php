<?php
include_once ("includes/body.inc.php");
top();
$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET["id"]);
$sql="select * from jogos where jogoId=".$id;

$resultjogos=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($resultjogos);

?>

<div style="color: #FFFFFF" xmlns="http://www.w3.org/1999/html">
</div>


<form action="confirmaEditaJogo.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" style="color: #FFFFFF; margin-left: 30px">
    <a href="jogosBackoffice.php"><button type="button"  class="btn btn-primary">Voltar</button></a>
<h2>Editar Jogo</h2>
<hr>
    <div><img  src="img/jogos/<?php echo $dados["jogoImagemURL"] ?>" style="margin-left: 20px; margin-bottom: 20px; width: 300px; height: 400px"/></div>
    <input type="file" name="jogoImagemURL">


  <div style="margin-top: 20px">

      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Nome:</label>
    <input type="text" name="jogoNome" value="<?php echo $dados["jogoNome"]?>">

      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Preço: </label>
    <input type="text" name="jogoPreco" value="<?php echo $dados["jogoPreco"]?>">

      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Sinopse:</label>
      <input type="text" name="jogoSinopse" value="<?php echo $dados["jogoSinopse"]?>">
      <hr>

      <label style="color:white; font-size: 15px" class="badge badge-dark">Trailer:</label>
      <input type="url" name="jogoTrailer" value="<?php  echo $dados["jogoTrailer"]?>">
      <hr>

      <label style="color:white; font-size: 15px" class="badge badge-dark">Empresa</label>



      <select name="jogoEmpresaId" >
          <option value="-1">Escolha a empresa...</option>
          <?php
          $sql="select * from empresas order by empresaNome";
          $result=mysqli_query($con,$sql);
          while ($dadosEmpresas=mysqli_fetch_array($result)){
              ?>
              <option value="<?php echo $dadosEmpresas['empresaId']?>"
              <?php
              if($dados["jogoEmpresaId"]==$dadosEmpresas["empresaId"])
                    echo "Selected" ;

                  ?>
                  >
                <?php echo $dadosEmpresas["empresaNome"] ?>
              </option>
              <?php
          }


          ?>
      </select>
    </div>
<hr>
    <input type="Submit" class="btn btn-danger" value="Edita"><br>
</form>
<br>
<script>
function preview_image(event)
{
var reader = new FileReader();
reader.onload = function()
{
var output = document.getElementById('output_image');
output.src = reader.result;
}
reader.readAsDataURL(event.target.files[0]);
}
</script>

<?php
bottom();
?>
