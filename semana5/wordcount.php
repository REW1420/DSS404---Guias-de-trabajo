<?php
/*El texto recibido en $texto es el texto que se ingresó en la caja de texto del formualrio*/
function wordcount($texto)
{
    // Eliminando espacios en blanco entre palabras y signos de puntuación.
    $textoLimpio = preg_replace("/[\s\p{P}]+/u", " ", trim($texto));

    // Contando las palabras y almacenándolas en un array.
    $palabras = preg_split("/\s/u", $textoLimpio);

    // Eliminando palabras vacías.
    $palabras = array_filter($palabras, function ($palabra) {
        return !empty($palabra);
    });

    return $palabras;
}