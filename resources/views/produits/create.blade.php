<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer un nouveau produit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('produits.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-600">Nom:</label>
                        <input type="text" id="nom" name="nom" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                        <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-md"></textarea>
                    </div>

                    <div>
                        <label for="prix" class="block text-sm font-medium text-gray-600">Prix:</label>
                        <input type="text" id="prix" name="prix" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div>
                        <button  type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                            Enregistrer
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
