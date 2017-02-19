@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">


                    <div class="block">
                        <h2 class="content-heading">You are logged in!</h2>

                        @if(Auth::check())
                            <h3>Bonjour {{ Auth::user()->name }}</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
