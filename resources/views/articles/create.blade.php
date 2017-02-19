@extends('layouts.app')

@section('content')
    <div class="container">
        @include('messages.errors')
        <h2 class="content-heading">Publier un article</h2>
        <div id="form_insc">
            {!! Form::open(['action'=>'ArticleController@store', 'files'=>true]) !!}
            {{ csrf_field() }}


            <div class="form-group">
                {!! Form::label('title', 'Titre:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('content', 'Contenu:') !!}
                {!! Form::textarea('content', null, ['class'=>'form-control', 'rows'=>5] ) !!}
            </div>


            <div class="form-group">
                {!! Form::label('image', 'Image de l\'article') !!}
                {!! Form::file('image') !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Publier', array( 'class'=>'btn btn-danger form-control' )) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>






@endsection