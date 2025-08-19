<!-- Vue des billets avec QR code et lien de validation API -->
 <x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Détails du billet') }}</div>

                    <div class="card-body">
                        <h5>{{ $ticket->title }}</h5>
                        <p>{{ $ticket->description }}</p>
                        <p><strong>Date de l'événement :</strong> {{ $ticket->event_date }}</p>
                        <p><strong>Lieu :</strong> {{ $ticket->location }}</p>
                        <p><strong>Prix :</strong> {{ $ticket->price }} FCFA</p>

                        <!-- Affichage du QR code -->
                        <div class="text-center my-4">
                            {!! QrCode::size(200)->generate($ticket->id) !!}
                        </div>

                        <!-- Lien de validation API -->
                        <div class="text-center">
                            <a href="{{ route('api.validate', ['id' => $ticket->id]) }}" class="btn btn-primary">Valider le billet</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>