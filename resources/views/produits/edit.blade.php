<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Éditer l'article: {{ $produit->nom }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <form action="{{ route('produits.update', $produit) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Nom du produit -->
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-600">Nom:</label>
                    <input type="text" id="nom" name="nom" value="{{ $produit->nom }}" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <!-- Image du produit -->
                <div>
                    <label for="picture" class="block text-sm font-medium text-gray-600">Image:</label>
                    <input type="file" id="picture" name="picture" class="mt-1 p-2 w-full border rounded-md">
                    <img src="{{ asset('storage/' . $produit->picture) }}" alt="{{ $produit->nom }}" class="mt-4 w-full h-48 object-cover">
                </div>

                <!-- Description du produit -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                    <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-md">{{ $produit->description }}</textarea>
                </div>

                <!-- Prix du produit -->
                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-600">Prix:</label>
                    <input type="text" id="prix" name="prix" value="{{ $produit->prix }}" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <!-- Boutons de soumission -->
                <div class="flex space-x-2">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Mettre à jour</button>
                    <a href="{{ route('produits.show', $produit) }}" class="px-4 py-2 bg-gray-300 text-black rounded hover:bg-gray-400">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>