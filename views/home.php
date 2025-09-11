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
        <button type="button" class="btn btn-success btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#addExcuseModal">
            Ajouter une nouvelle excuse
        </button>

        <!-- Loader de bootstrap -->
        <div class="d-flex justify-content-center mt-3">
            <div id="loader" class="spinner-border text-primary fade" role="status" style="display: none;">
                <span class="visually-hidden">Chargement...</span>
            </div>
        </div>

        <!-- Modale pour ajouter une excuse -->
        <div class="modal fade" id="addExcuseModal" tabindex="-1" aria-labelledby="addExcuseModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-4">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="addExcuseModalLabel">Ajouter une excuse</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addExcuseForm">
                            <div class="mb-3">
                                <label for="newExcuse" class="form-label">Nouvelle excuse</label>
                                <input type="text" class="form-control" id="newExcuse" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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

    // Ajouter une nouvelle excuse au tableau
        const addForm = document.getElementById('addExcuseForm');
        addForm.addEventListener('submit', e => {
            e.preventDefault();
            const input = document.getElementById('newExcuse');
            const value = input.value.trim();
            if(value){
                excuses.push(value); // ajoute l'excuse au tableau existant
                input.value = '';
                alert('Nouvelle excuse ajoutée !'); 
                const addModal = bootstrap.Modal.getInstance(document.getElementById('addExcuseModal'));
                addModal.hide();
            }
        });
    </script>

</body>
</html>
