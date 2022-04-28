<nav class="navbar flex items-center justify-between py-2 px-6 bg-emerald-700 text-white">
    <div class="logo flex items-center justify-center">
        <img src="{{ url('images/flag.jpg') }}" />

        <h1><a href="{{ route('overview.index') }}">BONNY <span> - 2022 </span></a></h1>


    </div>

    <ul class="nav-items flex justify-center">
        @include('partials/nav_items')

    </ul>


    <div id="menu-bar" class="hamburger">
        <div id="bar1" class="bar"></div>
        <div id="bar2" class="bar"></div>
        <div id="bar3" class="bar"></div>
    </div>

</nav>
