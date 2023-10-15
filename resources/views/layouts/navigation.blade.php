<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> {{ config('app.name', 'League of Shop') }} </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>
<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
<nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-4 px-1 mt-0 h-auto fixed w-full z-20 top-0 ">
    <div class="flex flex-wrap items-center">
        <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
            <a href="/" aria-label="Home" class="flex items-center">
                <img src="{{ asset('img/fox_icon.png') }}" alt="League of Shop" style="width: 12%">
                <i class="text-lg ml-2">League of Shop</i>
            </a>
        </div>

        <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2 ">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                <li><a href="/produits" class="text-gray-400 hover:text-gray-200 py-2 px-4">Produits</a></li>
                @if(auth()->check())
                    <li><a href="{{ route('mes-produits') }}" class="text-gray-400 hover:text-gray-200 py-2 px-4">Mes produits</a></li>
                    <li><a href="{{ route('wishlist.index') }}" class="text-gray-400 hover:text-gray-200 py-2 px-4">Ma wishlist</a></li>
                    <li><a href="{{ route('produits.create') }}" class="text-gray-400 hover:text-gray-200 py-2 px-4">Vendre</a></li>
                @endif
            </ul>
        </div>

        <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                <li class="flex-1 md:flex-none md:mr-3">
                    <div class="relative inline-block">
                        @if(auth()->check())
                        <button onclick="toggleDD('myDropdown')" class="drop-button text-white py-2 px-2 mr-4"> <span class="pr-2"><i class="fa fa-user"></i></span>Bonjour, {{ auth()->user()->name }}</button>
                        @else
                            <a href="{{ route('login') }}" class="inline-block text-gray-400 no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Connexion</a>
                            <a href="{{ route('register') }}" class="inline-block text-gray-400 no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Inscription</a>
                        @endif
                        <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                            <a href="{{ route('profile.edit') }}" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
                            <a href="{{ route('mes-produits') }}" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-cog fa-fw"></i> Mes offres </a>
                            <div class="border border-gray-800"></div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                <button type="submit">Log Out</button>
                            </form>

                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block">
                                <i class="fas fa-sign-out-alt fa-fw"></i> Log Out
                            </a>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    /*Toggle dropdown list*/
    function toggleDD(myDropMenu) {
        document.getElementById(myDropMenu).classList.toggle("invisible");
    }
    /*Filter dropdown options*/
    function filterDD(myDropMenu, myDropMenuSearch) {
        var input, filter, ul, li, a, i;
        input = document.getElementById(myDropMenuSearch);
        filter = input.value.toUpperCase();
        div = document.getElementById(myDropMenu);
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
            var dropdowns = document.getElementsByClassName("dropdownlist");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('invisible')) {
                    openDropdown.classList.add('invisible');
                }
            }
        }
    }
</script>
