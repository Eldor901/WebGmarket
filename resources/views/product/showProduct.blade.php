
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
                        <h4 class="card-title">{{$post->name}}<i class="material-icons right">tv</i></h4>
                        <div class="row">
                            <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                <div class="section__circle-container__circle color-primary--dark"></div>
                            </div>
                            <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                <h5>Photo</h5>
                                <img src="{{ asset('/storage/' . $post->url) }}" alt="{{ $post->name }}" class="responsive-img   materialboxed">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s2 section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                <div class="section__circle-container__circle color-primary--dark"></div>
                            </div>
                            <div class="col s10 section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                {{ $post->description}}
                                <h5 class="truncate card_price">{{$post->price}} {{$post->currency->nominal}}</h5>
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
                                    <p class=""> Market: {{$post->users()->pluck('name')->implode(', ')}}</p>
                                </div>
                                <div class="clear"></div>
                                <div class="col s10 place_show_market">
                                    <i class=" left material-icons phone_show_market">phone</i>
                                    <p>Phone: {{$post->users()->pluck('phone')->implode(', ')}}</p>
                                </div>
                                <div class="col s10" style="margin-top: -5px; margin-bottom: 10px">
                                    <i class=" left material-icons">place</i>
                                    <p>Location: {{$post->users()->pluck('description')->implode(', ')}}</p>
                                </div>
                                <div class="clear"></div>
                                <div class="col s10">
                                    <i class="left material-icons">email</i>
                                    <p>email:{{$post->users()->first()->user()->pluck('email')->implode(', ')}}</p>
                                </div>
                            </div>
                        </div>

                        <button data-target="modal1" type="submit" class="right btn modal-trigger" style="margin-top: -20px">leave a comment</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="all_comments container">
        <?php $pos=1 ?>
        @foreach($comments as $comment)
            @if ($comment->is_approved == 1)

                <div class="message"
                     @if($pos % 2 == 0)
                              style="float: right"
                      @endif
                >
                    <div class="triangle"></div>
                    <img src="https://img.icons8.com/plasticine/2x/user.png" class="avatar">
                    <p><strong>{{$comment->email}}<em> {{$comment->created_at}}</em></strong>
                        {{$comment->comment}}</p>
                </div>
            @endif
         <?php  $pos++ ?>
        @endforeach
    </div>
    <div id="modal1" class="modal " style="width: 45%; height: 80%;">
        <div class="container" style="width: 80%">
            {!! Form::open(['action' => 'CommentController@saveComment','method' => 'POST', 'class'=>'col s6 offset-s3 modal_content']) !!}

            <h3 class="text-center" style="text-align: center">leave your comment</h3>


            <div class="form-group row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    {{ Form::label('email', 'Email: ') }}
                    <input id="email" type="email" class="validate" required="" aria-required="true" name="email">
                </div>
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="icon_prefix2" class="materialize-textarea" style="height: 100px" name="comment"></textarea>
                <label for="icon_prefix2">Your Comment</label>
            </div>


            <div class="clear"></div>
            <h6 class="right">Rating</h6>

            <div class="clear"></div>
            <div class="rating" style="color: rebeccapurple; float: none">
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
            </div>

            <div class="clear"></div>

            <input id="id_product" value="{{$post->id_product}}" type="hidden" class="validate" required="" name="id_product">


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4" style="margin-top: 15px; float: right">
                    <button type="submit" class="btn btn-primary indigo text-white">
                        {{ ('Submit') }}
                    </button>
                </div>
            </div>

            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var galary = document.querySelectorAll('.materialboxed');
            M.Materialbox.init(galary,{});
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, {});
        });

        // Or with jQuery

        $(document).ready(function(){
            $('.modal').modal();
        });

    </script>
@endsection
