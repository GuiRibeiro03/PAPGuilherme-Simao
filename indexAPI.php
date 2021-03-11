<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

    <script>
        $.ajax({
            url: "https://cors-anywhere.herokuapp.com/api.igdb.com/v4/games?fields=id%2Cname",
            headers: {
                "Authorization": "Bearer ivzh4qch0aty83qd867jq7ni44olq3",
                "Client-ID": "x6vzfmpjecjafohpdh8muj2ladt8xd"
            },
        }).done((data) => {
            data.forEach((game) => console.log(game.name))
        }).fail((e) => console.error(e))
</script>

<body>
<span id="nome"></span>
</body>

