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
    @if(count($comments) > 0)

        <table class="highlight centered responsive-table centered" id="table">
            <h3 class="center-align">All Comments</h3>
            <thead>
                <tr>
                    <th>Data(d.m.y)</th>
                    <th>email</th>
                    <th>rating out of 5</th>
                    <th>Actionns</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ Carbon\Carbon::parse($comment->created_at)->format('d.m.Y') }}</td>
                        <td class="commentemail">{{$comment -> email}}</td>
                        <td class="">{{$comment -> stars}}</td>
                        <td>
                            <div class="row product_post_row">
                                <a class="modal-trigger btn btn-primary col  offset-s2 s3 show_margin" href="#{{$comment -> id_comment}}">
                                    <i class="material-icons">insert_comment</i>
                                </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.destroyComments', $comment -> id_comment]]) !!}
                                <a href="#" class="btn remove waves-effect waves-light red darken-1 col s3 delete" token="{{ csrf_token() }}" route="{!! route('admin.destroyComments')!!}" rel="{{ $comment -> id_comment }}" type="submit" name="action">
                                    <i class="material-icons  icon_delete">delete</i>
                                </a>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No comment</p>
    @endif

    @if(count($comments) > 0)
        @foreach($comments as $comment)
            <div id="{{$comment -> id_comment}}" class="modal">
                <div class="model-header">
                    <a href="#!" class="modal-action modal-close waves-effect  btn-primary ">
                        <i class="material-icons right close_modal">close</i>
                    </a>
                </div>
                <div class="modal-content">
                    <div class="align-content-center" style="text-align: center">
                        <a class="align-content-center"><img src="{{ asset('/storage/' . $comment->product->url) }}" class="responsive-img photo_correction"></a>
                    </div>
                    <div class="clear"></div>
                    {!! Form::model($comment, array('route' => array('CommentController.updateComment', $comment -> id_comment), 'method' => 'PUT')) !!}
                        <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="icon_prefix2" class="materialize-textarea" style="height: 100px" name="comment" value="">{{$comment->comment}}</textarea>
                                <label for="icon_prefix2">Your Comment</label>
                            </div>
                            <label class="col s3">
                                <input type="checkbox" name="is_approved" value=""/>
                                <span>Approve</span>
                            </label>
                            <input id="id_product" value="{{$comment->id_comment}}" type="hidden" class="validate" required="" name="">
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
        @endforeach
    @endif
@endsection

@section('js')
    <script >
        $(document).ready(function(){
            $('.modal').modal();
            $('.sidenav').sidenav();
        });
    </script>

    <script src="{{ asset('js/refactoring.js')}}"></script>
@endsection
