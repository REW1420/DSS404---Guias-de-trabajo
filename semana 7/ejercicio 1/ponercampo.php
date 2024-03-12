<?php

function ponercampo($valore)
{
    if ($valore == 0) {
        $valore = "&nbsp";

    }

    echo '<td>\n' . $valore . '\n</td>\n';
}