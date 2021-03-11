<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

    <script>
        var settings = {
            "type": "POST",
            "url": "https://api.igdb.com/v4/games",
            "headers": {
                "Client-ID":"x6vzfmpjecjafohpdh8muj2ladt8xd",
                "Authorization":"Bearer xy0d3yz5z5s8qa5fhmfsxgdzq8m4w6",
            }
        };

        $.ajax(settings).done(function (response) {
            console.log(response);
            $('#nome').html(response);
        });
</script>

<body>
<span id="nome"></span>
</body>

