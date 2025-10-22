<x-dashboard.app>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Mon profil</h5>
                    </div>
                    <div class="card-body">
                        @if(session('success_profile'))
                            <div class="alert alert-success">{{ session('success_profile') }}</div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label text-muted">Nom</label>
                            <div class="fw-semibold">{{ $user->name }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Email</label>
                            <div class="fw-semibold">{{ $user->email }}</div>
                        </div>
                        @if($user->created_at)
                        <div class="mb-3">
                            <label class="form-label text-muted">Membre depuis</label>
                            <div class="fw-semibold">{{ $user->created_at->format('d/m/Y') }}</div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Formulaire: Infos personnelles -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Mettre à jour mes informations</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>

                <!-- Formulaire: Changer de mot de passe -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Changer mon mot de passe</h6>
                    </div>
                    <div class="card-body">
                        @if(session('success_password'))
                            <div class="alert alert-success">{{ session('success_password') }}</div>
                        @endif
                        <form method="POST" action="{{ route('profile.password') }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Mot de passe actuel</label>
                                <input type="password" id="current_password" name="current_password" class="form-control @error('current_password', 'password') is-invalid @enderror" required>
                                @error('current_password', 'password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Nouveau mot de passe</label>
                                <input type="password" id="password" name="password" class="form-control @error('password', 'password') is-invalid @enderror" required>
                                @error('password', 'password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-warning">Mettre à jour le mot de passe</button>
                        </form>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="/dashboard" class="btn btn-outline-secondary">Retour</a>
                    <form action="{{ route('logout') }}" method="POST" class="ms-auto">
                        @csrf
                        <button type="submit" class="btn btn-danger">Se déconnecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.app>
