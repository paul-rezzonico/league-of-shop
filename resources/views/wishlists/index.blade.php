<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ma Wishlist
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-4">Produits dans ma Wishlist</h1>
                <ul class="space-y-2">
                    @foreach($wishlists as $wishlist)
                        <li class="border p-4 rounded-md hover:bg-gray-100 transition space-y-4">
                            @if($wishlist->produit->image)
                                <img src="{{ asset('images/' . $wishlist->produit->image) }}" alt="{{ $wishlist->produit->nom }}"  class="w-full h-48 object-contain">
                            @else
                                <img src="{{ asset('images/not_found.png') }}" alt="{{ $wishlist->produit->nom }}"  class="w-full h-48 object-contain">
                            @endif
                            <h2 class="text-xl font-semibold">{{ $wishlist->produit->nom }}</h2>
                            <p>{{ $wishlist->produit->description }}</p>
                            <div class="flex space-x-2">
                                <a href="{{ route('produits.show', $wishlist->produit->id) }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">Voir le produit</a>
                                <!-- Formulaire pour retirer de la wishlist -->
                                <form action="{{ route('wishlist.remove', $wishlist->produit->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Êtes-vous sûr de vouloir retirer ce produit de votre wishlist?');">Retirer de la wishlist</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
