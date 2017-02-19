@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('messages.success')
                <div class="content">
                    <div class="homepage_widget">
                        <h2 class="content-heading">Catégorie </h2>
                        <ul class="newsfeed">
                            @foreach($articles as $article)
                                <li><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></li>
                            @endforeach
                        </ul>

                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection