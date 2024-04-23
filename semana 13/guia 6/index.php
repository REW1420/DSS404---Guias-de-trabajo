<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Autocompletar usando PHP/MySQL y jQuery</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
        if (typeof jQuery == 'undefined') {
            document.write(unescape("%3Cscript src='jquery/jquery.js'%3E%3C/script%3E"));
        }
    </script>
    <script src="js/script.js"></script>
</head>

<body>
    <!-- container -->
    <div class="container">
        <!-- header -->
        <div class="header">
            <img src="images/BeWebDeveloper.png" />
        </div>
        <h1 class="main_title">Autocompletar usando PHP/MySQL y jQuery</h1>
        <!-- content -->
        <div class="content">
            <form>
                <div class="label_div">Ingreso nombre de país: </div>
                <div class="input_container">
                    <input type="text" id="country_id" onkeyup="autocomplet()">
                    <ul id="country_list_id"></ul>
                </div>
            </form>
        </div>
        <!-- footer -->
        <div class="footer">
            Powered by <a href="javascript:void(0)">bewebdeveloper.com</a>
        </div>
    </div>
</body>

</html>