@extends('layouts.appInside')

@include('inc.navbar')

@section('css-file')
    <link rel="stylesheet" href="{{asset('css/Addform.css')}}">
    <link rel="stylesheet" href="{{asset('css/productIndexStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/pagination.css')}}">
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

@endsection

@section('content')

    <h3 class="center-align">My Posted Products</h3>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form action="/searchUserPost" method="get">
                        <div class="input-field col s12">
                            <input type="search" name="searchUserPosts" id="autocomplete-input" class="autocomplete">
                            <label for="autocomplete-input">search by name</label>
                            <button type="submit" class="right btn-floating search_button" style="margin-top: -60px"><i class="material-icons">search</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(count($postProduct) > 0)
    {{$postProduct->appends(request()->input())->links()}}
    <table class="highlight centered responsive-table pagination_table" id="table">
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
                        <td class="width_name_product">{{$post_product -> name_product}}</td>
                        <td>{{$post_product -> price}}</td>
                        <td>{{ Carbon\Carbon::parse($post_product->created_at)->format('d.m.Y') }}</td>
                        <td>
                            <div class="row product_post_row">
                                <a class="modal-trigger btn btn-primary col s2  offset-s3 show_margin " href="#{{$post_product -> name_product}}">
                                    <i class="material-icons">insert_comment</i>
                                </a>
                                <a href="{{ URL::to('addForm/' . $post_product -> id_product) . '/edit' }}" class="btn  orange col s2 show_margin">
                                    <i class="material-icons ">edit</i>
                                </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['addForm.deleteProduct', $post_product -> id_product]]) !!}
                                <a  class="btn  waves-effect waves-light red darken-1 col s2  remove delete" token="{{ csrf_token() }}" route="{!! route('addForm.deleteProduct')!!}" rel="{{ $post_product -> id_product }}"  type="submit" name="action">
                                    <i class="material-icons icon_delete">delete</i>
                                </a>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{$postProduct->appends(request()->input())->links()}}
    @else
        <p class="center">There is no product found</p>
    @endif

    @foreach($postProduct as $post_product)
        <div id="{{$post_product -> name_product}}" class="modal">
            <div class="model-header">
                <a href="#!" class="modal-action modal-close waves-effect  btn-primary ">
                    <i class="material-icons right close_modal">close</i>
                </a>
            </div>
            <div class="modal-content">
                <div class="modal-content left modal_content_left">
                    <p>{{ Carbon\Carbon::parse($post_product->created_at)->format('d m Y') }}</p>
                    <img src="{{ asset('/storage/' . $post_product->url_product) }}" alt="{{ $post_product->name_product }}" class="responsive-img img_height">
                </div>
                <div class="modal-content right modal_content_right">
                    <h5> {{$post_product->name_product}}</h5>
                    <p> {{$post_product -> price}}</p>
                    <p class="modal_description_product">{{$post_product->description_product}}</p>
                </div>
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

    var option1 = {
        data:
            {
                @foreach($postProduct as $post_product)
                    "{{$post_product->name_product}}": null,
                @endforeach

                @foreach($product as $products)
                "{{$products->name_product}}": null,
                @endforeach



            }
    };





    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.autocomplete');
        var elems2 = document.querySelectorAll('.autocomplete_product');
        var instances = M.Autocomplete.init(elems, option1);


    });
</script>

<script src="{{ asset('js/refactoring.js')}}"></script>
@endsection