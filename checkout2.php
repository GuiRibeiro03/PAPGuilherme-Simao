<?php
include_once("includes/bodyBase.inc.php");
top();

$sql="select * from perfis where perfilId=".$_SESSION['id'];
$res=mysqli_query($con,$sql);

$dados=mysqli_fetch_array($res);

?>



     <section class="store" style="margin-top: 20px; margin-bottom: 20px; color: #FFFFFF;background-color: #0d0d0d; margin-left: 10%; margin-right: 10%">
        <div ><h3 style="font-weight: bold">Checkout: Envio</h3></div>
<br>

         <div style="border-radius: 3px; border: solid 2px white; width: 400px; height:230px; padding: 10px 10px; font-weight: bold; font-size: 20px ">
        <div>
            <p ><?php echo $dados['perfilNome']?></p>
            <p><?php echo $dados['perfilMorada']?></p>
            <p><?php echo $dados['perfilTelefone']?></p>
        </div>

             <div style="float: right; padding-bottom: 10px"><input type="radio" style="width: 20px; height: 20px;"></div>

         </div>



         <div style="border-radius: 3px; border: solid 2px white; width: 500px; height:60px; padding: 15px 10px; font-weight: bold; font-size: 20px; margin-top: 5%">
             <p>CTT- Expresso: <span>3,90€</span></p><div style="float: right; padding-bottom: 10px"><input type="radio" style="width: 20px; height: 20px;"></div>

         </div>










        </section>






    <!-- Footer Section Begin -->
    <?php
bottom();
?>