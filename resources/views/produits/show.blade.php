<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Liste des articles
        </h2>
    </x-slot>
    <div class="container mx-auto mt-8">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <!-- Nom du produit -->
            <h1 class="text-2xl font-bold mb-4">{{ $produit->nom }}</h1>

            <!-- Image du produit -->
            @if($produit->image)
                <img src="{{ asset('images/' . $produit->image) }}" alt="{{ $produit->nom }}" class="mt-4 w-full max-w-lg max-h-96 mx-auto object-contain">
            @else
                <img src="{{ asset('images/not_found.png') }}" alt="{{ $produit->nom }}" class="mt-4 w-full max-w-lg max-h-96 mx-auto object-contain">
            @endif

            <!-- Description du produit -->
            <p class="text-gray-700 mb-4">{{ $produit->description }}</p>

            <!-- Prix du produit -->
            <p class="text-xl font-semibold mb-4">Prix: {{ $produit->prix }} €</p>

            <!-- Utilisateur qui a créé le produit -->
            <p class="text-sm text-gray-500 mb-4">Vendeur: {{ $produit->user->name }}</p>

            <!-- Boutons -->
            <div class="flex justify-between items-center">
                @auth
                    @if(auth()->user()->id === $produit->user_id)
                        <!-- Bouton Éditer (affiché seulement si le produit appartient à l'utilisateur connecté) -->
                        <div>
                            <a href="{{ route('produits.edit', $produit) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Éditer</a>
                            <!-- Formulaire de suppression -->
                            <form action="{{ route('produits.destroy', $produit) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre?');">Supprimer l'offre</button>
                            </form>
                        </div>
                    @else
                        <!-- Bouton Ajouter à la wishlist -->
                        <div>
                            @if(auth()->check() && auth()->user()->wishlists()->where('produit_id', $produit->id)->exists())
                                <form action="{{ route('wishlist.remove', $produit->id) }}" method="post" class="inline-block ml-2">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Retirer de la wishlist</button>
                                </form>
                            @else
                                <form action="{{ route('wishlist.add', $produit->id) }}" method="post" class="inline-block ml-2">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Ajouter à la wishlist</button>
                                </form>
                            @endif
                            <form action="{{ route('contact.vendeur', $produit) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Contacter le vendeur</button>
                            </form>
                        </div>
                    @endif
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Se connecter pour contacter le vendeur</a>
                @endguest
                <!-- Bouton Retour -->
                <a href="{{ route('produits.index')  }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Retour</a>
            </div>
        </div>
    </div>
</x-app-layout>
