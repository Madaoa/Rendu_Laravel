@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">


                    <div class="block">

                            <h2 class="content-heading">Liste des articles</h2>

                            <ul>
                                @if(isset($articles[0]))
                                    @foreach($articles as $article)

                                        <li><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></li>
                                        <form method="POST" action="{{ route('admin.destroy', $article->id) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" value="Suppression de l'article" class="btn btn-danger">
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

                    <div class="block">
                        <h2 class="content-heading">Liste des commentaires</h2>

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
                                            <input type="submit" value="Supprimer le commenaire" class="btn btn-danger">
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