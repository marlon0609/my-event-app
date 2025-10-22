<x-dashboard.app :title="'Mes événements'">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Mes événements</h4>
        <a href="{{ route('dashboard.events.create') }}" class="btn btn-primary">
            <i class="fa fa-plus me-2"></i>Créer un événement
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($events->count() === 0)
        <div class="text-center py-5 bg-white border rounded">
            <p class="mb-3">Vous n'avez pas encore créé d'événement.</p>
            <a href="{{ route('dashboard.events.create') }}" class="btn btn-outline-primary">Créer mon premier événement</a>
        </div>
    @else
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Lieu</th>
                                <th>Statut</th>
                                <th>Capacité</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td class="fw-semibold">{{ $event->title }}</td>
                                    <td>{{ optional($event->date)->format('d/m/Y H:i') }}</td>
                                    <td>{{ $event->location }}</td>
                                    <td>
                                        @php($status = $event->status ?? 'draft')
                                        <span class="badge {{ $status === 'published' ? 'bg-success' : ($status === 'cancelled' ? 'bg-danger' : 'bg-secondary') }}">
                                            {{ ucfirst($status) }}
                                        </span>
                                    </td>
                                    <td>{{ $event->capacity ?? '—' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('event.show', $event) }}" target="_blank" class="btn btn-sm btn-outline-secondary">Voir</a>
                                        <a href="{{ route('dashboard.events.edit', $event) }}" class="btn btn-sm btn-warning">Modifier</a>
                                        <form action="{{ route('dashboard.events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cet événement ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white">
                {{ $events->links() }}
            </div>
        </div>
    @endif
</x-dashboard.app>
