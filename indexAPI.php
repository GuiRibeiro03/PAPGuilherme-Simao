

    <script>

        {
            "access_token": "epz2ym5b3y3uq6skv9xtdqz97v27pj",
            "expires_in": 4849659,
            "token_type": "bearer"
        }

    function auth(id){
        $.ajax({
                POST: "https://id.twitch.tv/oauth2/token",
                client_id: "x6vzfmpjecjafohpdh8muj2ladt8xd",
                client_secret:"yfb4t31wos78svif4834jn5jg19mbp",
                grant_type: "client_credentials",
                fields "*";


                url: "https://api.igdb.com/v4/games",
                type: "post",
                data: {
                        name:id
                }
                success: function (auth){
                        $('#nome').html(auth);
                }

                });
            }

        $('document').ready(function (){
           auth();
        });
</script>

<body>
<span id="nome"></span>
</body>

