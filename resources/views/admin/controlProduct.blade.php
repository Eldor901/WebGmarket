@extends('layouts.appInside')

@include('inc.navforadmin')

@section('css-file')
    <link rel="stylesheet" href="{{asset('css/Addform.css')}}">
    <link rel="stylesheet" href="{{asset('css/productIndexStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminControlProduct.css')}}">
    <link rel="stylesheet" href="{{asset('css/pagination.css')}}">
    <!-- Scripts -->

    <!--  -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @if(count($postProduct) > 0)
        <h3 class="center-align">All Products</h3>

        {{ $postProduct->links()}}
        <table class="highlight centered responsive-table centered" id="table">
            <thead>
            <tr>
                <th>name</th>
                <th>Photo</th>
                <th>Data(d.m.y)</th>
                <th>Actionns</th>
            </tr>
            </thead>
            <tbody>
            @foreach($postProduct as $post_product)
                    <tr>
                        <td class="productname">{{$post_product -> name}}</td>
                        <td class=""><img src="{{ asset('/storage/' . $post_product->url) }}" alt="{{ $post_product->name }}" class="responsive-img photo_correction"></td>
                        <td>{{ Carbon\Carbon::parse($post_product->created_at)->format('d.m.Y') }}</td>
                        <td>
                            <div class="row product_post_row">
                                <a class="modal-trigger btn btn-primary col s3  show_margin" href="#{{$post_product -> name}}">
                                    <i class="material-icons">insert_comment</i>
                                </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.destroyProduct', $post_product -> id_product]]) !!}
                                <a href="#" class="btn remove waves-effect waves-light red darken-1 col s3 delete" token="{{ csrf_token() }}" route="{!! route('admin.destroyProduct')!!}" rel="{{ $post_product -> id_product }}" type="submit" name="action">
                                    <i class="material-icons  icon_delete">delete</i>
                                </a>
                                {!! Form::close() !!}
                                {!! Form::model($post_product, array('route' => array('controlProducts.UpdateApprovement', $post_product -> id_product), 'method' => 'PUT')) !!}
                                    <a class="btn remove btn-floating green isApprove" id="ApproveBtn"  token="{{ csrf_token() }}" route="{!! route('controlProducts.UpdateApprovement')!!}" rel="{{ $post_product -> id_product }}" type="submit" name="action">
                                        <i class="material-icons ">done</i>
                                    </a>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>There is no product to be moderated</p>
    @endif


    @foreach($postProduct as $post_product)
        <div id="{{$post_product -> name}}" class="modal">
            <div class="model-header">
                <a href="#!" class="modal-action modal-close waves-effect  btn-primary ">
                    <i class="material-icons right close_modal">close</i>
                </a>
            </div>
            <div class="modal-content left">
                <a><img src="{{asset('img/marketPhotoForModal.jpg')}}" class="modalPhoto" alt="marketPhotoForModal"></a>
            </div>
            <div class="modal-content right">
                <p>Data: {{ Carbon\Carbon::parse($post_product->created_at)->format('d m Y') }}</p>
                <h5>Market Name: {{$post_product->users()->pluck('name')->implode(', ')}}</h5>
                <p>Description product: {{$post_product->description}}</p>
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

    <script>
        $(document).on('click', '.isApprove', function()
        {

                var id = $(this).attr("rel");
                var route = $(this).attr("route");
                var token = $(this).attr("token");
                $.ajax(
                    {
                        type: "PUT",
                        url: route,
                        data: {_token: token, id: id},
                    });


        });
    </script>

    <script src="{{ asset('js/refactoring.js')}}"></script>
@endsection