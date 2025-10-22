<x-layouts.app>
    <!-- Hero Section -->
    <section class="hero-section position-relative overflow-hidden" style="background: linear-gradient(135deg, #0C008F 0%, #0033FF 100%); min-height: 60vh;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <div class="hero-content" data-aos="fade-up">
                        <h1 class="display-4 fw-bold mb-4" style="color: #ffffff;">
                            DÃ©couvrez des Ã‰vÃ©nements 
                            <span style="color: #FFC300;">Extraordinaires</span>
                        </h1>
                        <p class="lead mb-5">
                            Concerts, spectacles, confÃ©rences, festivals... Trouvez l'Ã©vÃ©nement parfait qui vous correspond et rÃ©servez en quelques clics.
                        </p>
                        <div class="search-bar bg-white rounded-4 p-3 shadow-lg">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control border-0" placeholder="Que recherchez-vous ?">
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select border-0">
                                        <option>Toutes les catÃ©gories</option>
                                        <option>Concerts</option>
                                        <option>ThÃ©Ã¢tre</option>
                                        <option>Sport</option>
                                        <option>ConfÃ©rences</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control border-0">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn w-100 text-white fw-bold" style="background: linear-gradient(135deg, #0C008F, #0033FF);">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="position-absolute top-0 end-0 opacity-10">
            <i class="fas fa-music" style="font-size: 200px; color: #FFC300;"></i>
        </div>
        <div class="position-absolute bottom-0 start-0 opacity-10">
            <i class="fas fa-theater-masks" style="font-size: 150px; color: #FFC300;"></i>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="fw-bold mb-3" style="color: #0C008F;">Explorez par CatÃ©gorie</h2>
                    <p class="text-muted">Trouvez exactement ce que vous cherchez</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-2 col-6">
                    <div class="category-card text-center p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                        <div class="category-icon mb-3 mx-auto rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #0C008F, #0033FF);">
                            <i class="fas fa-music text-white fa-lg"></i>
                        </div>
                        <h6 class="fw-bold mb-2">Concerts</h6>
                        <small class="text-muted">124 Ã©vÃ©nements</small>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-card text-center p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                        <div class="category-icon mb-3 mx-auto rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #FFC300, #FFD700);">
                            <i class="fas fa-theater-masks text-white fa-lg"></i>
                        </div>
                        <h6 class="fw-bold mb-2">ThÃ©Ã¢tre</h6>
                        <small class="text-muted">89 Ã©vÃ©nements</small>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-card text-center p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                        <div class="category-icon mb-3 mx-auto rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #10B98F, #059669);">
                            <i class="fas fa-futbol text-white fa-lg"></i>
                        </div>
                        <h6 class="fw-bold mb-2">Sport</h6>
                        <small class="text-muted">156 Ã©vÃ©nements</small>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-card text-center p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                        <div class="category-icon mb-3 mx-auto rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #DC2626, #B91C1C);">
                            <i class="fas fa-microphone text-white fa-lg"></i>
                        </div>
                        <h6 class="fw-bold mb-2">ConfÃ©rences</h6>
                        <small class="text-muted">67 Ã©vÃ©nements</small>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-card text-center p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                        <div class="category-icon mb-3 mx-auto rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #7C3AED, #5B21B6);">
                            <i class="fas fa-palette text-white fa-lg"></i>
                        </div>
                        <h6 class="fw-bold mb-2">Expositions</h6>
                        <small class="text-muted">43 Ã©vÃ©nements</small>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-card text-center p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                        <div class="category-icon mb-3 mx-auto rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #EA580C, #C2410C);">
                            <i class="fas fa-glass-cheers text-white fa-lg"></i>
                        </div>
                        <h6 class="fw-bold mb-2">Festivals</h6>
                        <small class="text-muted">92 Ã©vÃ©nements</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Events Section -->
    <section class="py-5">
        <div class="container event-future-section">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="fw-bold mb-3" style="color: #0C008F;">Tous Les Ã‰vÃ©nements Du Moment</h2>
                    <p class="text-muted">Ne manquez pas ces Ã©vÃ©nements exceptionnels</p>
                </div>
            </div>

            @if($events->count() === 0)
            <div class="col-12 text-center py-5">
                <div class="no-events-placeholder">
                    <i class="fas fa-calendar-times text-muted display-1 mb-4"></i>
                    <h3 class="text-muted mb-3">Aucun Ã©vÃ©nement disponible</h3>
                    <p class="text-muted mb-4">De nouveaux Ã©vÃ©nements seront bientÃ´t disponibles. Revenez plus tard !</p>
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4">
                        <i class="fas fa-bell me-2"></i> ÃŠtre notifiÃ©
                    </a>
                </div>
            </div>
            @else
            <div class="row g-4">
                @foreach($events as $eventItem)
                <div class="col-lg-4 col-md-6">
                    <div class="event-card bg-white rounded-4 shadow-sm overflow-hidden border-0 h-100">
                        <div class="position-relative">
                            <img src="{{ $eventItem->image ? asset('storage/' . $eventItem->image) : asset('img/ChatGPT_Image.png') }}" 
                                class="card-img-top" 
                                style="height: 200px; object-fit: cover;" 
                                alt="{{ $eventItem->title }}">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge text-white px-3 py-2" style="background: linear-gradient(135deg, #0C008F, #0033FF);">
                                    <i class="fas {{ $eventItem->category_icon ?? 'fa-calendar' }} me-1"></i>
                                    {{ $eventItem->category ?? 'Ã‰vÃ©nement' }}
                                </span>
                            </div>
                            <div class="position-absolute bottom-0 start-0 m-3">
                                <span class="badge bg-white text-dark px-3 py-2 fw-bold">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $eventItem->date->format('d M') }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-2">{{ $eventItem->title }}</h5>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2" style="color: #0033FF;"></i>
                                {{ $eventItem->location }}
                            </p>
                            <p class="card-text text-muted small mb-3">
                                {{ Str::limit($eventItem->description, 100) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h5 fw-bold" style="color: #0C008F;">{{ number_format($eventItem->price, 2, ',', ' ') }} â‚¬</span>
                                    @if($eventItem->original_price > $eventItem->price)
                                    <small class="text-muted text-decoration-line-through ms-2">
                                        {{ number_format($eventItem->original_price, 2, ',', ' ') }} â‚¬
                                    </small>
                                    @endif
                                </div>
                                <a href="{{ route('event.show', $eventItem) }}" class="btn text-white px-4" 
                                style="background: linear-gradient(135deg, #0C008F, #0033FF);">
                                    Voir plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
                <!-- Event Card 2 -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="event-card bg-white rounded-4 shadow-sm overflow-hidden border-0 h-100">
                        <div class="position-relative">
                            <img src="{{ asset('img/ChatGPT_Image.png') }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="ThÃ©Ã¢tre">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge px-3 py-2" style="background: linear-gradient(135deg, #FFC300, #FFD700);">
                                    <i class="fas fa-theater-masks me-1"></i>ThÃ©Ã¢tre
                                </span>
                            </div>
                            <div class="position-absolute bottom-0 start-0 m-3">
                                <span class="badge bg-white text-dark px-3 py-2 fw-bold">
                                    <i class="fas fa-calendar me-1"></i>30 DÃ©c
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-2">Le Malade Imaginaire</h5>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2" style="color: #0033FF;"></i>
                                ComÃ©die FranÃ§aise, Paris
                            </p>
                            <p class="card-text text-muted small mb-3">
                                La cÃ©lÃ¨bre comÃ©die de MoliÃ¨re dans une mise en scÃ¨ne moderne et captivante. Un spectacle pour toute la famille...
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h5 fw-bold" style="color: #0C008F;">45â‚¬</span>
                                </div>
                                <button class="btn text-white px-4" style="background: linear-gradient(135deg, #0C008F, #0033FF);">
                                    RÃ©server
                                </button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Event Card 3 -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="event-card bg-white rounded-4 shadow-sm overflow-hidden border-0 h-100">
                        <div class="position-relative">
                            <img src="{{ asset('img/ChatGPT_Image.png') }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Exposition">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge text-white px-3 py-2" style="background: linear-gradient(135deg, #7C3AED, #5B21B6);">
                                    <i class="fas fa-palette me-1"></i>Exposition
                                </span>
                            </div>
                            <div class="position-absolute bottom-0 start-0 m-3">
                                <span class="badge bg-white text-dark px-3 py-2 fw-bold">
                                    <i class="fas fa-calendar me-1"></i>15 Jan
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-2">Foire Togo 2000</h5>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2" style="color: #0033FF;"></i>
                                MusÃ©e d'Orsay, Paris
                            </p>
                            <p class="card-text text-muted small mb-3">
                                DÃ©couvrez les Å“uvres emblÃ©matiques de la pÃ©riode bleue de Picasso dans cette exposition exclusive...
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h5 fw-bold" style="color: #0C008F;">25â‚¬</span>
                                    <small class="text-muted text-decoration-line-through ms-2">35â‚¬</small>
                                </div>
                                <button class="btn text-white px-4" style="background: linear-gradient(135deg, #0C008F, #0033FF);">
                                    RÃ©server
                                </button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="mt-4 d-flex justify-content-center">
                {{ $events->links() }}
            </div>
            @endif
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-5" style="background: linear-gradient(135deg, #0C008F 0%, #0033FF 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center text-white">
                    <h3 class="fw-bold mb-3" style="color: #FFC300;">Restez InformÃ© des Nouveaux Ã‰vÃ©nements</h3>
                    <p class="mb-4">Recevez en avant-premiÃ¨re les meilleures offres et les Ã©vÃ©nements exclusifs</p>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="input-group input-group-lg">
                                <input type="email" class="form-control border-0" placeholder="Votre adresse email">
                                <button class="btn text-dark fw-bold px-4" style="background: #FFC300;">
                                    <i class="fas fa-paper-plane me-2"></i>S'abonner
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>

