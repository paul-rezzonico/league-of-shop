<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5;url={{ route('produits.index') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
        }
    </style>
</head>
<body class="h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-xl w-1/3 space-y-6 border-2 border-blue-500">
        <div class="flex justify-center mb-4">
            <i class="fas fa-check-circle text-green-500 text-6xl"></i>
        </div>
        <h1 class="text-3xl font-bold mb-4 text-center text-blue-700 border-b-2 pb-2">Confirmation</h1>
        <p class="text-gray-700 text-center text-lg bg-blue-100 p-4 rounded-md">L'email a été envoyé avec succès. Vous serez redirigé dans quelques instants...</p>
        <p class="text-gray-600 text-center text-lg bg-gray-100 p-4 rounded-md">
            <i class="fas fa-info-circle text-blue-500 mr-2"></i>
            Le vendeur prendra contact avec vous prochainement.
        </p>
    </div>
</body>
</html>
