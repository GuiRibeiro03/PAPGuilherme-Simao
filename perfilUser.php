<?php
include_once("includes/bodyBase.inc.php");
top();


?>
    <section class="store">

        <div class="row">

            <div class="col-lg-4 col-md-3" style="alignment: left">

                <div class="card"
                     style="width: 19rem; margin-left: 20px; margin-right: 10px; margin-top: 5%;margin-bottom: 5%; background-color: black; ">
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "pap2021gameon");
                    $sql = "select * from perfis inner join users on perfilUserId=userId  where perfilId=" . $_GET["id"];
                    $result = mysqli_query($con, $sql);

                    while ($dados = mysqli_fetch_array($result)) {
                        ?>
                        <div class="card-body">
                            <!--<img src="<?php echo $dados["perfilAvatarURL"] ?>" alt="Avatar" >-->

                            <h5 class="card-title" style="text-align: center;">
                                Olá, <?php echo $dados["perfilNome"] ?></h5>
                            <br>
                            <p class="card-text" style="font-size: 18px; width: 100%; float: left"><strong></strong>&nbsp;&nbsp;<span
                                        class="badge bg-primary"
                                        style=" font-size: 100%"><?php echo $dados["userType"] ?> &nbsp;<i
                                            class="fa fa-user-circle-o"></i></span></p>
                        </div>
                            <?php
                           if ($dados['userState'] == 'pendente') {
                                echo "<badge class='badge badge-warning' style='font-size: 13px;'>User Pendente </badge>";

                            }

                            ?>

                        <?php
                    }
                    ?>
                </div>


                <div class="container" style="">

                    <div class="coise" >
                        <ul class="list-group"
                            style="width: 19rem; margin-left: 10px; margin-right: 10px; background-color: black; color: #FFF; font-weight: bold">
                            <li class="list-group-item"><h4>Painel da Conta</h4></li>
                        </ul>
                        <?php

                        $con = mysqli_connect("localhost", "root", "", "pap2021gameon");
                        $sql2 = "select * from users  where userId=" . $_SESSION['id'];
                        $result2 = mysqli_query($con, $sql2);
                        $dados2 = mysqli_fetch_array($result2);

                        if ($dados2['userType'] == 'admin') {
                            ?>

                            <ul class="list-group" style="width: 19rem; margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: black; color: #FFF; font-weight: bold">

                                <a href="editaPerfil.php?id=<?php echo $_GET['id'] ?>"
                                   style="color: #FFFFFF; background-color: #0d0d0d; font-weight: bold">
                                    <li class="list-group-item">Definições de Perfil <i class="fa fa-edit"></i></li>
                                </a>
                                <a href="editaPerfilPassword.php?id=<?php echo $_GET['id'] ?>"
                                   style="color: #FFFFFF; background-color: #0d0d0d; font-weight: bold">
                                    <li class="list-group-item">Alterar Palavra-Passe <i class="fa fa-key"></i></li>
                                </a>
                                <a href="backoffice/Backoffice.php"
                                   style="color: #FFFFFF; font-weight: bold; background-color: black">
                                    <li class="list-group-item">Backoffice</li>
                                </a>
                                <a href="meusAnuncios.php?id=<?php echo $_GET['id'] ?>">
                                    <li class="list-group-item">Meus Anúncios</li>
                                </a>
                            </ul>

                            <?php
                        } elseif ($dados2['userType'] == 'editor') {
                            ?>

                            <ul class="list-group" style="width: 19rem; margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: black; color: #FFF; font-weight: bold">

                                <a href="editaPerfil.php?id=<?php echo $_GET['id'] ?>"
                                   style="color: #FFFFFF; background-color: #0d0d0d; font-weight: bold">
                                    <li class="list-group-item">Definições de Perfil <i class="fa fa-edit"></i></li>
                                </a>
                                <a href="editaPerfilPassword.php?id=<?php echo $_GET['id'] ?>"
                                   style="color: #FFFFFF; background-color: #0d0d0d; font-weight: bold">
                                    <li class="list-group-item">Alterar Palavra-Passe <i class="fa fa-key"></i></li>
                                </a>
                                <a href="meusAnuncios.php?id=<?php echo $_GET['id'] ?>">
                                    <li class="list-group-item">Meus Anúncios</li>
                                </a>
                            </ul>
                            <?php
                        } elseif ($dados2['userType'] == 'user') {
                            ?>

                            <ul class="list-group" style="width: 19rem; margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: black; color: #FFF; font-weight: bold">

                                <a href="editaPerfil.php?id=<?php echo $_GET['id'] ?>"
                                   style="color: #FFFFFF; background-color: #0d0d0d; font-weight: bold">
                                    <li class="list-group-item">Definições de Perfil <i class="fa fa-edit"></i></li>
                                </a>
                                <a href="editaPerfilPassword.php?id=<?php echo $_GET['id'] ?>"
                                   style="color: #FFFFFF; background-color: #0d0d0d; font-weight: bold">
                                    <li class="list-group-item">Alterar Palavra-Passe <i class="fa fa-key"></i></li>
                                </a>
                                <a href="meusAnuncios.php?id=<?php echo $_GET['id'] ?>">
                                    <li class="list-group-item">Meus Anúncios</li>
                                </a>
                            </ul>

                            <?php
                        }else{
                            echo "";
                        }
                        ?>
                    </div>
                </div>


            </div>


            <div class="container-lg" style="width: 30%; margin-top: 5%">
                <div class="bp-item" style="margin-bottom: 5%">
                    <h4>Informações de Contacto</h4>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "pap2021gameon");
                    $sql3 = "select * from perfis inner join users on perfilUserId=userId  where perfilId=" . $_GET["id"];
                    $result3 = mysqli_query($con, $sql3);
                    $dados3 = mysqli_fetch_array($result3);
                    ?>
                    <hr>
                    <div>
                        <ul style="font-size: 20px; margin-bottom: 3%">
                            <li><?php echo $dados3['perfilNome'] ?></li>
                            <li><?php echo $dados3['perfilEmail'] ?></li>
                        </ul>
                        <a href="editaPerfil.php?id=<?php echo $dados3['perfilId'] ?>">
                            <button style="  font-size: 20px;" class="btn btn-primary">Editar
                            </button>
                        </a>
                    </div>

                </div>
                <div class="bp-item" style="margin-bottom: 5%">


                    <h4>Informações de Morada </h4>
                    <hr>
                    <div>
                        <a href="AdicionaMorada.php?id=<?php echo $_GET['id'] ?>">
                            <button class="btn btn-success" style="background-color: green; font-weight: bold; font-size: 20px">Adicionar
                                Morada
                            </button>
                        </a>
                        <?php
                        $sql4 = "select * from moradas inner join perfis on moradaPerfilId=perfilId where perfilId=" . $_GET['id'];
                        $res3 = mysqli_query($con, $sql4);
                        while ($dados3 = mysqli_fetch_array($res3)) {
                            ?>


                            <ul style="font-size: 20px;  margin-bottom: 3%">
                                <span><strong>Morada:</strong> <?php echo $dados3['moradaTexto'] ?></span>
                                <p><strong>Telefone:</strong> <?php echo $dados3['moradaTelefone'] ?></p>
                            </ul>

                            <a href="editaMorada.php?id=<?php echo $dados3['moradaId'] ?>">
                                <button style=" font-size: 20px;" class="btn btn-primary">
                                    Editar
                                </button>
                            </a>
                            <a onclick="confirmaEliminaMorada(<?php echo $dados3['moradaId'] ?>)">
                                <button style="background-color: red;  font-size: 20px;" class="btn btn-danger">Eliminar
                                </button>
                            </a>
                            <hr>


                            <?php
                        }

                        ?>

                    </div>


                </div>

            </div>


        </div>


    </section>
<?php
bottom();
?>