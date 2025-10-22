<!-- Dashboard Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom">
    <div class="container-fluid px-4">
        <!-- Logo et titre -->
        <div class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('img/logo/logo_blue_my_event.png') }}" alt="My Event" style="height: 50px; width: auto;">
            {{-- <span class="ms-3 fw-bold text-primary d-none d-md-block">Dashboard</span> --}}
        </div>

        <!-- Bouton toggle pour mobile -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#dashboardNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="dashboardNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Switch Thème -->
                <li class="nav-item me-3">
                    <form method="POST" action="{{ route('profile.theme') }}" class="d-flex align-items-center">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="theme" value="{{ auth()->user()?->theme === 'dark' ? 'dark' : 'light' }}">
                        <div class="form-check form-switch m-0" title="Basculer le thème">
                            <input class="form-check-input" type="checkbox" role="switch" id="themeSwitchHeader"
                                   @checked(auth()->user()?->theme === 'dark')
                                   onchange="this.form.theme.value = this.checked ? 'dark' : 'light'; this.form.submit();">
                            <label class="form-check-label ms-2 d-none d-lg-inline" for="themeSwitchHeader">
                                <i class="fas fa-sun me-1"></i><span class="small">Clair</span> / <i class="fas fa-moon ms-1"></i><span class="small">Sombre</span>
                            </label>
                        </div>
                    </form>
                </li>

                <!-- Notifications -->
                <li class="nav-item dropdown me-3">
                    <a class="nav-link position-relative" href="#" id="notificationsDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell fa-lg text-muted"></i>
                        <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                            3
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="width: 300px;">
                        <li><h6 class="dropdown-header">Notifications récentes</h6></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-ticket-alt me-2 text-primary"></i>Nouvelle réservation confirmée</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-calendar me-2 text-warning"></i>Événement dans 2 jours</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-star me-2 text-success"></i>Nouvel événement disponible</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center small" href="#">Voir toutes les notifications</a></li>
                    </ul>
                </li>

                <!-- Profil utilisateur -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <div class="avatar-circle bg-primary text-white me-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; border-radius: 50%;">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </div>
                        <span class="d-none d-md-block">{{ Auth::user()->name ?? 'Utilisateur' }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li><h6 class="dropdown-header">Mon compte</h6></li>
                        <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user me-2"></i>Mon profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Paramètres</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-ticket-alt me-2"></i>Mes réservations</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>Se déconnecter
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
