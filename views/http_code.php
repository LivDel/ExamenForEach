<?php
// Tableau associatif des codes HTTP et leurs messages
$http_messages = [
    '200' => 'OK - La requête a réussi.',
    '301' => 'Déplacé de façon permanente.',
    '302' => 'Déplacé temporairement.',
    '400' => 'Mauvaise requête.',
    '401' => 'Non autorisé.',
    '403' => 'Accès interdit.',
    '404' => 'Page non trouvée.',
    '500' => 'Erreur interne du serveur.',
    '502' => 'Bad Gateway.',
    '503' => 'Service indisponible.'
];

// Si le code n’existe pas dans le tableau, on met un message générique
$message = $http_messages[$code] ?? 'Code HTTP inconnu.';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Code HTTP <?= htmlspecialchars($code) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card text-center p-5 shadow" style="max-width: 600px; width: 100%;">
    <h1 class="mb-4">Code HTTP <?= htmlspecialchars($code) ?></h1>
    <p class="fs-5"><?= htmlspecialchars($message) ?></p>
    <a href="/" class="btn btn-primary mt-3">Retour à l’accueil</a>
</div>

</body>
</html>