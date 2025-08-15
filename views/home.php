<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excuses du dev</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card text-center p-5 shadow mx-auto" style="max-width: 600px; width: 100%;">
        <h1 class="mb-4">Excuses du dev</h1>
        <p id="excuse-text" class="fs-5 mb-4 fade show">Appuyez sur le bouton afin d'avoir mes excuses.</p>
        <button id="generate-btn" class="btn btn-primary btn-lg">Générer une excuse</button>

        <div class="d-flex justify-content-center mt-3">
            <div id="loader" class="spinner-border text-primary fade" role="status" style="display: none;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <script>
        // Récupérer les excuses depuis PHP
        const excuses = <?php echo json_encode($excuses); ?>;
        let lastExcuse = '';

        const btn = document.getElementById('generate-btn');
        const loader = document.getElementById('loader');
        const excuseText = document.getElementById('excuse-text');

         btn.addEventListener('click', () => {
        // fade-out du texte
        excuseText.classList.remove('show');
        excuseText.offsetWidth; // forcer le reflow pour animation

        // afficher loader avec fade-in
        loader.style.display = 'inline-block';
        setTimeout(() => loader.classList.add('show'), 10);

        btn.disabled = true;

        const delay = Math.random() * 4000 + 1000; // 1 à 5 secondes

        setTimeout(() => {
            let excuse;
            do {
                excuse = excuses[Math.floor(Math.random() * excuses.length)];
            } while (excuse === lastExcuse);
            lastExcuse = excuse;

            excuseText.textContent = excuse;

            // fade-out loader
            loader.classList.remove('show');
            setTimeout(() => loader.style.display = 'none', 200);

            // fade-in texte
            excuseText.classList.add('show');

            btn.disabled = false;
        }, delay);
    });
    </script>

</body>
</html>
