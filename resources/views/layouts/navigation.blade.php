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
            <span class="relative w-full">
                <input aria-label="search" type="search" id="search" placeholder="Search" class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
                <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                    <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                    </svg>
                </div>
            </span>
        </div>

        <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                <li class="flex-1 md:flex-none md:mr-3">
                    <div class="relative inline-block">
                        @if(auth()->check())
                        <button onclick="toggleDD('myDropdown')" class="drop-button text-white py-2 px-2 mr-4"> <span class="pr-2"><i class="fa fa-user"></i></span> Hi, {{ auth()->user()->name }}</button>
                        @else
                            <a href="{{ route('login') }}" class="inline-block text-gray-400 no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Login</a>
                            <a href="{{ route('register') }}" class="inline-block text-gray-400 no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Register</a>
                        @endif
                        <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                            <a href="{{ route('profile.edit') }}" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
                            <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-cog fa-fw"></i> Board </a>
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
