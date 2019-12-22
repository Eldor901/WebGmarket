@extends('layouts.appInside')


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
                    <i class="medium material-icons right hide-on-med-and-down">face</i>
                    <i class="medium material-icons right hide-on-med-and-down">face</i>
                    <i class="medium material-icons right hide-on-med-and-down">face</i>
                </div>
            </div>
            <div class="card-content border-style col s12">
                <div class="col s12 Product_add_style">
                    <h1 class="align-content-center font_add_product"> Add Your Product</h1>
                </div>
                {!! Form::model($post, array('route' => array('addForm.update', $post -> id_product), 'files' => true, 'method' => 'PUT')) !!}
                <div class="input-field col s12">
                    <i class="material-icons prefix">style</i>
                    {{ Form::label('name', 'Product Type: ') }}
                    <input id="name" type="text" class="validate" required="" value="{{$post->name}}" aria-required="true" name="name" >
                </div>
                <div class="file-field input-field col s12">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="url" value="{{$post->url}}">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">message</i>
                    {{ Form::label('description', 'Photo Description: ') }}
                    <input id="description" type="text" class="validate" required="" value="{{$post->description}}" aria-required="true" name="description">
                </div>

                <div class="input-field col s8">
                    <i class="material-icons prefix">money</i>
                    {{ Form::label('price', 'Price: ') }}
                    <input id="price" type="number" class="validate"  value="{{$post->price}}" required="" aria-required="true" name="price">
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">Currencies</i>
                    <select name="currency">
                        @foreach($currencies as $currency)
                            <option value="{{$currency->id_currency}}">{{$currency->nominal}}</option>
                        @endforeach
                    </select>
                    {{ Form::label('currency', 'Currency: ') }}
                </div>
                <div style="display: inline-block; margin-bottom: 50px">
                     @foreach($categories as $category)
                        <label class="col s3">
                            <input type="checkbox" name="categories[]" value="{{$category->id_category}}"
                            @if($post->category->where('id_category', $category->id_category)->count())
                                checked="checked"
                            @endif
                            >
                            <span>{{$category->name}}</span>
                        </label>
                    @endforeach
                </div>
                <div class="form-field center-align submit_btn">
                    {{ Form::submit('Edit', ['class' => 'btn-large waves-effect waves-light indigo lighten-1 ']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });
    </script>
@endsection