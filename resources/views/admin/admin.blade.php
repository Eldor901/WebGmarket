@extends('layouts.appInside')
@include('inc.navforadmin')

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
                                    <h4 class="card-title">Action<i class="material-icons right">more_vert</i></h4>
                                    <div class="row">
                                        <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                            <div class="section__circle-container__circle color-primary--dark"></div>
                                        </div>
                                        <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                            <h5>Control Market</h5>
                                            <p>
                                                In this page page you can delete markets if they
                                                if she does not fulfill the agreements
                                            </p>
                                            <a href="{{ route('controlMarkets')}}">Control Markets</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                            <div class="section__circle-container__circle color-primary--dark"></div>
                                        </div>
                                        <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                            <h5>Control Product</h5>
                                            <p> In this page you may accept products that has been send to you, also possible to delete products
                                                if they attached unrelated to products photo</p>
                                            <a href="{{route('controlProducts')}}">Control Products</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                            <div class="section__circle-container__circle color-primary--dark"></div>
                                        </div>
                                        <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                            <h5>Control Comment</h5>
                                            <p> In this page you control all comments, delete, update, approve</p>
                                            <a href="{{route("controlComments")}}">Control Comments</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });
    </script>
@endsection