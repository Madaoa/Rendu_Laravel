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
                            {!! Form::label('Your Name') !!}
                            {!! Form::text('name', null,
                                array('required',
                                      'class'=>'form-control',
                                      'placeholder'=>'Your name')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Your E-mail Address') !!}
                            {!! Form::text('email', null,
                                array('required',
                                      'class'=>'form-control',
                                      'placeholder'=>'Your e-mail address')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Your Message') !!}
                            {!! Form::textarea('content', null,
                                array('required',
                                      'class'=>'form-control',
                                      'placeholder'=>'Your message')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Contact Us!',
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

    @endsection