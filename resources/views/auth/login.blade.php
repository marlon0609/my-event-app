<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - My Event</title>
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
                        <i class="fas fa-calendar-alt fa-4x text-warning mb-4"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-4">
                        Bienvenue sur <span class="text-warning">My Event</span>
                    </h1>
                    <p class="lead mb-4 fs-5">
                        Découvrez, réservez et participez aux événements les plus extraordinaires. 
                        Votre prochaine aventure commence ici !
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <div class="text-center">
                            <i class="fas fa-ticket-alt fa-2x text-warning mb-2"></i>
                            <p class="small">Réservation simple</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-shield-alt fa-2x text-warning mb-2"></i>
                            <p class="small">Paiement sécurisé</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                            <p class="small">24h/24 - 7j/7</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne droite - Formulaire de connexion -->
            <div class="col-lg-6 login-form-section">
                <div class="w-100" style="max-width: 400px;">
                    <div class="p-5">
                        <!-- Header du formulaire -->
                        <div class="text-center mb-4">
                            <img src="{{ asset('img/logo/logo_blue_my_event.png') }}" alt="My Event" class="mb-3" style="height: 60px; width: auto; object-fit: contain;">
                            <h2 class="fw-bold text-primary mb-2">Connexion</h2>
                            <p class="text-muted">Accédez à votre espace personnel</p>
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

                        <!-- Formulaire de connexion -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- E-mail -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Adresse e-mail</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                                       class="form-control form-control-lg">
                            </div>

                            <!-- Mot de passe -->
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Mot de passe</label>
                                <input type="password" name="password" id="password" required
                                       class="form-control form-control-lg">
                            </div>

                            <!-- Se souvenir -->
                            <div class="mb-4 form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">Se souvenir de moi</label>
                            </div>

                            <!-- Bouton de connexion -->
                            <button type="submit" class="btn btn-primary w-100 btn-lg fw-semibold mb-4">
                                <i class="fas fa-sign-in-alt me-2"></i>Se connecter
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
                            <a href="{{ route('password.request') }}" class="text-warning text-decoration-none fw-semibold">
                                Mot de passe oublié ?
                            </a>
                            <div class="mt-3">
                                <small class="text-muted">Pas encore de compte ?</small>
                                <a class="text-warning text-decoration-none fw-semibold ms-1" href="{{ route('register') }}">
                                    S'inscrire
                                </a>
                            </div>
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