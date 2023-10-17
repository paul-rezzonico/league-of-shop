<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Interest</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 py-8">

<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="flex justify-center items-center bg-blue-500 p-4">
        <!-- Logo and title -->
        <img src="{{ asset('img/fox_icon.png') }}" alt="League of Shop Logo" class="h-10 w-10 mr-2">
        <span class="text-white font-bold text-xl">League of Shop</span>
    </div>
    <div class="p-8">
        <!-- Message content -->
        <h1 class="text-xl font-bold mb-4">Notification d'intérêt</h1>
        <p class="text-gray-700 mb-4">
            <i class="fas fa-user text-blue-500 mr-2"></i>
            {{ $username }} est intéressé par votre produit.
        </p>
        <p class="text-gray-700 mb-4">
            <i class="fas fa-box-open text-blue-500 mr-2"></i>
            Produit : <a href="{{ route('produits.show', $productid) }}" class="text-blue-500 hover:underline">
                {{ $productname }}
            </a>
        </p>
        <p class="text-gray-700">
            Merci de continuer à utiliser <strong>League of Shop</strong> pour vos besoins en matière de shopping !
        </p>
    </div>
</div>

</body>
</html>
