@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('messages.errors')

                <div class="panel panel-default">
                    <div class="panel-heading">Publier un article</div>

                    <div class="panel-body">
                        {!! Form::open(['action'=>'ArticleController@store', 'files'=>true]) !!}
                            {{ csrf_field() }}


                            <div class="form-group">
                                {!! Form::label('title', 'Title:') !!}
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('content', 'Contenu:') !!}
                                {!! Form::textarea('content', null, ['class'=>'form-control', 'rows'=>5] ) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('image', 'Choose an image') !!}
                                {!! Form::file('image') !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Save', array( 'class'=>'btn btn-danger form-control' )) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection