<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Liste des articles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">

                @forelse ($produits as $produit)
                    <div class="border p-4 rounded-md">
                        <h3 class="text-xl font-bold">{{ $produit->nom }}</h3>
                        <img src="{{ asset('storage/' . $produit->image_path) }}" alt="{{ $produit->nom }}">
{{--                        <a href="{{ route('articles.show', $produit->id) }}" class="text-blue-500 mt-2 inline-block">Lire--}}
{{--                            plus</a>--}}
                    </div>
                @empty
                    <p class="text-gray-500">Aucun article pour le moment.</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
