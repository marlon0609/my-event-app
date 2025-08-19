<x-layouts.app>
    <!-- HERO SECTION -->
    <section class="hero-section position-relative overflow-hidden">
        <!-- Background Image -->
        <div class="hero-bg position-absolute w-100 h-100">
            <img src="img/ChatGPT_Image.png" alt="Port digital" class="w-100 h-100 object-fit-cover">
            <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
        </div>
        
        <!-- Hero Content -->
        <div class="container position-relative z-2 text-center text-white py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="hero-content py-5 my-5">
                        <h1 class="hero-title display-3 fw-bold mb-4 animate-fade-up">
                            <span class="text-white">Votre voyage commence ici</span>
                            <span class="d-block text-warning mt-2">avec My Event</span>
                        </h1>
                        <p class="hero-subtitle lead mb-5 fs-4 animate-fade-up" style="animation-delay: 0.2s;">
                            Réservez vos billets événementiels en quelques clics, 24h/24, 7j/7.
                        </p>
                        
                        <div class="hero-buttons d-flex flex-column flex-sm-row gap-3 justify-content-center animate-fade-up" style="animation-delay: 0.4s;">
                            <a href="{{ url('/index') }}" class="btn btn-warning btn-lg px-5 py-3 fw-semibold rounded-pill shadow-lg">
                                <i class="fas fa-calendar-alt me-2"></i>
                                Explorer les événements
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-5 py-3 fw-semibold rounded-pill">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Se connecter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator position-absolute bottom-0 start-50 translate-middle-x mb-4">
            <div class="scroll-arrow animate-bounce">
                <a href="#services">
                    <i class="fas fa-chevron-down text-white fs-4"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="services-section py-5 bg-light">
        <div class="container">
            <!-- Section Header -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 id="services" class="section-title display-5 fw-bold mb-3" style="color: #0C008F;">Nos Services</h2>
                    <p class="section-subtitle lead text-muted">Découvrez nos solutions complètes pour tous vos besoins</p>
                </div>
            </div>
            
            <!-- Services Cards -->
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card border-0 shadow-lg h-100 hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-4">
                                <div class="icon-circle mx-auto">
                                    <i class="fas fa-ticket-alt text-white fs-2"></i>
                                </div>
                            </div>
                            <h3 class="card-title h4 fw-bold mb-3 text-warning">Réservation de billets</h3>
                            <p class="card-text text-muted mb-4">
                                Réservez vos billets événementiels rapidement et en toute sécurité. Interface simple et paiement sécurisé.
                            </p>
                            <a href="#services" class="btn btn-warning rounded-pill px-4">
                                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card border-0 shadow-lg h-100 hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-4">
                                <div class="icon-circle mx-auto">
                                    <i class="fas fa-graduation-cap text-white fs-2"></i>
                                </div>
                            </div>
                            <h3 class="card-title h4 fw-bold mb-3 text-warning">Formations professionnelles</h3>
                            <p class="card-text text-muted mb-4">
                                Inscrivez-vous pour vos événements. Élargissez votre zone de vente.
                            </p>
                            <a href="#services" class="btn btn-warning rounded-pill px-4">
                                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card border-0 shadow-lg h-100 hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-4">
                                <div class="icon-circle mx-auto">
                                    <i class="fas fa-calendar-check text-white fs-2"></i>
                                </div>
                            </div>
                            <h3 class="card-title h4 fw-bold mb-3 text-warning">Événements spéciaux</h3>
                            <p class="card-text text-muted mb-4">
                                Participez à nos événements exclusifs. Networking, conférences et bien plus encore.
                            </p>
                            <a href="#services" class="btn btn-warning rounded-pill px-4">
                                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EVENT SECTION -->
    <section class="event-section py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title display-5 fw-bold mb-3" style="color: #0C008F;">Événements à la Une</h2>
                    <p class="section-subtitle lead text-muted">Découvrez nos événements les plus populaires et réservez votre place</p>
                </div>
            </div>
            
            <!-- Events Grid -->
            <div class="row g-4 mb-5">
                @forelse ($events ?? [] as $event)
                <div class="col-lg-4 col-md-6 fade-in-up">
                    <div class="event-card card border-0 shadow-lg h-100 hover-lift">
                        <!-- Event Image -->
                        <div class="event-image-container position-relative overflow-hidden">
                            <img src="{{ $event->image ? asset('storage/images/events/' . $event->image) : asset('img/default-event.jpg') }}" 
                                 alt="{{ $event->title }}" 
                                 class="event-image w-100">
                            <div class="event-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="{{ route('event.show', $event->id) }}" class="btn btn-warning btn-lg rounded-pill px-4 py-2">
                                    <i class="fas fa-eye me-2"></i> Voir détails
                                </a>
                            </div>
                            @if($event->featured)
                            <div class="event-badge position-absolute top-0 end-0 m-3">
                                <span class="badge bg-warning text-dark fw-bold px-3 py-2">
                                    <i class="fas fa-star me-1"></i> Vedette
                                </span>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Event Content -->
                        <div class="card-body p-4">
                            <div class="event-meta d-flex justify-content-between align-items-center mb-3">
                                <span class="event-date badge bg-light text-warning px-3 py-2">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $event->formatted_date ?? 'Date à définir' }}
                                </span>
                                <span class="event-price fw-bold text-warning fs-5">
                                    {{ $event->formatted_price ?? 'Gratuit' }}
                                </span>
                            </div>
                            
                            <h3 class="event-title h5 fw-bold mb-3 text-warning">
                                <a href="{{ route('event.show', $event->id) }}" class="text-decoration-none text-warning">{{ $event->title }}</a>
                            </h3>
                            
                            <p class="event-description text-muted mb-3 line-clamp-3">
                                {{ Str::limit($event->description, 120) }}
                            </p>
                            
                            @if($event->location)
                            <div class="event-location d-flex align-items-center mb-3 text-muted">
                                <i class="fas fa-map-marker-alt me-2 text-warning"></i>
                                <small>{{ $event->location }}</small>
                            </div>
                            @endif
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('event.show', $event->id) }}" class="btn btn-outline-warning rounded-pill px-4">
                                    Réserver <i class="fas fa-ticket-alt ms-2"></i>
                                </a>
                                @if($event->capacity)
                                <small class="text-muted">
                                    <i class="fas fa-users me-1"></i>
                                    {{ $event->capacity }} places
                                </small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div class="no-events-placeholder">
                        <i class="fas fa-calendar-times text-muted display-1 mb-4"></i>
                        <h3 class="text-muted mb-3">Aucun événement disponible</h3>
                        <p class="text-muted mb-4">De nouveaux événements seront bientôt disponibles. Revenez plus tard !</p>
                        <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4">
                            <i class="fas fa-bell me-2"></i> Être notifié
                        </a>
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- View All Events Button -->
            @if(isset($events) && $events->count() > 0)
            <div class="text-center">
                <a href="{{ route('event.index') }}" class="btn btn-warning btn-lg px-5 py-3 fw-semibold rounded-pill shadow-lg">
                    <i class="fas fa-calendar-alt me-2"></i>
                    Voir tous les événements
                </a>
            </div>
            @endif
        </div>
    </section>
    

    <!-- CTA SECTION -->
    <section class="cta-section py-5 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9">
                    <h2 class="display-5 fw-bold mb-4 text-warning">Prêt à commencer votre voyage ?</h2>
                    <p class="lead mb-5 text-white">
                        Rejoignez des milliers d'utilisateurs qui font confiance à My Event pour leurs réservations. 
                        Une expérience simple, rapide et sécurisée vous attend.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ route('login') }}" class="btn btn-warning btn-lg px-5 py-3 fw-semibold rounded-pill">
                            <i class="fas fa-rocket me-2"></i>
                            Commencer maintenant
                        </a>
                        <a href="#contact" class="btn btn-outline-warning btn-lg px-5 py-3 fw-semibold rounded-pill">
                            <i class="fas fa-envelope me-2"></i>
                            Nous contacter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</x-layouts.app>