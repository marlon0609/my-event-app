<x-layouts.app>

@section('content')
<section class="py-20 max-w-4xl mx-auto px-4">
    <h2 class="text-3xl font-bold mb-4">Pourquoi choisir notre application ?</h2>
    <ul class="list-disc pl-6 text-left mb-6">
        <li>Automatisation des tâches</li>
        <li>Interface intuitive</li>
        <li>Support client réactif</li>
    </ul>
    <a href="{{ route('payment') }}" class="px-6 py-3 bg-green-600 text-white rounded hover:bg-green-700 transition">
        Acheter maintenant
    </a>
</section>
@endsection

</x-layouts.app>
