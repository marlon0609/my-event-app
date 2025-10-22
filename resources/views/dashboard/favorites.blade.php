<x-dashboard.app title="Mes favoris">
    <div class="container py-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">Mes favoris</h1>
        </div>

        @if(($favorites ?? null) && $favorites->count() > 0)
            <div class="row g-4">
                @foreach($favorites as $event)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="position-relative">
                                <img
                                    src="{{ $event->image ? asset('storage/'.$event->image) : asset('img/ChatGPT_Image.png') }}"
                                    class="card-img-top"
                                    style="height: 180px; object-fit: cover;"
                                    alt="{{ $event->title }}"
                                >
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-1">{{ $event->title }}</h5>
                                <p class="text-muted small mb-2">
                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $event->location ?? 'Lieu à définir' }}
                                </p>
                                <p class="text-muted small flex-grow-1">{{ \Illuminate\Support\Str::limit($event->description, 80) }}</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="{{ route('event.show', $event) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-1"></i> Voir
                                    </a>
                                    <form method="POST" action="{{ route('dashboard.favorites.remove', $event) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-heart-broken me-1"></i> Retirer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $favorites->links() }}
            </div>
        @else
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="mb-2"><i class="fas fa-heart fa-2x text-muted"></i></div>
                    <div class="fw-semibold mb-2">Vous n'avez pas encore ajouté de favoris.</div>
                    <p class="text-muted mb-3">Explorez les événements et ajoutez-les à vos favoris pour les retrouver facilement.</p>
                    <a href="{{ route('event.index') }}" class="btn btn-primary">Parcourir les événements</a>
                </div>
            </div>
        @endif
    </div>
</x-dashboard.app>