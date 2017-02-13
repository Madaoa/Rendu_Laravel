@extends('layouts.app')

@section('content')

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

                        <br>
                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary">Modifier</a>

                        <form method="POST" action="{{ route('article.destroy', $article->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(!Auth::guest())

                {!! Form::open(array('url' => 'article/'.$article->id, 'method' => 'POST' )) !!}
                {!! Form::token() !!}
                {!! Form::textarea('comment',Input::old('comment'), array('placeholder'=>"Votre commentaire")) !!}
                <br>
                {!! Form::submit('Envoyer',array('class'=>'btn')) !!}
                {!! Form::close() !!}
                @else
                    <p>{!! HTML::link('user/login', 'Identifiez-vous') !!} pour commenter l'article</p>

                @endif

        </div>
    </div>
@endsection