<?php
if (!isset($_GET["id"])) {
    header("Location: " . $_ENV["HOST_URI"] . "?id=clarin.eu:cr1:p_1708423613607");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>CMDI Form Checker</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="https://cmdicdn.sd.di.huc.knaw.nl/css/ccfstyle.css" type="text/css"/>
    <link rel="stylesheet" href="https://cmdicdn.sd.di.huc.knaw.nl/css/autocomplete.css" type="text/css"/>
    <link rel="stylesheet" href="https://cmdicdn.sd.di.huc.knaw.nl/css/jquery-ui.css" type="text/css" />
    <script type="text/javascript" src="https://cmdicdn.sd.di.huc.knaw.nl/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cmdicdn.sd.di.huc.knaw.nl/js/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="https://cmdicdn.sd.di.huc.knaw.nl/js/jquery-ui/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/ccf_config_en.js"></script>
    <script type="text/javascript" src="https://cmdicdn.sd.di.huc.knaw.nl/js/ccfparser.js"></script>

    <script>
        $('document').ready(function () {
            //setEvents();
            var host = "<?php echo $_ENV["HOST_URI"];?>" + "fetch_json.php";
            var url = "<?php echo $_ENV["CMDI_URI"];?>";
            var id = "<?php echo $_GET["id"] ?>";
            var params = {cmdi_url: url.replace("[PROFILE_ID]", id), cmdi_id: id};
            //var host = "http://www.huc.localhost/demo/fetch_json.php";
            //var host = "http://localhost:8091/fetch_json.php";

            $.ajax({
                type: "POST",
                url: host,
                data: params,
                success: function (json) {
                    obj = json;
                    console.log(obj);
                    formBuilder.start(obj);
                },
                error: function (err) {
                    obj = {"error": err};
                    console.log(obj);
                }
            });

        })
    </script>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <?php echo $_ENV["APPLICATION_NAME"] ?>
    </div>
    <div id="user"></div>
    <div id="homeBtn"></div>
    <div id="content">
        <div id="ccform"></div>
    </div>
</div>
</body>
</html>
