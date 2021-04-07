<?php

include_once("includes/bodyBase.inc.php");
$con=mysqli_connect("localhost","root","","pap2021gameon");
$search=addslashes($_POST["txt"]);
$sql="select * from jogos where jogoNome like '%$search%' ";
$result=mysqli_query($con,$sql);

top();

?>

<script>

    $('document').ready(function (){
        $('#search').keyup(function (){
            fillJogos(this.value);
        });
        fillJogos();
    })

</script>

<div id="content">


</div>



<?php
bottom();
?>
