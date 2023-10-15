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
            <img src="{{ asset('images/' . $produit->image) }}" alt="{{ $produit->nom }}" class="mt-4 w-full h-48 object-contain">

            <!-- Description du produit -->
            <p class="text-gray-700 mb-4">{{ $produit->description }}</p>

            <!-- Prix du produit -->
            <p class="text-xl font-semibold mb-4">Prix: {{ $produit->prix }} €</p>

            <!-- Utilisateur qui a créé le produit -->
            <p class="text-sm text-gray-500 mb-4">Vendeur: {{ $produit->user->name }}</p>

            <!-- Boutons -->
            @auth
                @if(auth()->user()->id === $produit->user_id)
                    <!-- Bouton Éditer (affiché seulement si le produit appartient à l'utilisateur connecté) -->
                    <a href="{{ route('produits.edit', $produit) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Éditer</a>
                @else
                    <!-- Bouton Ajouter à la wishlist -->
                    <a href="#" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mr-2">Ajouter à la wishlist</a>

                    <!-- Bouton Contacter le vendeur -->
                    <a href="#" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Contacter le vendeur</a>
                @endif
            @endauth

            @guest
                <!-- Bouton Ajouter à la wishlist et Contacter le vendeur (pour les utilisateurs non connectés) -->
                <a href="#" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mr-2">Ajouter à la wishlist</a>
                <a href="#" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Contacter le vendeur</a>
            @endguest
        </div>
    </div>
</x-app-layout>
