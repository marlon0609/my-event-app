<x-layouts.app>
    
@section('content')
<section class="py-20 text-center">
    <h2 class="text-2xl font-bold mb-6">Procéder au paiement</h2>
    <p class="mb-4">Vous serez redirigé vers une page sécurisée de paiement.</p>
    <form action="https://buy.stripe.com/test_..." method="GET">
        <button type="submit" class="px-6 py-3 bg-purple-600 text-white rounded hover:bg-purple-700">
            Payer avec Stripe
        </button>
    </form>
</section>

</x-layouts.app>
