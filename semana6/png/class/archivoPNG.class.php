<?php

class archivo
{
    protected $nombrearchivo;
    private $octetos;
    private $fechamodificacion;
    const PATH = 'img/';
    function __construct($f)
    {
        if (is_file(self::PATH . $f)) {
            $this->nombrearchivo = self::PATH . $f;
            $this->octetos = (filesize($this->nombrearchivo));
            $this->fechamodificacion = (filemtime($this->nombrearchivo));

        } else {
            die('**** ERROR NO SE ENCUENTRA EL ARCHIVO ' . $f . '***');
        }
    }

    function octetos()
    {
        return $this->octetos;
    }

    function fechamodificacion()
    {
        return $this->fechamodificacion;
    }

    function renombrar($nombrenuevo)
    {

        if (rename($this->nombrearchivo, $nombrenuevo)) {
            $this->nombrearchivo = $nombrenuevo;
            return 1;
        } else {
            echo "NO SE PUDO RENOMBRAR";
        }

    }
}

class archivoPNG extends archivo
{

    private $alto;
    private $ancho;
    private $bitsporcolor;

    function __construct($f)
    {
        parent::__construct($f);
        $props = getimagesize(parent::PATH . $f);
        $ind_tipo_img = 2;
        if ($props[$ind_tipo_img] != 3) {
            die("%%%% ERROR: '$f' no tiene formato gráfico PNG %%%%");
        } else {
            $ind_alto_img = 0;
            $ind_ancho_img = 1;
            $this->alto = $props[$ind_alto_img];
            $this->ancho = $props[$ind_ancho_img];
            $this->bitsporcolor = $props['bits'];
        }
    }

    function creamuestra($archivomuestra, $anchomuestra, $altomuestra)
    {
        $imgmuestra = ImageCreate($anchomuestra, $altomuestra);
        $imgoriginal = ImageCreateFromPNG($this->nombrearchivo);
        ImageCopyResized(
            $imgmuestra,
            $imgoriginal,
            0,
            0,
            0,
            0,
            $anchomuestra,
            $altomuestra,
            ImageSX($imgoriginal),
            ImageSY($imgoriginal)
        );

        ImagePNG($imgmuestra, parent::PATH . $archivomuestra);
    }

    function mostrarimagenesPNG($imagenoriginal, $imagenmuestra, $objorig, $objmuestra)
    {
        echo "<table id=\"emblemas\">\n 
        <tr>\n<th>\nImagen\n</th>\n
        <th>\nTamaño\n</th>\n
         <th>\nDimensiones</th>\n</tr>\n
          <tr class=\"even\">\n<td>\n<img
           src='/img/$imagenoriginal'>\n</td>\n 
           <td>\n" . $objorig->octetos() . " Kb</td>\n
            <td>\n" . $objorig->ancho() . "x" . $objorig->alto() . " px</td>\n</tr>\n
            <tr class=\"odd\">\nn<td>\n
            <img src='/img/$imagenmuestra'>\n</td>\n
            <td>\n" . $objmuestra->octetos() . "Kb</td>\n <td>\n", $objmuestra->ancho() .
            "x" . $objmuestra->alto() . "px</td>\n</tr>\n </table>";
    }
    function bitsporcolor()
    {
        return $this->bitsporcolor;
    }
    public function alto()
    {
        return $this->alto;
    }

    public function ancho()
    {
        return $this->ancho;
    }



}

?>