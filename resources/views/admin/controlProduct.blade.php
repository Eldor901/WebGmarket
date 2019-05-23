@extends('layouts.appInside')

@include('inc.navforadmin')

@section('css-file')
    <link rel="stylesheet" href="{{asset('css/Addform.css')}}">
    <link rel="stylesheet" href="{{asset('css/productIndexStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminControlProduct.css')}}">
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @if(count($postProduct) > 0)
        <h3 class="center-align">All Products</h3>
        <table class="highlight centered responsive-table centered">
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
                @if($post_product->isApproved == '0')
                    <tr>
                        <td>{{$post_product -> name_product}}</td>
                        <td><img src="{{ asset('/storage/' . $post_product->url_product) }}" alt="{{ $post_product->name_product }}" class="responsive-img photo_correction"></td>
                        <td>{{ Carbon\Carbon::parse($post_product->created_at)->format('d.m.Y') }}</td>
                        <td>
                            <div class="row product_post_row">
                                <a class="modal-trigger btn btn-primary col s3  offset-s3 show_margin" href="#{{$post_product -> name_product}}">
                                    <i class="material-icons">insert_comment</i>
                                </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.destroyProduct', $post_product -> id_product]]) !!}
                                <button class="btn waves-effect waves-light red darken-1 col s3" type="submit" name="action">
                                    <i class="material-icons  icon_delete">delete</i>
                                </button>
                                {!! Form::close() !!}
                                {!! Form::model($post_product, array('route' => array('controlProducts.UpdateApprovement', $post_product -> id_product), 'method' => 'PUT')) !!}
                                <button class="btn btn-floating green" id="ApproveBtn" type="submit" name="action">
                                    <i class="material-icons ">done</i>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endif
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
            <div class="modal-content left">
                <a><img src="{{asset('img/marketPhotoForModal.jpg')}}" class="modalPhoto" alt="marketPhotoForModal"></a>
            </div>
            <div class="modal-content right">
                <p>Data: {{ Carbon\Carbon::parse($post_product->created_at)->format('d m Y') }}</p>
                <h5>Market Phone Number: {{$post_product->users()->pluck('number_market')->implode(', ')}}</h5>
                <h5>Market Name: {{$post_product->users()->pluck('name_market')->implode(', ')}}</h5>
                <p>Market Email: {{$post_product->users()->pluck('email')->implode(', ')}}</p>
                <p>Description product: {{$post_product->description_product}}</p>
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