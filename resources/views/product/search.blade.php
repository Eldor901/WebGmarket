
@extends('layouts.appSearch')

@include('inc.navbarforsearch')


@section('css-file')
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
    <link rel="stylesheet" href="{{asset('css/pagination.css')}}">
@endsection

@section('content')
    <!-- Modal Trigger -->

    <!-- Structure -->
    <div class="row">
        @if(count($products) > 0)
            <?php
                $i = 1;
            ?>
                    @foreach ($products as $product)
                        <div class="col l3 m6">
                            <div class="card small">
                                <div class="card-image waves-effect waves-block waves-light card_height">
                                    <img src="{{ asset('/storage/' . $product->url) }}" alt="{{ $product->name }}"
                                         class="responsive-img img_card activator">
                                </div>
                                <div class="card-content card_content_color white-text">
                                    <h5 class="truncate card_price">{{$product->price}} {{$product->nominal}}</h5>
                                </div>
                                <div class="card-reveal wrap_word">
                                    <span class="card-title grey-text text-darken-4 truncate">{{ $product->name }}<i class="material-icons right">close</i></span>
                                    <p>{{$product->description}}</p>
                                </div>
                                <div class="card-action card_action_link">
                                    <a href="{{ URL::to('search/' . $product->id_product) . '/show' }}" class="card_action_link_text">More Info</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
              <div class="clear"></div>
        @else
            <div class="row">
                <p class="center">Ooops product not found. Try to search for other model</p>
                <div class="" style="text-align: center ">
                    <img src="{{asset('img/notFound.png')}}" alt="notFound" class="responsive-img" >
                </div>
            </div>
        @endif
</div>


@endsection