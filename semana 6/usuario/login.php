<?php

if (!function_exists('classAutoLoader')) {
    function classAutoLoader($classname)
    {
        $classname = strtolower($classname);
        $classfile = 'class/' . $classname . '.class.php';
        if (is_file($classfile) && !class_exists($classname))
            include $classfile;


    }

}
spl_autoload_register('classAutoLoader');

if ($_POST) {
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
    $pass = isset($_POST["pass"]) ? $_POST["pass"] : '';

    //Instaciamos clases
    $Usuario = new Usuario($nombre, $pass);

    $Login = new Login($nombre, $pass);

    $filaUsuario = $Usuario->obtener_datos();
    $login = $Login->verificarUsuario($filaUsuario);

    if ($login) {
        //direccionar
        header("Location: index.php?usuario=" . $Usuario->getNombre());
    } else {
        //direccionar
        header("Location: login.php?error=1");
    }
}
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
    <section id="login">
    <header>
    <h2>Login</h2>
    </header>
    <form method="post" action="login.php">
    <?php
    if (isset($_GET["error"]) and $_GET["error"] == 1) {
        ?>
                                <h3>Error al intentar iniciar sesión</h3>
                                <?php
    }
    ?>
    <dl>
    <dt><label for="nombre">Nombre:</label></dt>
    <dd><input type="text" name="nombre" value=""></dd><br> 
    
    <dt><label for="pass">Password: </label></dt>
    <dd><input type="password" name="pass" value=""></dd><br>
    </dl>
    <input type="submit" value="Login">
    </form>
    </section>
    </body>
    </html>