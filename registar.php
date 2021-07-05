<?php
include_once ("includes/bodyBase.inc.php");
top();
if(!isset($_SESSION['id'])){
?>

<div style="width: 100%; height: 100px; text-align: center; margin-top: 5%; font-weight: bold"><div class="label"><h2>Registo</h2></div></div>





<?php
}else{
    echo "<script> window.location='index.php'; </script>";
}


bottom()
?>
