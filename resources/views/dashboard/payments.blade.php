<x-dashboard.app title="Paiements">
    <div class="container py-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>Veuillez corriger les erreurs du formulaire.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0">Paiements</h1>
            <div>
                <button class="btn btn-primary" type="button" disabled>
                    <i class="fas fa-plus me-2"></i>Ajouter une méthode
                </button>
            </div>
        </div>

        <div class="row g-4">
            <!-- Colonne gauche -->
            <div class="col-lg-7">
                <!-- Méthodes de paiement -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3 d-flex align-items-center justify-content-between">
                        <h2 class="h5 mb-0">Initiation de paiement</h2>
                        <span class="badge bg-light text-dark">Moov Money & Mixx by Yas</span>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-4">Effectuez un paiement en saisissant votre numéro mobile et le montant. Vous recevrez une sollicitation sur votre téléphone pour confirmer.</p>

                        <div class="row g-4">
                            <!-- Formulaire Moov Money -->
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-sim-card me-2 text-primary"></i>
                                        <h3 class="h6 mb-0">Moov Money</h3>
                                    </div>
                                    <form method="POST" action="{{ route('dashboard.payments.moov.initiate') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Numéro Moov</label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Ex: 90 00 00 00" value="{{ old('phone') }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Montant (FCFA)</label>
                                            <input type="number" min="100" step="1" name="amount" class="form-control @error('amount') is-invalid @enderror" placeholder="Ex: 1000" value="{{ old('amount') }}">
                                            @error('amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description (optionnelle)</label>
                                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Ex: Achat billet événement" value="{{ old('description') }}">
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-paper-plane me-2"></i>Payer avec Moov Money
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Formulaire Mixx by Yas -->
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-sim-card me-2 text-success"></i>
                                        <h3 class="h6 mb-0">Mixx by Yas</h3>
                                    </div>
                                    <form method="POST" action="{{ route('dashboard.payments.mixx.initiate') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Numéro Mixx</label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Ex: 91 00 00 00" value="{{ old('phone') }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Montant (FCFA)</label>
                                            <input type="number" min="100" step="1" name="amount" class="form-control @error('amount') is-invalid @enderror" placeholder="Ex: 1000" value="{{ old('amount') }}">
                                            @error('amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description (optionnelle)</label>
                                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Ex: Achat billet événement" value="{{ old('description') }}">
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fas fa-paper-plane me-2"></i>Payer avec Mixx by Yas
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations de facturation -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h2 class="h5 mb-0">Informations de facturation</h2>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nom complet</label>
                                    <input type="text" class="form-control" placeholder="Ex: Kossi Agbeko" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email de facturation</label>
                                    <input type="email" class="form-control" placeholder="exemple@mail.com" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" class="form-control" placeholder="Adresse complète" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Ville</label>
                                    <input type="text" class="form-control" placeholder="Ville" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Pays</label>
                                    <select class="form-select" disabled>
                                        <option>Sélectionner un pays</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Code postal</label>
                                    <input type="text" class="form-control" placeholder="00000" disabled>
                                </div>
                            </div>

                            <div class="mt-3 d-flex gap-2">
                                <button type="button" class="btn btn-primary" disabled>
                                    <i class="fas fa-save me-2"></i>Enregistrer
                                </button>
                                <button type="button" class="btn btn-outline-secondary" disabled>Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Colonne droite -->
            <div class="col-lg-5">
                <!-- Résumé de facturation -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted mb-1">Prochain paiement</h6>
                                <div class="fw-semibold">Aucun paiement programmé</div>
                            </div>
                            <div class="text-end">
                                <div class="small text-muted">Solde actuel</div>
                                <div class="fs-5 fw-bold">0 FCFA</div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="text-muted">Dernier achat</span>
                            <span class="fw-semibold">—</span>
                        </div>
                    </div>
                </div>

                <!-- Historique des factures -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3 d-flex align-items-center justify-content-between">
                        <h2 class="h6 mb-0">Historique des factures</h2>
                        <button class="btn btn-sm btn-outline-secondary" type="button">
                            <i class="fas fa-download me-2"></i>Télécharger tout
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Référence</th>
                                    <th>Prestataire</th>
                                    <th>Téléphone</th>
                                    <th class="text-end">Montant</th>
                                    <th class="text-center">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse(($transactions ?? []) as $tx)
                                    <tr>
                                        <td>{{ $tx->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="font-monospace">{{ $tx->reference }}</td>
                                        <td class="text-uppercase">{{ $tx->provider }}</td>
                                        <td>{{ $tx->phone }}</td>
                                        <td class="text-end">{{ number_format($tx->amount, 0, ',', ' ') }} FCFA</td>
                                        <td class="text-center">
                                            @php($badge = match($tx->status) {
                                                'success' => 'success',
                                                'failed' => 'danger',
                                                'cancelled' => 'secondary',
                                                'initiated' => 'warning',
                                                default => 'light',
                                            })
                                            <span class="badge bg-{{ $badge }} text-uppercase">{{ $tx->status }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">Aucune facture pour le moment</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if(isset($transactions))
                        <div class="card-footer bg-white border-0">
                            {{ $transactions->links() }}
                        </div>
                    @endif
                </div>

                <!-- Sécurité -->
                <div class="alert alert-light border mt-4" role="alert">
                    <div class="d-flex">
                        <i class="fas fa-shield-alt me-3 mt-1 text-muted"></i>
                        <div>
                            <div class="fw-semibold">Paiements sécurisés</div>
                            <div class="small text-muted">Vos informations de paiement sont chiffrées et traitées de manière sécurisée. Nous ne stockons pas vos données sensibles.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.app>
