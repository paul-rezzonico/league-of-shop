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
                    <label for="image" class="block text-sm font-medium text-gray-600">Image:</label>
                    <input type="file" id="picture" name="image" class="mt-1 p-2 w-full border rounded-md">
                    <img src="{{ asset('images/' . $produit->image) }}" alt="{{ $produit->nom }}" class="mt-4 w-full h-48 object-contain">
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

                <!-- Formulaire de suppression -->
                <form action="{{ route('produits.destroy', $produit) }}" method="POST" class="mt-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre?');">Supprimer l'offre</button>
                </form>
            </form>
        </div>
    </div>
</x-app-layout>
