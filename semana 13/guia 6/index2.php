<!DOCTYPE html>
<html lang="es">

<head>

    <title>Sistema de encuesta Live Poll con PHP, Mysql y Ajax</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form id="poll_form"> <!-- Added form tag and id -->
                    <div class="radio">
                        <label>
                            <h4>
                                <input type="radio" name="poll_option" class="poll_option" value="Laravel" /> Laravel
                            </h4>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <h4>
                                <input type="radio" name="poll_option" class="poll_option" value="CodeIgniter" />
                                CodeIgniter
                            </h4>
                        </label>
                    </div>
                    <!-- Add the remaining radio buttons here -->
                    <br />
                    <input type="submit" name="poll_button" id="poll_button" class="btn btn-primary" />
                </form> <!-- Closed the form tag -->
                <br />
            </div>
            <div class="col-md-6">
                <h4>Resultados de la encuesta Live Poll</h4><br />
                <div id="poll_result"></div>
            </div>
        </div>
    </div>
    <script src="poll_data.js"></script>
</body>

</html>