<?phpinclude_once ("includes/bodyBase.inc.php");$con = mysqli_connect("localhost", "root", "","pap2021gameon");$sql="select * from noticias";$result=mysqli_query($con,$sql);top(NOTICIASFRONT);?><div style="text-align: center; width: 100%; margin-left: 20%">    <input type="text" placeholder="Procura a notícia que desejas..." id="search" style="width: 30%; height: 40px; border-radius: 10px; margin-top: 3%; margin-right: 40%"></div><div id="tableContent"></div><?phpbottom();?>