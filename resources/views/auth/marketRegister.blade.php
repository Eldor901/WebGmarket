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
                    <div class="card-header indigo white-text">{{ __('Please enter details') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('storeDetails')}}">
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
                                    {{ Form::label('name', 'MarketName: ') }}
                                    <input id="name" type="text" class="validate" required="" aria-required="true" name="name" >
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>5
                                @endif
                            </div>

                            <div class="form-group row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">message</i>
                                    {{ Form::label('description', 'Market Location: ') }}
                                    <input id="description" type="text" class="validate" required="" aria-required="true" name="description">
                                </div>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">phone_number</i>
                                    {{ Form::label('number', 'Phone Number: ') }}
                                    <input id="number" type="number" class="validate" required="" aria-required="true" name="number">
                                </div>
                                @if ($errors->has('number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number') }}</strong>
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
                    "{{$city->name}}": null,
                    @endforeach
                }
        };
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.autocomplete');
            var instances = M.Autocomplete.init(elems, options);
        });
    </script>
@endsection
