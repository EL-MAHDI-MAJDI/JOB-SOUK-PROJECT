<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compte désactivé</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2eafc 100%);
            min-height: 100vh;
        }
        .card-disabled {
            max-width: 600px;
            margin: auto;
            margin-top: 10vh;
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            background: #fff;
        }
        .icon-lock {
            font-size: 4.5rem;
            color: #ffc107;
        }
        .title {
            color: #dc3545;
            font-weight: 700;
        }
        .subtitle {
            color: #6c757d;
        }
        .contact-info {
            margin-top: 2rem;
            font-size: 1.1rem;
        }
        .contact-info i {
            color: #0d6efd;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card card-disabled p-5 text-center">
            <div>
                <i class="bi bi-lock-fill icon-lock mb-3"></i>
            </div>
            <h4 class="title mb-2">Votre compte est désactivé</h4>
            <p class="subtitle mb-0">
                Veuillez contacter l’administrateur pour plus d’informations.
            </p>
            <div class="contact-info text-start mx-auto" style="max-width:350px;">
                <hr>
                <div class="mb-2">
                    <i class="bi bi-envelope-fill"></i>
                    <span>admin@jobsouk.com</span>
                </div>
                <div>
                    <i class="bi bi-telephone-fill"></i>
                    <span>+212 6 12 34 56 78</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
