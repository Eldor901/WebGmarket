<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
    <div id="particles-js">
        <div class="container position-ref full-height">
                @if (Route::has('login'))
                    <ul class="right hide-on-med-and-down">
                            @auth
                                <a href="{{ url('/home') }}" class="white-text right "> GMarket
                                     <i class="material-icons right">home</i>
                                     </a>

                            @else
                                <a class="white-text" href="{{ route('login') }}">Login</a>
                                @if (Route::has('register'))
                                    <a class="white-text" href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                    </ul>
        </div>
        @endif
            <section id="search" class="section section-search white-text center scrollspy">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <h3 class="center">Search  Product</h3>
                            <div class="input-field col s12">
                                <form action="/search" method="get">
                                    <div class="input-field col s12">
                                        <div class="col s3 city_in_search" style="margin-top: 20px;
                                        margin-right: 10px;
                                                ">
                                            {{ Form::label('id_city', 'Your City:',  ['class' => 'white-text']) }}
                                            <i class="small material-icons right">location_city</i>
                                            <input id="id_city" type="text" class="validate autocomplete white grey-text input-search" required="" aria-required="true" name="id_city" >
                                        </div>
                                        <div class="col s8">
                                            <i class="small material-icons right camera_fix">camera_alt</i>
                                            <button type="submit" class="right btn-floating search_button "><i class="material-icons">search</i></button>
                                            <input type="search" name="search" class="white grey-text input-search">
                                        </div>
                                     </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.sidenav').sidenav();
        });
        $(document).ready(function () {
            $('select').formSelect();
        });

        $(document).ready(function() {
            $('select').material_select();

            // for HTML5 "required" attribute
            $("select[required]").css({
                display: "inline",
                height: 0,
                padding: 0,
                width: 0
            });
        });
        var options = {
            data:
                {
                    @foreach($cities as $city)
                    "{{$city->name_city}}": null,
                    @endforeach
                }
        };
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.autocomplete');
            var instances = M.Autocomplete.init(elems, options);
        });
    </script>

    <script type="text/javascript" src="{{ URL::asset('js/particles.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/appP.js') }}"></script>
    </body>
</html>
