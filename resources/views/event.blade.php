<x-layouts.app>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Tous les événements</h2>
        </div>

        @if($events->count() === 0)
            <div class="text-center py-5 bg-white border rounded">
                <p class="mb-0">Aucun événement à afficher pour le moment.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach($events as $event)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0">
                            @php($img = $event->image ? asset('storage/'.$event->image) : asset('img/ChatGPT_Image.png'))
                            <img src="{{ $img }}" class="card-img-top" alt="{{ $event->title }}" style="object-fit: cover; max-height: 200px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-2">{{ $event->title }}</h5>
                                <p class="text-muted small mb-2">
                                    <i class="fa fa-calendar-alt me-1"></i>
                                    {{ optional($event->date)->format('d/m/Y H:i') }}
                                </p>
                                <p class="text-muted small mb-3">
                                    <i class="fa fa-map-marker-alt me-1"></i>
                                    {{ $event->location }}
                                </p>
                                <p class="card-text flex-grow-1">{{ Str::limit($event->description, 120) }}</p>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <span class="fw-semibold">{{ $event->formatted_price ?? (is_numeric($event->price) ? number_format($event->price, 2, ',', ' ').' FCFA' : 'Gratuit') }}</span>
                                    <a href="{{ route('event.show', $event) }}" class="btn btn-primary btn-sm">Voir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $events->links() }}
            </div>
        @endif
    </div>
</x-layouts.app>
