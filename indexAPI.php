<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

        function getName(){
            $.ajax({
                POST: "https://id.twitch.tv/oauth2/token?client_id=abcdefg12345&client_secret=hijklmn67890&grant_type=client_credentials",
                Client_ID: "x6vzfmpjecjafohpdh8muj2ladt8xd",
                Authorization: "Bearer yfb4t31wos78svif4834jn5jg19mbp",
                grant_type:"client_credentials";


            url:"https://api.igdb.com/v4/games/",
                type:"POST",
                data:{
                    fields name; limit 10;
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



<footer>


</footer>

</body>
</html>