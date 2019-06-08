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
    <div id="particles-js"></div>
        <div class="container position-ref full-height">
                @if (Route::has('login'))
                    <ul class="right">
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
                                        <div class="col l3 m12 city_in_search" style="margin-top: 20px;
                                        margin-right: 10px;
                                                ">
                                            {{ Form::label('id_city', 'Your City:',  ['class' => 'white-text']) }}
                                            <i class="small material-icons right">location_city</i>
                                            <input id="id_city" type="text" value="{{$name_city}}" class="validate autocomplete white grey-text input-search" required="" aria-required="true" name="city" >
                                        </div>
                                        <div class="col l8 m12">
                                            <i class="small material-icons right camera_fix">camera_alt</i>
                                            <button type="submit" class="right btn-floating search_button "><i class="material-icons">search</i></button>
                                            <input type="search" name="search" class="white validate autocomplete_product  grey-text input-search" required="" aria-required="true" >
                                        </div>
                                     </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
        var option1 = {
            data:
                {
                    @foreach($cities as $city)
                    "{{$city->name_city}}": 'data:image/jpeg;base64,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',
                    @endforeach

                }
        };

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.autocomplete');
            var elems2 = document.querySelectorAll('.autocomplete_product');
            var instances = M.Autocomplete.init(elems, option1);


        });
    </script>

    <script type="text/javascript" src="{{ URL::asset('js/particles.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/appP.js') }}"></script>
    <script type="text/javascript" src=" {{ URL::asset('js/validate.js')}}"></script>
    </body>
</html>
