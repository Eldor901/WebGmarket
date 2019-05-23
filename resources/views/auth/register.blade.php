@extends('layouts.app')


@section('css-file')
    <link rel="stylesheet" href="{{asset('css/registerform.css')}}">
    <link rel="stylesheet" href="{{asset('css/Addform.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header indigo white-text">{{ __('Register Your Market') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <div class="form-group row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">location_city</i>
                                    {{ Form::label('id_city', 'Your City: ') }}
                                    <input id="id_city" type="text" class="validate autocomplete" required="" aria-required="true" name="id_city">
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
                                    <input id="name_market" type="text" class="validate" required="" aria-required="true" name="name_market" >
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
                                    <input id="description_market" type="text" class="validate" required="" aria-required="true" name="description_market">
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
                                    <input id="number_market" type="number" class="validate" required="" aria-required="true" name="number_market">
                                </div>
                                @if ($errors->has('number_market'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number_market') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">email</i>
                                    {{ Form::label('email', 'Email: ') }}
                                    <input id="email" type="email" class="validate" required="" aria-required="true" name="email">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">remove_red_eye</i>
                                    {{ Form::label('password', 'Password: ') }}
                                    <input id="password" type="password" class="validate" required="" aria-required="true" name="password">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary indigo text-white">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-file')
    <script>
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
@endsection