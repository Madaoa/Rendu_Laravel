@extends('layouts.app')
@section('content')


    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="container">
        @include('messages.errors')
        <h2 class="content-heading">Nous contacter </h2>
        <div id="form_insc">
                        {!! Form::open(['action'=>'AboutController@store', 'files'=>true]) !!}

                        <div class="form-group">
                            {!! Form::label('Votre pseudo') !!}
                            {!! Form::text('name', null,
                                array('required',
                                      'class'=>'form-control',
                                      'placeholder'=>'Votre nom')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Votre email') !!}
                            {!! Form::text('email', null,
                                array('required',
                                      'class'=>'form-control',
                                      'placeholder'=>'Votre adresse email')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Votre Message') !!}
                            {!! Form::textarea('content', null,
                                array('required',
                                      'class'=>'form-control',
                                      'placeholder'=>'Votre message')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Envoyer ',
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

    @endsection