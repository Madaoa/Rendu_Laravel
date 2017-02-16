@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('messages.success')
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des articles</div>

                    <div class="panel-body">
                        <ul>
                            @if(isset($articles[0]))
                            @foreach($articles as $article)

                                <li><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></li>
                                <form method="POST" action="{{ route('admin.destroy', $article->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="submit" value="Supprimer" class="btn btn-danger">
                                    <br><br>
                                </form>

                            @endforeach
                        </ul>
                        {{ $articles->links() }}
                        @else
                            <p>Il n'y a aucun article !</p>
                        @endif
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des commentaires</div>

                    <div class="panel-body">
                        <ul>
                            @if(isset($comments[0]))
                            @foreach($comments as $comment)
                                   <strong> {{ $comment->user->name }}</strong>  <br>
                                    le {{ $comment->created_at }}<br>
                                    {{ $comment->content }}
                                <form method="POST" action="{{ route('adminC.destroy', $comment->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="submit" value="Supprimer" class="btn btn-danger">
                                    <br><br>
                                </form>
                            @endforeach
                        </ul>

                        {{ $comments->links() }}
                        @else
                            <p>Il n'y a aucun commentaire !</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection