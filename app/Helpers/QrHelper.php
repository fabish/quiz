<?php
// app/Helpers/QrHelper.php
if (!function_exists('generate_qr_code')) {
    function generate_qr_code($data, $filename)
    {
        // Incluir la librería PHP QR Code
        include_once APPPATH . 'ThirdParty/phpqrcode/qrlib.php';

        // Configuración del código QR
        $tempDir = WRITEPATH . 'uploads/';
        $pngAbsoluteFilePath = $tempDir . $filename;

        // Crear el código QR
        QRcode::png($data, $pngAbsoluteFilePath);

        return $pngAbsoluteFilePath;
    }
}