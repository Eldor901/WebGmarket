<nav>
    <div class="nav-wrapper indigo  lighten-1">
        <div class="container">
            @auth
                <a href="/home" class="brand-logo">GMarket</a>
            @else
                <a href="/" class="brand-logo">GMarket</a>
            @endauth
            <ul class="right hide-on-med-and-down">
                @auth
                <a href="{{ route('home') }}" class="white-text right "> GMarket
                    <i class="material-icons right">home</i>
                </a>
                @else
                    <a href="/showPopularProducts/{{$name_city}}" class="white-text right "> Popular
                        <i class="material-icons right">star</i>
                    </a>
                    <a href="{{ route('/') }}" class="white-text right "> GMarket
                        <i class="material-icons right">home</i>
                    </a>
                @endauth
                <li class=" "><a href="{{ URL::to('search/' . $name_city )}}">Search</a></li>
            </ul>
        </div>
    </div>
</nav>
