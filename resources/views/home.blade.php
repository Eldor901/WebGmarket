@extends('layouts.appInside')


@include('inc.navbar')

@section('css-file')
    <link rel="stylesheet" href="{{asset('css/Addform.css')}}">
    <!-- Scripts -->
    <script src="{{ asset('appP.jss') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/AddPage.css')}}">
@endsection

@section('content')
       <h3 class="center text-indigo gmarket_welcome"> welcome to Gmarket</h3>
        <div class="container">
            <main class="mdl-layout__content">
                <div class="mdl-layout__tab-panel is-active" id="overview">
                    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-content">
                                        <h4 class="card-title">Menu<i class="material-icons right">more_vert</i></h4>
                                        <div class="row">
                                            <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                                <div class="section__circle-container__circle color-primary--dark"></div>
                                            </div>
                                            <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                                <h5>AddProduct</h5>
                                                <p>Page AddProduct allows you add your markets product. You can add  any number of products. The only thing is you have to fill form every
                                                    time when you add new product
                                                </p>
                                                <a> </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                                <div class="section__circle-container__circle color-primary--dark"></div>
                                            </div>
                                            <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                                <h5>My Products</h5>
                                                In page my products you can control your added products. You will have a change to refactor your product(i.e change product info), also delete
                                                and see more information about your product
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                                <div class="section__circle-container__circle color-primary--dark"></div>
                                            </div>
                                            <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                                <h5>Edit Market</h5>
                                                Edit Market is page of changing information of your market.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <a data-target="slide-out" class="pointLink sidenav-trigger show-on-medium-and-up show-on-medium-and-down">Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-content">
                                        <h4 class="card-title">Search<i class="material-icons right">more_vert</i></h4>
                                        <div class="row">
                                            <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                                <div class="section__circle-container__circle color-primary--dark"></div>
                                            </div>
                                            <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                                <h5>Search Page</h5>
                                                <p>This page gives you to see all products In different cities. You can search by  name of product or description.
                                                    We believe that Gmarket wiil help you to control price of product in different regions. Furthermore,
                                                    People will be able to see, compare price of products and come and buy in your Market
                                                </p>
                                            </div>
                                        </div>
                                    <div class="card-action">
                                        <a href="/" class="mdl-button pointLink">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </section>
                    <section class="section--center">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-content">
                                        <h4 class="card-title">Logout<i class="material-icons right">more_vert</i></h4>
                                        <p>In you click to Logout in will quite From Your Page and redirected to user page where you can also search products from
                                            different cities see prices Products, Information about Markets and so on</p>
                                    </div>
                                    <div class="card-action">
                                        <a href="#" class="mdl-button pointLink">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
        <footer class="page-footer indigo lighten1">
            <div class="row">
                <div class="col offset-s2 s3 white-text">
                    <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
                    <h6 class="mdl-mega-footer--heading">Features</h6>
                    <ul class="mdl-mega-footer--link-list">
                        <li><a href="#" class="cyan-text">About</a></li>
                        <li><a href="#" class="cyan-text">Search</a></li>
                        <li><a href="#" class="cyan-text">New Elements</a></li>
                        <li><a href="#" class="cyan-text">Updates</a></li>
                    </ul>
                </div>
                <div class="col s3">
                    <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
                    <h6 class="mdl-mega-footer--heading">FAQ</h6>
                    <ul class="mdl-mega-footer--link-list">
                        <li><a href="#" class="cyan-text">Leave Comment</a></li>
                        <li><a href="#" class="cyan-text">Contact us</a></li>
                    </ul>
                </div>
                <div class="col s3">
                    <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
                    <h6 class="mdl-mega-footer--heading">Additional Information</h6>
                    <ul class="mdl-mega-footer--link-list">
                        <li><a href="#" class="cyan-text">Discount</a></li>
                        <li><a href="#" class="cyan-text">Advitisment</a></li>
                        <li><a href="#" class="cyan-text">Resources</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-copyright row">
                <div class=" col s12 offset-s2">
                    GMarket
                </div>
            </div>
        </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });
    </script>
@endsection



