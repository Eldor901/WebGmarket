
<nav class="nav-wrapper indigo  lighten-1">
    <div class="container">
        <a href="/home" class="brand-logo left">GMarket</a>
        <ul class="right">
            <li>
                <a data-target="slide-out" class="sidenav-trigger show-on-medium-and-up show-on-medium-and-down">Menu</a>
            </li>
            <li class="hide-on-small-only"><a href="/">Search</a></li>
            <li class="hide-on-small-only">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>


<ul id="slide-out" class="sidenav right">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="{{asset('img/backgroundMarket.jpg')}}" alt="backgroundMarket">
            </div>
            <img class="circle" src="{{asset('img/userPhoto.png')}}" alt="userPhoto">
            <span class="white-text name">{{Auth::user()->name_market}}</span>
            <span class="white-text email">{{Auth::user()->email}}</span>
        </div>
    </li>
    <li><a href="/"><i class="material-icons waves-effect">search</i>Search Globaly</a></li>
    <li><div class="divider"></div></li>
    <li><a href="/addForm " class="waves-effect">My Products</a></li>
    <li><a href="/addForm/create">AddProduct</a></li>
    <li><div class="divider"></div></li>
    <li><a href="/home/{{Auth::user()->id_market}}/edit">Edit Market</a></li>
    <li>
        <a class="dropdown-item waves-effect" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
