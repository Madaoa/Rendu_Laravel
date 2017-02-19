@extends('layouts.app')

@section('content')
    <div class="container">
        @include('messages.errors')
        <h2 class="content-heading">Editer l'article </h2>
        <div id="form_insc">
                        <form action="{{ route('article.update', $article->id) }}" method="POST">

                            <input type="hidden" name="_method" value="PUT">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <input type="text" name="title" placeholder="Titre" class="form-control"
                                       value="{{ $article->title }}">
                            </div>
                            <div class="form-group">
                                <textarea name="content" placeholder="Votre contenu"
                                          class="form-control">{{ $article->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" >
                            </div>

                            <input type="submit" value="Publier" class="btn btn-info">
                        </form>
                    </div>
                </div>

@endsection