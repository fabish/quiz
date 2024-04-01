<!-- En la vista QRView.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRView</title>
</head>
<body>
    <h1>Código QR Generado</h1>
    <img src="data:image/png;base64,<?= base64_encode($imageData) ?>" alt="Código QR">
</body>
</html>