<?php
include_once("../includes/body.inc.php");
top();
$con=mysqli_connect("localhost","root","","pap2021gameon");

?>


<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Adicionar Novo Jogo</span></div>

<section class="store" style="padding:50px">

    <a href="../backoffice/jogosBackoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>
<hr>
<form action="../Confirma/confirmaNovoJogo.php" method="post" enctype="multipart/form-data">
    <label style="color:white; font-size: 15px" class="badge badge-dark">Nome: </label>
    <input type="text" style="width: 300px" name="jogoNome"><hr>

    <label style="color:white; font-size: 15px" class="badge badge-dark">Sinopse: </label>
    <textarea type="text" cols="100" rows="10" name="jogoSinopse"></textarea><hr>

    <label style="color:white; font-size: 15px" class="badge badge-dark">Link do Trailer (Codigo Embebido): </label>
    <input type="text" style="height: 99%;" name="jogoTrailer"><hr>


    <label style="color:white; font-size: 15px" class="badge badge-dark">Imagem:</label>
    <input type="file" accept="image/*" name="jogoImagemURL" onchange="preview_image(event)" style="color: darkgray">
    <img id="output_image"/><hr>

    <label style="color:white; font-size: 15px" class="badge badge-dark">Preço:</label>
    <input type="text" name="jogoPreco" style="width: 100px"><hr>


    <label style="color:white; font-size: 15px" class="badge badge-dark">Empresa</label>
    <select name="jogoEmpresaId">
        <option value="-1">Escolha a empresa...</option>
        <?php
        $sql="select * from empresas order by empresaNome";
        $result=mysqli_query($con,$sql);
        while ($dados=mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $dados['empresaId']?>"><?php echo $dados['empresaNome']?></option>
            <?php
        }


        ?>
    </select>

    <label style="color:white; font-size: 15px" class="badge badge-dark">Produto em destaque:</label>


<div style="color: #FFFFFF; margin-top: 50px">
    <label>Produto em destaque:</label>
  <p><input type="radio" name="jogoDestaque" value="sim" >&nbsp;Sim</p>
  <p><input type="radio" name="jogoDestaque" value="nao" checked>&nbsp;Não</p>
    </div>


    <input type="Submit" class="btn btn-danger" value="Adiciona"><br>

</form>
</section>


<?php
bottom();
?>



