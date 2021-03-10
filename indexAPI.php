
    <script>
    function auth(){
        $.ajax({
                POST: "https://id.twitch.tv/oauth2/token",
                client_id: "x6vzfmpjecjafohpdh8muj2ladt8xd",
                client_secret:"yfb4t31wos78svif4834jn5jg19mbp",
                grant_type: "client_credentials"

                });
            }

    $('document').ready(function (){
        alert("hey")
    });
</script>

<body>
<span id="nome"></span>
</body>

