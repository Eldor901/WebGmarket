@extends('layouts.appInside')

@include('inc.navbar')

@section('css-file')
    <link rel="stylesheet" href="{{asset('css/Addform.css')}}">
    <link rel="stylesheet" href="{{asset('css/ProductCreate.css')}}">

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="row">
        <div class="col s6 offset-s3 add_form">
            <div class="col s12 indigo lighten-1 white-text ">
                <div class="col s4">
                    <h3 class="align-content-center">GMarket</h3>
                </div>
                <div class="col s8 left face_icons">
                    <i class="medium material-icons right hide-on-med-and-down">edit_location</i>
                </div>
            </div>
            <div class="card-content border-style col s12">
                <div class="col s12 Product_add_style">
                    <h1 class="align-content-center font_add_product"> Edit Yourt Market</h1>
                </div>
                {!! Form::model(Auth::user(), array('route' => array('home/update', Auth::user()->id_market), 'method' => 'PUT'))!!}
                @csrf
                    <div class="form-group row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">location_city</i>
                            {{ Form::label('id_city', 'Your City: ') }}
                            <input id="id_city" type="text" class="validate autocomplete" required="" aria-required="true" name="id_city" value="{{Auth::user()->id_city}}" >
                        </div>
                        @if ($errors->has('id_city'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('id_city') }}</strong>
                            </span>5
                        @endif
                    </div>

                    <div class="form-group row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">store</i>
                            {{ Form::label('name_market', 'MarketName: ') }}
                            <input id="name_market" type="text" class="validate" required="" aria-required="true" name="name_market" value="{{Auth::user()->name_market}}">
                        </div>
                        @if ($errors->has('name_market'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name_market') }}</strong>
                                        </span>5
                        @endif
                    </div>

                    <div class="form-group row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">message</i>
                            {{ Form::label('description_market', 'Market Description: ') }}
                            <input id="description_market" type="text" class="validate" required="" aria-required="true" name="description_market" value="{{Auth::user()->description_market}}">
                        </div>
                        @if ($errors->has('description_market'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description_market') }}</strong>
                            </span>
                        @endif
                    </div>



                    <div class="form-group row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">phone_number</i>
                            {{ Form::label('number_market', 'Phone Number: ') }}
                            <input id="number_market" type="number" class="validate" required="" aria-required="true" name="number_market" value="{{Auth::user()->number_market}}">
                        </div>
                        @if ($errors->has('number_market'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number_market') }}</strong>
                                        </span>
                        @endif
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" style="margin-left: 20px">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script>
        var options = {
            data:
                {
                    "1 Tashkent": null,
                    "2. Kazan": null,
                    "3. Yoshkar-olz": null,
                }
        };
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.autocomplete');
            var instances = M.Autocomplete.init(elems, options);
        });
    </script>
@endsection