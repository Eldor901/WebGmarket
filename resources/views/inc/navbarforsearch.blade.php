<nav>
    <div class="nav-wrapper indigo  lighten-1">
        <div class="container">

            <a href="/home" class="brand-logo">GMarket</a>
            <ul class="right hide-on-med-and-down">
                @auth
                <a href="{{ url('/home') }}" class="white-text right "> GMarket
                    <i class="material-icons right">home</i>
                </a>
                @else
                    <a href="{{ url('/') }}" class="white-text right "> GMarket
                        <i class="material-icons right">home</i>
                    </a>
                @endauth
                <li class="active"><a href="/search">Search</a></li>
            </ul>
        </div>
    </div>
</nav>
