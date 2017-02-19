@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">


                    <div class="block">
                        @if(Auth::check())
                            <h2 class="content-heading">Vos informations</h2>
                            <ul>
                                <p>Nom</p> <li class="infos">{{ Auth::user()->name }}</li>
                                <p>Email</p><li class="infos">{{ Auth::user()->email }}</li>
                                <p>Date de création</p> <li class="infos">{{ Auth::user()->created_at }}</li>
                            </ul>
                    </div>
                        <div class="block">
                            <h2 class="content-heading">Vos articles publiés</h2>
                            <ul>
                                @forelse(Auth::user()->articles as $article)
                                    <li class="article"><a  href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></li>
                                @empty
                                    Vous n'avez pas encore publié d'article.
                                @endforelse
                            </ul>
                        </div>
                        @else
                            Vous n'êtes pas connecté.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
