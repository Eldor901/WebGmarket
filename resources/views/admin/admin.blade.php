@extends('layouts.appInside')
@include('inc.navforadmin')

@section('content')
    <div class="container">
        <h3> Hello world </h3>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });
    </script>
@endsection