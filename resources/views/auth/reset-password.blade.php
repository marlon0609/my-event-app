<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe - My Event</title>
    <link rel="icon" href="{{ asset('img/logo/icon_white_my_event.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row g-0 min-vh-100">
            <!-- Left Column - Hero Image -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="login-hero d-flex align-items-center justify-content-center text-white position-relative">
                    <div class="text-center z-index-2">
                        <h1 class="display-4 fw-bold mb-4">🔐 Nouveau mot de passe</h1>
                        <p class="lead mb-0">Créez un mot de passe sécurisé pour protéger votre compte My Event</p>
                    </div>
                </div>
            </div>

            <!-- Right Column - Reset Password Form -->
            <div class="col-lg-6">
                <div class="login-form-section d-flex align-items-center justify-content-center min-vh-100">
                    <div class="w-100" style="max-width: 400px;">
                        <!-- Logo for mobile -->
                        <div class="text-center mb-4 d-lg-none">
                            <h2 class="fw-bold text-primary">My Event</h2>
                        </div>

                        <div class="card border-0 shadow-lg">
                            <div class="card-body p-5">
                                <h3 class="card-title text-center mb-4 fw-bold">Réinitialiser le mot de passe</h3>

                                <!-- Display validation errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <!-- Display success message -->
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="fas fa-check-circle me-2"></i>
                                        {{ session('status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.update') }}" id="resetPasswordForm">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">
                                            <i class="fas fa-envelope me-2"></i>Adresse e-mail
                                        </label>
                                        <input type="email" 
                                               class="form-control @error('email') is-invalid @enderror" 
                                               id="email" 
                                               name="email" 
                                               value="{{ old('email', $email) }}" 
                                               required 
                                               readonly>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            <i class="fas fa-lock me-2"></i>Nouveau mot de passe
                                        </label>
                                        <input type="password" 
                                               class="form-control @error('password') is-invalid @enderror" 
                                               id="password" 
                                               name="password" 
                                               required 
                                               minlength="8">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Minimum 8 caractères
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="password_confirmation" class="form-label">
                                            <i class="fas fa-lock me-2"></i>Confirmer le mot de passe
                                        </label>
                                        <input type="password" 
                                               class="form-control @error('password_confirmation') is-invalid @enderror" 
                                               id="password_confirmation" 
                                               name="password_confirmation" 
                                               required 
                                               minlength="8">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg" id="resetPasswordBtn">
                                            <i class="fas fa-key me-2"></i>
                                            <span class="btn-text">Réinitialiser le mot de passe</span>
                                            <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                                        </button>
                                    </div>
                                </form>

                                <!-- Footer Links -->
                                <div class="text-center mt-4">
                                    <a href="{{ route('login') }}" class="text-decoration-none">
                                        <i class="fas fa-arrow-left me-2"></i>Retour à la connexion
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/auth-validation.js') }}"></script>
</body>
</html>
