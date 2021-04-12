<?php
$nome = addslashes($_POST['utilizador']);


header("location:index.php?nome=".$nome);
?>
