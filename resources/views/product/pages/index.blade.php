@extends('layouts.appInside')

@include('inc.navbar')

@section('css-file')
    <link rel="stylesheet" href="{{asset('css/Addform.css')}}">
    <link rel="stylesheet" href="{{asset('css/productIndexStyle.css')}}">
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @if(count($postProduct) > 0)
    <h3 class="center-align">Product Posts</h3>
    <table class="highlight centered responsive-table">
        <thead>
        <tr>
            <th>name</th>
            <th>Price</th>
            <th>Data(d.m.y)</th>
            <th>Actionns</th>
        </tr>
        </thead>
            <tbody>
                @foreach($postProduct as $post_product)
                    <tr>
                        <td>{{$post_product -> name_product}}</td>
                        <td>{{$post_product -> price}}</td>
                        <td>{{ Carbon\Carbon::parse($post_product->created_at)->format('d.m.Y') }}</td>
                        <td>
                            <div class="row product_post_row">
                                <a class="modal-trigger btn btn-primary col s2  offset-s3 show_margin pulse" href="#{{$post_product -> name_product}}">
                                    <i class="material-icons">insert_comment</i>
                                </a>
                                <a href="{{ URL::to('addForm/' . $post_product -> id_product) . '/edit' }}" class="btn pulse orange col s2 show_margin">
                                    <i class="material-icons ">edit</i>
                                </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['addForm.destroy', $post_product -> id_product]]) !!}
                                <button class="btn waves-effect waves-light red darken-1 col s2 pulse" type="submit" name="action">
                                    <i class="material-icons right icon_delete">delete</i>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You Haven't Added Products Yet</p>
    @endif


    @foreach($postProduct as $post_product)
        <div id="{{$post_product -> name_product}}" class="modal">
            <div class="model-header">
                <a href="#!" class="modal-action modal-close waves-effect  btn-primary ">
                    <i class="material-icons right close_modal">close</i>
                </a>
            </div>
            <div class="modal-content">
                <p>{{ Carbon\Carbon::parse($post_product->created_at)->format('d m Y') }}</p>
                <img src="{{ asset('/storage/' . $post_product->url_product) }}" alt="{{ $post_product->name_product }}" class="responsive-img img_height">
                <h3> {{$post_product->name_product}}</h3>
                <p> {{$post_product -> price}}</p>
                <h1>{{$post_product->description_product}}</h1>

            </div>
        </div>
    @endforeach
@endsection


@section('js')
<script >
    $(document).ready(function(){
        $('.modal').modal();
        $('.sidenav').sidenav();
    });


</script>

@endsection