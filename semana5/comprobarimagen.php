<?php

function comprobarimagen($archivo)
{
    $patron = "/\.(gif|jpe?g|png)$/i";
    $verificado = preg_match($patron, $archivo);
    $esImagen = $verificado == true ? "(es imagen)" : "(no es imagen)";
    ;
    return $esImagen;
}
?>