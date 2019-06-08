
@extends('layouts.appSearch')



@section('css-file')
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
@endsection

@section('content')
    <nav>
        <div class="nav-wrapper indigo  lighten-1">
            <div class="container">

                <ul class="right hide-on-med-and-down">
                        <a href=" {{ url()->previous() }} " class="white-text right ">
                            Back
                        </a>
                </ul>
            </div>
        </div>
    </nav>
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
        <div class="row">
            <div class="col offset-s3 s6">
                <div class="card">
                    <div class="card-content">
                        <h4 class="card-title">{{$post->name_product}}<i class="material-icons right">tv</i></h4>
                        <div class="row">
                            <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                <div class="section__circle-container__circle color-primary--dark"></div>
                            </div>
                            <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                <h5>Photo</h5>
                                <img src="{{ asset('/storage/' . $post->url_product) }}" alt="{{ $post->name_product }}" class="responsive-img   materialboxed">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                <div class="section__circle-container__circle color-primary--dark"></div>
                            </div>
                            <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                <h5>{{$post->name_product}}</h5>
                                {{ $post->description_product}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                <div class="section__circle-container__circle color-primary--dark"></div>
                            </div>
                            <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                <h5>About Market</h5>
                                <div class="col s8">
                                    <i class="left material-icons">shopping_cart</i>
                                    <p class=""> Market: {{$post->users()->pluck('name_market')->implode(', ')}}</p>
                                </div>
                                <div class="clear"></div>
                                <div class="col s10 place_show_market">
                                    <i class=" left material-icons phone_show_market">phone</i>
                                    <p>Phone: {{$post->users()->pluck('number_market')->implode(', ')}}</p>
                                </div>
                                <div class="col s10" style="margin-top: -5px; margin-bottom: 10px">
                                    <i class=" left material-icons">place</i>
                                    <p>Location: {{$post->users()->pluck('description_market')->implode(', ')}}</p>
                                </div>
                                <div class="clear"></div>
                                <div class="col s10">
                                    <i class="left material-icons">email</i>
                                    <p>email:{{$post->users()->pluck('email')->implode(', ')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var galary = document.querySelectorAll('.materialboxed');
            M.Materialbox.init(galary,{});
        });
    </script>
@endsection
