<?php

namespace BaconQrCode\Encoder\Writer;

use BaconQrCode\Renderer\RendererInterface;
use BaconQrCode\Encoder\QrCode;

class Png implements RendererInterface
{
    private int $height; // Propiedad para almacenar la altura de la imagen
    private string $foregroundColor; // Color de los módulos activos
    private string $backgroundColor; // Color de los módulos inactivos
    private int $moduleSize; // Tamaño de los módulos

    public function __construct(int $height)
    {
        $this->height = $height;
    }
    /**
     * Establece la altura de la imagen.
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }
    
    /**
     * Establece el color de los módulos activos.
     */
    public function setForegroundColor(string $foregroundColor): void
    {
        $this->foregroundColor = $foregroundColor;
    }

    /**
     * Establece el color de los módulos inactivos.
     */
    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * Establece el tamaño de los módulos.
     */
    public function setModuleSize(int $moduleSize): void
    {
        $this->moduleSize = $moduleSize;
    }

    /**
     * Renderiza el código QR en una imagen PNG y devuelve los datos de la imagen.
     */
    public function render(QrCode $qrCode): string
    {
        // Crea una nueva imagen PNG con la anchura y la altura adecuadas
        $image = imagecreatetruecolor($qrCode->getMatrix()->getWidth(), $this->height);

         // Define colores para el código QR
         $black = imagecolorallocate($image, 0, 0, 0);
         $white = imagecolorallocate($image, 255, 255, 255);
         // Nuevos colores para los módulos activos e inactivos
         $foregroundColor = imagecolorallocate($image, 255, 255, 255);
         $backgroundColor = imagecolorallocate($image, 0,0,0); // Usa $this->backgroundColor
 
         // Define el tamaño de los módulos
         $moduleSize = $this->moduleSize; // Usa $this->moduleSiz

        // Llena la imagen con el color blanco
        imagefill($image, 0, 0, $white);

        // Itera sobre cada celda del código QR
        for ($y = 0; $y < $qrCode->getMatrix()->getHeight(); $y++) {
            for ($x = 0; $x < $qrCode->getMatrix()->getWidth(); $x++) {
                // Si la celda está marcada, píntala de negro
                if ($qrCode->getMatrix()->get($x, $y) === 1) {
                    imagesetpixel($image, $x, $y, $black);
                }
            }
        }

        // Genera la imagen PNG como una cadena
        ob_start(); // Iniciar el almacenamiento en búfer de salida
        imagepng($image); // Generar la imagen PNG
        $imageData = ob_get_contents(); // Obtener los datos de la imagen PNG desde el búfer de salida
        ob_end_clean(); // Limpiar el búfer de salida

        // Libera la memoria utilizada por la imagen
        imagedestroy($image);

        return $imageData; // Devolver los datos de la imagen PNG como una cadena
    }
}