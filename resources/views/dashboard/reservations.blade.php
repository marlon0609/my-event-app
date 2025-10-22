<x-dashboard.app title="Mes réservations">
    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">Mes réservations</h1>
        </div>

        <!-- Filtres -->
        <form method="GET" class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-end">
                    <div class="col-md-6">
                        <label class="form-label">Recherche</label>
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Référence ou titre d’événement">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Statut</label>
                        <select name="status" class="form-select">
                            <option value="">Tous</option>
                            @foreach(['pending' => 'En attente', 'paid' => 'Payée', 'cancelled' => 'Annulée', 'refunded' => 'Remboursée'] as $key => $label)
                                <option value="{{ $key }}" @selected(request('status')===$key)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-grow-1">
                            <i class="fas fa-search me-2"></i>Filtrer
                        </button>
                        <a href="{{ route('dashboard.reservations') }}" class="btn btn-outline-secondary" title="Réinitialiser">
                            <i class="fas fa-undo"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>

        <!-- Tableau des réservations -->
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Référence</th>
                            <th>Événement</th>
                            <th class="text-end">Quantité</th>
                            <th class="text-end">Montant</th>
                            <th class="text-center">Statut</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(($reservations ?? []) as $r)
                            <tr>
                                <td>{{ $r->created_at?->format('d/m/Y H:i') }}</td>
                                <td class="font-monospace">{{ $r->reference }}</td>
                                <td>
                                    @if($r->event)
                                        <a href="{{ route('event.show', $r->event) }}" class="text-decoration-none">{{ $r->event->title }}</a>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="text-end">{{ number_format($r->quantity, 0, ',', ' ') }}</td>
                                <td class="text-end">{{ number_format($r->amount, 0, ',', ' ') }} FCFA</td>
                                <td class="text-center">
                                    @php($badge = match($r->status) {
                                        'paid' => 'success',
                                        'cancelled' => 'secondary',
                                        'refunded' => 'info',
                                        'pending' => 'warning',
                                        default => 'light',
                                    })
                                    <span class="badge bg-{{ $badge }} text-uppercase">{{ $r->status }}</span>
                                </td>
                                <td class="text-center">
                                    @if($r->event)
                                        <a href="{{ route('event.show', $r->event) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i>Voir
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-5">
                                    <div class="mb-2"><i class="fas fa-ticket-alt fa-2x"></i></div>
                                    <div class="fw-semibold">Vous n'avez pas encore de réservations.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(isset($reservations))
                <div class="card-footer bg-white border-0">
                    {{ $reservations->links() }}
                </div>
            @endif
        </div>
    </div>
</x-dashboard.app>