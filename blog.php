<?phpinclude_once("includes/bodyBlog.inc.php");top();$con = mysqli_connect("localhost", "root", "","pap2021gameon");$sql="select * from noticias";$result=mysqli_query($con,$sql);?><section class="latest-preview-section" style="width: 100%;">    <div class="container" style="width:100%; padding-top: 20px; padding-right: 10px; position: center">        <div class="row">            <?php            while ($dados=mysqli_fetch_array($result)){            ?>            <div class="lp-item" >                <a href="ListaBlog.php?id=<?php echo $dados["noticiaId"] ?>"> <div class="lp-pic set-bg" data-setbg="img/<?php echo $dados["noticiaImagemFundoURL"] ?>" style="border-radius: 10px"> </div></a>                <div class="lp-text">                    <h6><a href="ListaBlog.php?id=<?php echo $dados["noticiaId"] ?>"><?php echo $dados["noticiaTitulo"] ?></a></h6>                    <ul>                        <li><i class="fa fa-clock-o"></i> <?php echo $dados["noticiaData"] ?></li>                        <li><i class="fa fa-comment"></i>                            <?php                            $sql2="select count(comentarioId) as num1 from comentarios where comentarioEntidadeId=".$dados['noticiaId'];                            $result2=mysqli_query($con,$sql2);                            $dados2=mysqli_fetch_array($result2);                            echo $dados2["num1"] ?> </li></li>                    </ul>                </div>            </div>            <?php            }            ?>        </div>    </div></section><?phpbottom();?>