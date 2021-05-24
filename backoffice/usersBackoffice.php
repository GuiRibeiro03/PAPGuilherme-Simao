<?php
include_once ("../includes/body.inc.php");
include_once ("../includes/config.inc.php");
top();


$sql2="select * from users where userId=".$_SESSION['id'];
$res2=mysqli_query($con,$sql2);
$dados=mysqli_fetch_array($res2);
if($dados['userType']=='admin'){


?>
<table class="table" style="color: #FFFFFF; font-weight: bold; font-size: 20px; text-align: center">
    <tr>
        <th>User Id</th>
        <th>User Nome</th>
        <th>User Estado</th>
        <th>User Tipo</th>
        <th>Opções</th>
    </tr>

        <?php
        $con=mysqli_connect(HOST, USER,PASSWORD,DATABASE);
        $sql="select * from users";
        $res=mysqli_query($con,$sql);
        while ($dados=mysqli_fetch_array($res)){
        ?>
    <tr>
        <td><?php echo $dados["userId"]?></td>
        <td><?php echo $dados["userName"]?></td>

        <form action="../AJAX/AJAXUpdateState.php?id=<?php echo $dados["userId"]; ?>" method="post" >
        <td><select name="userState" id="select1" onchange="alterarTexto(<?php echo $dados["userState"]?>)">
                <option><?php echo $dados["userState"]?></option>

                <option>
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


                <option>
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


        <td><select name="userType" id="select2">
            <option value="<?php echo $dados["userType"]?>"><?php echo $dados["userType"]?></option>
            <option>
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

                <option>
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
            </select><label style="color:#FFF;" id="textChange2"></label></td>
        <td><button type="submit" class="btn btn-primary">Update</button></td>
        </form>
    </tr>
        <?php
        }
        ?>

</table>


<script>
    function alterarTexto(value){
        value = this.value
        alert(  value  );
        if(document.getElementById("#select1").valueOf(this) != value){
            document.getElementById("#textChange2").innerText = "Alterações!";
        }
    }

</script>


<?php
}else{
    header("location: index.php");
}


bottom();
?>
