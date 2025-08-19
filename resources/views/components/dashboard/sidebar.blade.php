<!-- Dashboard Sidebar -->
<nav class="sidebar bg-white shadow-sm border-end" style="width: 280px; min-height: calc(100vh - 76px);">
    <div class="p-3">
            <!-- Menu principal -->
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link active d-flex align-items-center py-2 px-3 rounded" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt me-3 text-primary"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded" href="#">
                        <i class="fas fa-calendar-alt me-3 text-muted"></i>
                        <span>Événements</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded" href="#">
                        <i class="fas fa-ticket-alt me-3 text-muted"></i>
                        <span>Mes réservations</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded" href="#">
                        <i class="fas fa-heart me-3 text-muted"></i>
                        <span>Favoris</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded" href="#">
                        <i class="fas fa-history me-3 text-muted"></i>
                        <span>Historique</span>
                    </a>
                </li>
            </ul>

            <hr class="my-4">

            <!-- Section compte -->
            <h6 class="text-muted text-uppercase small fw-bold mb-3">Mon compte</h6>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded" href="#">
                        <i class="fas fa-user me-3 text-muted"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded" href="#">
                        <i class="fas fa-credit-card me-3 text-muted"></i>
                        <span>Paiements</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded" href="#">
                        <i class="fas fa-cog me-3 text-muted"></i>
                        <span>Paramètres</span>
                    </a>
                </li>
            </ul>

            <hr class="my-4">

            <!-- Section aide -->
            <h6 class="text-muted text-uppercase small fw-bold mb-3">Support</h6>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded" href="#">
                        <i class="fas fa-question-circle me-3 text-muted"></i>
                        <span>Aide</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded" href="#">
                        <i class="fas fa-envelope me-3 text-muted"></i>
                        <span>Contact</span>
                    </a>
                </li>
            </ul>
        </div>
</nav>
