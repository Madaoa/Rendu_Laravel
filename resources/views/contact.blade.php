@extends('layouts.app')
@section('content')
    <h1>Contact TODOParrot</h1>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Publier un article</div>

                    <div class="panel-body">
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
            </div>

        </div>
    </div>
    @endsection