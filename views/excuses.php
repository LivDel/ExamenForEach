<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des excuses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4 text-center">Liste des excuses du dev</h1>

    <ul class="list-group shadow">
        <?php foreach ($excuses as $excuse): ?>
            <li class="list-group-item d-flex align-items-center">
                <span class="me-3">-</span>
                <span><?= htmlspecialchars($excuse) ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
