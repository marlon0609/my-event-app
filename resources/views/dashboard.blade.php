<x-dashboard.app title="Tableau de bord">
    <!-- Messages de succès -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Header avec salutation -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center bg-white rounded-4 p-4 shadow-sm border-0">
                <div class="mb-3 mb-md-0">
                    <h1 class="h3 mb-2 fw-bold" style="color: #0033FF;">
                        <i class="fas fa-sun me-2" style="color: #FFC300;"></i>
                        Bonjour, {{ Auth::user()->name ?? 'Utilisateur' }} !
                    </h1>
                    <p class="text-muted mb-0">Bienvenue sur votre tableau de bord My Event</p>
                    <small class="text-muted">
                        <i class="fas fa-calendar-day me-1"></i>
                        {{ \Carbon\Carbon::now()->locale('fr')->isoFormat('dddd D MMMM YYYY') }}
                    </small>
                </div>
                <div class="d-flex align-items-center">
                    <div class="me-3 text-center">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 50px; height: 50px; background: linear-gradient(135deg, #0033FF, #0033FF) !important;">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </div>
                    </div>
                    <div class="text-end d-none d-md-block">
                        <small class="text-muted d-block">Dernière connexion</small>
                        <small class="fw-semibold" style="color: #0033FF;">{{ date('H:i') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-5">
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-calendar-alt fa-3x text-primary"></i>
                    </div>
                    <h3 class="fw-bold text-primary">12</h3>
                    <p class="text-muted mb-0">Événements disponibles</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-ticket-alt fa-3x" style="color: #0033FF;"></i>
                    </div>
                    <h3 class="fw-bold" style="color: #0033FF;">3</h3>
                    <p class="text-muted mb-0">Mes réservations</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-heart fa-3x" style="color: #FFC300;"></i>
                    </div>
                    <h3 class="fw-bold" style="color: #FFC300;">8</h3>
                    <p class="text-muted mb-0">Favoris</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-coins fa-3x" style="color: #10B98F;"></i>
                    </div>
                    <h3 class="fw-bold" style="color: #10B98F;">245 FCFA</h3>
                    <p class="text-muted mb-0">Économisé ce mois</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">
                        <i class="fas fa-bolt text-warning me-2"></i>Actions rapides
                    </h5>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="#" class="btn btn-outline-primary w-100 py-3 text-start">
                                <i class="fas fa-search me-2"></i>
                                <div>
                                    <strong>Rechercher un événement</strong>
                                    <small class="d-block text-muted">Trouvez votre événement</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="#" class="btn btn-outline-success w-100 py-3 text-start">
                                <i class="fas fa-ticket-alt me-2"></i>
                                <div>
                                    <strong>Mes billets</strong>
                                    <small class="d-block text-muted">Gérer mes réservations</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="#" class="btn btn-outline-warning w-100 py-3 text-start">
                                <i class="fas fa-star me-2"></i>
                                <div>
                                    <strong>Recommandations</strong>
                                    <small class="d-block text-muted">Événements pour vous</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="#" class="btn btn-outline-info w-100 py-3 text-start">
                                <i class="fas fa-user-cog me-2"></i>
                                <div>
                                    <strong>Mon profil</strong>
                                    <small class="d-block text-muted">Paramètres du compte</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Réservations récentes -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">
                        <i class="fas fa-clock text-primary me-2"></i>Réservations récentes
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Événement</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary rounded me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-music text-white"></i>
                                            </div>
                                            <div>
                                                <strong>Concert Jazz Festival</strong>
                                                <small class="d-block text-muted">Salle Pleyel, Paris</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>25/12/2024</td>
                                    <td><span class="badge bg-success">Confirmé</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-warning rounded me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-theater-masks text-white"></i>
                                            </div>
                                            <div>
                                                <strong>Théâtre Molière</strong>
                                                <small class="d-block text-muted">Comédie Française</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>30/12/2024</td>
                                    <td><span class="badge bg-warning">En attente</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">
                        <i class="fas fa-fire text-danger me-2"></i>Événements populaires
                    </h5>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-danger rounded me-3" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-guitar text-white small"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <strong class="small">Rock Festival 2024</strong>
                                    <small class="d-block text-muted">15-17 Juin</small>
                                </div>
                                <small class="text-primary fw-bold">89 FCFA</small>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-success rounded me-3" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-palette text-white small"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <strong class="small">Exposition Picasso</strong>
                                    <small class="d-block text-muted">Jusqu'au 30 Mars</small>
                                </div>
                                <small class="text-primary fw-bold">25 FCFA</small>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-info rounded me-3" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-running text-white small"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <strong class="small">Marathon de Paris</strong>
                                    <small class="d-block text-muted">14 Avril</small>
                                </div>
                                <small class="text-primary fw-bold">45 FCFA</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.app>
