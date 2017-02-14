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
                        <div class="table table-bordered bg-success"><img src="{!! '/images/'.$article->filePath !!}"></div>

                        <br>
                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary">Modifier</a>

                        <form method="POST" action="{{ route('article.destroy', $article->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                            <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Partager</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection