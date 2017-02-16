@extends('layouts.app')


@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $article->title }}</div>
                    <div class="panel-body">
                        {{ $article->content }}
                        <br>
                        <br>

                        <strong>{{ $article->user->name }}</strong>
                        <div class="table table-bordered bg-success"><img src="{!! '/images/'.$article->filePath !!}"></div>

                        <br>
                        @if(Auth::user()->id==$article->user_id)
                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary">Modifier</a>

                        <form method="POST" action="{{ route('article.destroy', $article->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" value="Supprimer" class="btn btn-danger">

                            <br><br>
                        </form>
                        @endif

                        Nombre de likes : {{$article->likeCount}}
                        @if( $article->liked() )
                            <form method="POST" action="{{ route('article.unlike', $article->id) }}">
                                {{ csrf_field() }}
                                <input type="submit" value="Unlike" class="btn btn-danger">
                            </form>
                        @else
                            <form method="POST" action="{{ route('article.like', $article->id) }}">
                                {{ csrf_field() }}
                                <input type="submit" value="Like" class="btn btn-success">
                            </form>
                        @endif

                        <p>Partager sur :
                            @include('layouts.share', [
                                    'url' => request()->fullUrl(),
                                    'description' => 'This is really cool link',
                                    'image' => 'http://placehold.it/300x300?text=Cool+link'
                                ]) </p>


                        <form method="POST" action="{{ route('comment.store')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="content" placeholder="Votre commentaire" class="form-control"></textarea>
                            </div>
                            <input name="article_id" type="hidden" value="{{ $article->id }}" class="hidden">
                            <input name="user_id" type="hidden" value="{{ Auth::user()->id}}" class="hidden">

                            <input type="submit" value="Publier" class="btn btn-info">





                        </form>




                    @foreach($comments as $comment)


                            @if($comment->article_id == $article->id)

                                <div>
                                    <strong>Par {{$comment->user->name}}</strong> -
                                    le {{date('d/m/Y', strtotime($comment->created_at))}} à
                                    {{date('H:m:s', strtotime($comment->created_at))}}
                                    <br>
                                    {{ $comment->content }}

                                    @if(Auth::user()->id == $comment->user->id)
                                        <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-primary">Modifier</a>
                                        <form method="POST" action="{{ route('comment.destroy', $comment->id) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" value="Supprimer" class="btn btn-danger">
                                            <br><br>
                                        </form>
                                    @endif

                                    <br><br>
                                </div>
                            @else
                            @endif
                        @endforeach
                        {{ $comments->links() }}



                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection