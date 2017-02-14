@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('messages.errors')

                <div class="panel panel-default">
                    <div class="panel-heading">Modifier un commentaire</div>

                    <div class="panel-body">
                        <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="PUT">


                            <div class="form-group">
                                <textarea name="content" placeholder="Votre contenu"
                                          class="form-control">{{ $comment->content }}</textarea>
                            </div>

                            <input type="submit" value="Publier" class="btn btn-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection