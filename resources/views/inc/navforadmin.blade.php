<nav>
    <div class="nav-wrapper indigo  lighten-1">
        <div class="container">

            <a href="#" class="brand-logo">GMarket</a>
            <ul class="right hide-on-med-and-down">
                <li><a data-target="slide-out" class="sidenav-trigger show-on-medium-and-up show-on-medium-and-down">Actions</a></li>
                <li><a href="admin" class="waves-effect">Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<ul id="slide-out" class="sidenav right">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="{{asset('img/backgroundMarket.jpg')}}" alt="backgroundMarket">
            </div>
            <img class="circle" src="{{asset('img/admin.png')}}" alt="userPhoto">
            <span class="white-text name">{{Auth::user()->name_market}}</span>
            <span class="white-text email">{{Auth::user()->email}}</span>
        </div>
    </li>
    <li><a href="{{route('controlProducts')}}">Control Products</a></li>
    <li><div class="divider"></div></li>
    <li><a href="{{route('controlMarkets')}}">Control Market</a></li>
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
