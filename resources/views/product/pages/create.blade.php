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
                    <i class="medium material-icons right hide-on-med-and-down">face</i>
                </div>
            </div>
            <div class="card-content border-style col s12">
                <div class="col s12 Product_add_style">
                    <h1 class="align-content-center font_add_product"> Add Your Product</h1>
                </div>
                {!! Form::open(array('route' => 'addForm.store', 'files' => true)) !!}
                    <div class="input-field col s12">
                        <i class="material-icons prefix">style</i>
                        {{ Form::label('product_type', 'Product Type: ') }}
                        <input id="product_type" type="text" class="validate" required="" aria-required="true" name="product_type" >
                    </div>
                    <div class="file-field input-field col s12">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="url_product">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">message</i>
                        {{ Form::label('photo_description', 'Photo Description: ') }}
                        <input id="photo_description" type="text" class="validate" required="" aria-required="true" name="photo_description">
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">message</i>
                        {{ Form::label('price', 'Price: ') }}
                        <input id="price" type="text" class="validate" required="" aria-required="true" name="price">
                    </div>
                    <div class="form-field center-align submit_btn">
                        {{ Form::submit('Submit', ['class' => 'btn-large waves-effect waves-light indigo lighten-1 submit_btn_href']) }}
                        <a href="/home" class="btn-large indigo lighten-1">Main Page</a>
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