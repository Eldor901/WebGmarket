@extends('layouts.appInside')

@include('inc.navforadmin')


@section('css-file')
    <link rel="stylesheet" href="{{asset('css/Addform.css')}}">
    <link rel="stylesheet" href="{{asset('css/productIndexStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminMarket.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @if(count($postMarket) > 0)
        <h3 class="center-align">All Markets</h3>
        <table class="highlight centered responsive-table" id="table">
            <thead>
            <tr>
                <th>Data(d.m.y)</th>
                <th>name</th>
                <th>Email</th>
                <th>Actionns</th>
            </tr>
            </thead>
            <tbody>
            @foreach($postMarket as $post_market)
                    @if ($post_market ->isAdmin != 1)
                        <tr>
                            <td>{{$post_market -> name_market}}</td>
                            <td>{{$post_market -> email}}</td>
                            <td>{{ Carbon\Carbon::parse($post_market->created_at)->format('d.m.Y') }}</td>
                            <td class="td_btn">
                                <div class="row product_post_row">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.destroyMarket', $post_market -> id_market]]) !!}
                                    <a href="#" class="btn  remove waves-effect waves-light red darken-1 col s5 offset-s3 delete" token="{{ csrf_token() }}" route="{!! route('admin.destroyMarket')!!}" rel="{{ $post_market -> id_market }}"  type="submit" name="action">
                                        <i class="material-icons icon_delete">delete</i>
                                    </a>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endif
            @endforeach
            </tbody>
        </table>
    @else
        <p>No markets Registered Yet</p>
    @endif
@endsection


@section('js')
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('.sidenav').sidenav();
        });
    </script>


@endsection