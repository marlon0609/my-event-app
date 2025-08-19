<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - My Event</title>
    <link rel="icon" href="{{ asset('img/logo/icon_white_my_event.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="container-fluid h-100">
            <div class="row g-0 h-100">
            <!-- Colonne gauche - Image avec texte motivant -->
            <div class="col-lg-6 login-hero">
                <div class="text-center text-white p-5">
                    <div class="mb-4">
                        <i class="fas fa-user-plus fa-4x text-warning mb-4"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-4">
                        Rejoignez <span class="text-warning">My Event</span>
                    </h1>
                    <p class="lead mb-4 fs-5">
                        Créez votre compte et accédez à un monde d'événements exceptionnels. 
                        L'aventure commence maintenant !
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <div class="text-center">
                            <i class="fas fa-rocket fa-2x text-warning mb-2"></i>
                            <p class="small">Inscription rapide</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-gift fa-2x text-warning mb-2"></i>
                            <p class="small">Offres exclusives</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-users fa-2x text-warning mb-2"></i>
                            <p class="small">Communauté active</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne droite - Formulaire d'inscription -->
            <div class="col-lg-6 login-form-section">
                <div class="w-100" style="max-width: 400px;">
                    <div class="p-5">
                        <!-- Header du formulaire -->
                        <div class="text-center mb-4">
                            <img src="{{ asset('img/logo/logo_blue_my_event.png') }}" alt="My Event" class="mb-3" style="height: 60px; width: auto; object-fit: contain;">
                            <h2 class="fw-bold text-primary mb-2">Inscription</h2>
                            <p class="text-muted">Créez votre compte My Event</p>
                        </div>

                        <!-- Messages d'erreur et de succès -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Formulaire d'inscription -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Nom complet -->
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Nom complet</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                                       class="form-control form-control-lg">
                            </div>

                            <!-- E-mail -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Adresse e-mail</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                       class="form-control form-control-lg">
                            </div>

                            <!-- Mot de passe -->
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Mot de passe</label>
                                <input type="password" name="password" id="password" required
                                       class="form-control form-control-lg">
                            </div>

                            <!-- Confirmation mot de passe -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirmer le mot de passe</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                       class="form-control form-control-lg">
                            </div>

                            <!-- Accepter les conditions -->
                            <div class="mb-4 form-check">
                                <input type="checkbox" name="terms" id="terms" class="form-check-input" required>
                                <label for="terms" class="form-check-label">
                                    J'accepte les <a href="#" class="text-warning">conditions d'utilisation</a>
                                </label>
                            </div>

                            <!-- Bouton d'inscription -->
                            <button type="submit" class="btn btn-primary w-100 btn-lg fw-semibold mb-4">
                                <i class="fas fa-user-plus me-2"></i>S'inscrire
                            </button>
                        </form>

                        <!-- Bouton retour à l'accueil -->
                        <div class="text-center mb-4">
                            <a href="{{ url('/') }}" class="btn btn-outline-primary rounded-pill px-4">
                                <i class="fas fa-home me-2"></i>Accueil
                            </a>
                        </div>

                        <!-- Liens utiles -->
                        <div class="text-center">
                            <small class="text-muted">Déjà un compte ?</small>
                            <a class="text-warning text-decoration-none fw-semibold ms-1" href="{{ route('login') }}">
                                Se connecter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Auth Validation JS -->
    <script src="{{ asset('js/auth-validation.js') }}"></script>
</body>
</html>
