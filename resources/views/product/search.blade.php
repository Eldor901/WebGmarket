
@extends('layouts.appSearch')

@include('inc.navbarforsearch')

@section('css-file')
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
@endsection

@section('content')
    <!-- Modal Trigger -->

    <!-- Modal Structure -->
    <div class="row">
        @if(count($products) > 0)
            <?php
                $colcount = count($products);
                $i = 1;
            ?>
                    @foreach ($products as $product)
                    <div class="col l3 m6">
                        <div class="card small">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img src="{{ asset('/storage/' . $product->url_product) }}" alt="{{ $product->name_product }}"
                                     class="responsive-img img_card activator">
                            </div>
                            <div class="card-content card_content_color white-text">
                                <h5 class="truncate card_price">{{$product->price}}</h5>
                            </div>
                            <div class="card-reveal wrap_word">
                                <span class="card-title grey-text text-darken-4 truncate">{{ $product->name_product }}<i class="material-icons right">close</i></span>
                                <p>{{$product->description_product}}</p>
                                <p> #{{$product->users()->pluck('name_market')->implode(', ')}}#</p>
                            </div>
                            <div class="card-action card_action_link">
                                <a href="{{ URL::to('search/' . $product->id_product) . '/show' }}" class="card_action_link_text">More Info</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
    </div>
        @else
            <p>Ooops product not found. Try to search for other model</p>
        @endif

@endsection