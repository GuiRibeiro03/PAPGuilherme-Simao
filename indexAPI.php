<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function getName(id){
            $.ajax({
                POST: "https://api.igdb.com/v4/games",
                Client-ID: "x6vzfmpjecjafohpdh8muj2ladt8xd",
                Authorization: "Bearer yfb4t31wos78svif4834jn5jg19mbp",
                fields "*";




            url:"https://sav2.fpb.pt/api/portal/juizes/juizes.php",
                type:"get",
                data:{
                n_filiado:id
            },
            success:function (result){
                $('#nome').html(result);
            }
        });
        }

        $('document').ready(function (){
            getName(5017)
        });
    </script>
</head>
<body>
<span id="nome"></span>
</body>
</html>