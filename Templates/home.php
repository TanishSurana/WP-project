<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/hood/static/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name='author' content="tanish">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hood Hassle</title>
</head>
<body>
    <div class="container">
        <div class='home-head'>
            <span>
                <figure style='display: inline;'>
                    <img src="../static/logograylow.webp" width="15%">
                </figure>
            </span>
            <span style="display: inline-block; transform: translateY(10px);">HoodHassles</span>
            <h2 class="q">"Mere ghar ke bahar se kachra kab hatega?"</h2>
        </div>
        <div class='getloc'>
            <h1>Enter your Geo-coordinates</h1>
            <form action="savelocation.php" method="post">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 ll"><input class="form-control" step="0.0000001" name="lati" type="number" required placeholder="Enter latitude (19.213508)" min='-180' max="180"></div>
                    <div class="col-lg-6 col-sm-12 ll"><input class="form-control" step="0.0000001" name="longi" type="number" required placeholder="Enter longitude (72.874696)" min='-180' max="180"></div>
                </div>

                <input class="btn btn-dark" type="submit">
            </form>

        </div>
    </div>

</body>
</html>