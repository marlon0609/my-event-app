<x-dashboard.app title="Paramètres">
    <div class="container py-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>Veuillez corriger les erreurs du formulaire.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- Profil -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h2 class="h5 mb-0"><i class="fas fa-user me-2 text-muted"></i>Profil</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', auth()->user()->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', auth()->user()->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Enregistrer
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mot de passe -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h2 class="h5 mb-0"><i class="fas fa-lock me-2 text-muted"></i>Mot de passe</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.password') }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Mot de passe actuel</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" autocomplete="current-password" required>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nouveau mot de passe</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirmer le nouveau mot de passe</label>
                                <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password" required>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-key me-2"></i>Mettre à jour
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Préférences -->
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h2 class="h5 mb-0"><i class="fas fa-sliders-h me-2 text-muted"></i>Préférences</h2>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Langue</label>
                                <select class="form-select" disabled>
                                    <option selected>Français (bientôt modifiable)</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Devise</label>
                                <select class="form-select" disabled>
                                    <option selected>FCFA (bientôt modifiable)</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label d-block">Thème</label>
                                <form method="POST" action="{{ route('profile.theme') }}" class="d-inline-block">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="theme" value="{{ auth()->user()?->theme === 'dark' ? 'dark' : 'light' }}">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="themeSwitch"
                                               @checked(auth()->user()?->theme === 'dark')
                                               onchange="this.form.theme.value = this.checked ? 'dark' : 'light'; this.form.submit();">
                                        <label class="form-check-label" for="themeSwitch">
                                            <i class="fas fa-sun me-1"></i> Clair / <i class="fas fa-moon ms-1"></i> Sombre
                                        </label>
                                    </div>
                                </form>
                                <small class="text-muted d-block mt-1">Le thème s’applique au tableau de bord.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.app>
