@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12">


                <!-- Title -->
                <h1>- {{$article->title}} -</h1>

                <hr>
                <br><br>   <br><br>


                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <div class="panel-body">
                    <ul>
                        {{$article->body}}
                        <br><br>
                        {{$article->user->name }}<br>
                        <p><i>Posté le {{$article->created_at}}</i></p>

                        <p>Partager sur : @include('component.share', [
            'url' => request()->fullUrl(),
            'description' => 'This is really cool link',
            'image' => 'http://placehold.it/300x300?text=Cool+link'
        ]) </p>



                        <br>
                        <a href="{{ route('article.edit', $article->id) }}"
                           class="btn btn-primary">Modifier</a>


                        <form method="POST" action="{{ route('article.destroy', $article->id) }}">

                            {{ csrf_field() }}


                            <input type="hidden" name="_method" value="DELETE">

                            <input class="btn btn-danger"
                                   type="submit" value="Supprimer">
                        </form>
                    </ul>
                </div>
                <hr>
@endsection