<x-layouts.app>
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card shadow-sm border-0">
                    @php($img = $event->image ? asset('storage/'.$event->image) : asset('img/ChatGPT_Image.png'))
                    <img src="{{ $img }}" class="card-img-top" alt="{{ $event->title }}" style="object-fit: cover; max-height: 320px;">
                    <div class="card-body">
                        <h1 class="h3 mb-3">{{ $event->title }}</h1>
                        <div class="d-flex flex-wrap text-muted small mb-3 gap-3">
                            <span><i class="fa fa-calendar-alt me-1"></i>{{ optional($event->date)->format('d/m/Y H:i') }}</span>
                            <span><i class="fa fa-map-marker-alt me-1"></i>{{ $event->location }}</span>
                            @if(!is_null($event->capacity))
                                <span><i class="fa fa-users me-1"></i>Capacité: {{ $event->capacity }}</span>
                            @endif
                        </div>
                        @if($event->category)
                            <span class="badge bg-secondary mb-3">{{ $event->category }}</span>
                        @endif
                        <div class="mb-3">
                            {!! nl2br(e($event->description)) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted">Prix</span>
                            <span class="fs-4 fw-semibold">{{ $event->formatted_price ?? (is_numeric($event->price) ? number_format($event->price, 2, ',', ' ').' FCFA' : 'Gratuit') }}</span>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-primary">Réserver</a>
                            <a href="{{ route('event.index') }}" class="btn btn-outline-secondary">Retour aux événements</a>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="mb-3">Informations</h6>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="fa fa-calendar me-2 text-muted"></i>Date: {{ optional($event->date)->format('d/m/Y H:i') }}</li>
                            <li class="mb-2"><i class="fa fa-map-marker-alt me-2 text-muted"></i>Lieu: {{ $event->location }}</li>
                            @if(!is_null($event->capacity))
                                <li class="mb-2"><i class="fa fa-users me-2 text-muted"></i>Capacité: {{ $event->capacity }}</li>
                            @endif
                            @if($event->status)
                                <li class="mb-2"><i class="fa fa-info-circle me-2 text-muted"></i>Statut: {{ ucfirst($event->status) }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
