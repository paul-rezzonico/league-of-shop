<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Liste des articles
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-4">Mes Produits</h1>
                <ul class="space-y-2">
                    @foreach($produits as $produit)
                        <li class="border p-4 rounded-md hover:bg-gray-100 transition space-y-4">
                            @if($produit->image)
                                <img src="{{ asset('images/' . $produit->image) }}" alt="{{ $produit->nom }}" class="mt-4 w-full max-w-lg max-h-96 mx-auto object-contain">
                            @else
                                <img src="{{ asset('images/not_found.png') }}" alt="{{ $produit->nom }}" class="mt-4 w-full max-w-lg max-h-96 mx-auto object-contain">
                            @endif
                            <h2 class="text-xl font-semibold">{{ $produit->nom }}</h2>
                            <p>{{ $produit->description }}</p>
                            <div class="flex space-x-2">
                                <a href="{{ route('produits.edit', $produit->id) }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">Éditer</a>
                                <!-- Formulaire de suppression -->
                                <form action="{{ route('produits.destroy', $produit) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre?');">Supprimer l'offre</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
                <!-- Liens de pagination -->
        <div class="mt-4">
            {{ $produits->links() }}
        </div>
    </div>
</x-app-layout>
