<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XML View</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Listado de Usuarios XML</h1>
        <ul class="list-group">
            <?php $xml = simplexml_load_string($xmlString); ?>
            <?php foreach ($xml->customer as $customer): ?>
                <li class="list-group-item">
                    <strong>pkUser:</strong> <?= $customer->pkUser ?><br>
                    <strong>fkPhone:</strong> <?= $customer->fkPhone ?><br>
                    <strong>fkLevel:</strong> <?= $customer->fkLevel ?><br>
                    <strong>fkProfession:</strong> <?= $customer->fkProfession ?><br>
                    <strong>status:</strong> <?= $customer->status ?><br>
                    <strong>locked:</strong> <?= $customer->locked ?><br>
                    <strong>inSession:</strong> <?= $customer->inSession ?><br>
                    <strong>create_Ad:</strong> <?= $customer->create_Ad ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
