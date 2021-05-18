<?php
include_once ("../includes/body.inc.php");
top();
$con=mysqli_connect("localhost", "root","","pap2021gameon");
$sql="select * from users";
$res=mysqli_query($con,$sql);

?>
<table class="table table-striped" style="color: #FFFFFF; font-weight: bold; font-size: 20px; text-align: center">
    <tr>
        <th>User Id</th>
        <th>User Nome</th>
        <th>User Estado</th>
        <th>User Tipo</th>
    </tr>

        <?php
        while ($dados=mysqli_fetch_array($res)){
        ?>
    <tr>
        <td><?php echo $dados["userId"]?></td>
        <td><?php echo $dados["userName"]?></td>
        <td><select name="userState" onchange="updateEstado(<?php echo $dados["userState"]?>)">
                <option value="userState"><?php echo $dados["userState"]?></option>
                <option value="userState">
                    <?php
                    if($dados["userState"] == 'ativo' ){
                        echo "inativo";
                    }
                    elseif ($dados["userState"] == 'inativo' ){
                        echo "ativo";

                    }else{
                        echo "ativo";
                    }
                    ?></option>


                <option value="userState">
                    <?php
                    if($dados["userState"] == 'inativo' ){
                        echo "pendente";
                    }
                    elseif ($dados["userState"] == 'ativo' ){
                        echo "pendente";

                    }else{
                        echo "inativo";
                    }
                    ?></option>

            </select></td>


        <td><select name="userType">
            <option value="<?php echo $dados["userType"]?>"><?php echo $dados["userType"]?></option>
            <option value="userType">
                <?php
                if($dados["userType"] == 'user' ){
                    echo "admin";
                }elseif($dados["userType"] == 'admin' ){
                    echo "editor";
                }else{
                    echo "user";
                }

                    ?>

            </option>

            <<option value="userType">
                    <?php
                    if($dados["userType"] == 'user' ){
                        echo "editor";
                    }elseif($dados["userType"] == 'admin' ){
                        echo "user";
                    }else{
                        echo "user";
                    }

                    ?>

                </option>
            </select></td>
    </tr>
        <?php
        }
        ?>

</table>


<?php
bottom();
?>
