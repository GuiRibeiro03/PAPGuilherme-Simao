<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

    <script>
        var settings = {
            "url": "https://id.twitch.tv/oauth2/token?client_id=x6vzfmpjecjafohpdh8muj2ladt8xd&client_secret=yfb4t31wos78svif4834jn5jg19mbp&grant_type=client_credentials",
            "method": "POST",
            "timeout": 0,
        };

        $.ajax(settings).done(function (response) {
            console.log(response);
            $('#nome').html(response);
        });
</script>

<body>
<span id="nome"></span>
</body>

