<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Liste des articles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">

                @if($produits->isEmpty())
                    <p class="text-gray-500">Aucun article pour le moment.</p>
                @else
                    <!-- Grid setup for 4 columns on large screens, 2 on medium, 1 on small -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                        @foreach ($produits as $produit)
                            <div class="border p-4 rounded-md">
                                <h3 class="text-xl font-bold mb-4">{{ $produit->nom }}</h3>
                                <img src="{{ asset('storage/' . $produit->image_path) }}" alt="{{ $produit->nom }}" class="w-full h-48 object-cover mb-4">
                                <!-- Bouton "Lire plus" -->
                                <a href="{{ route('produits.show', $produit->id) }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Lire plus
                                </a>
                            </div>
                        @endforeach

                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
