<?php


$email=addslashes($_POST['email']);

$subject = "Password Update";

//menssagem
$message = "<b><img src='gameOn.png'></b>";
$message .= "<h1><a href='localhost/PAPGuilherme-Simao/alterarPassword.php'><button>Alterar Password</button></a></h1>";


//Headers
$header = "From: guilhas.ribeiro20@gmail.com \r\n";
$header .= "Reply-To:guilhas.ribeiro20@gmail.com \r\n";
$header .= "Content-type: text/html\r\n";

//Envia email
$retval = mail ($email,$subject,$message,$header);

if( $retval == true ) {
    echo "Message sent successfully...";
}else {
    echo "Message could not be sent...";
}
?>

