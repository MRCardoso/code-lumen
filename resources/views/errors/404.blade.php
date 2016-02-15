@extends('templates.layout')
@section('content')
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
        }
    </style>
    <div class="content-large alert-warning" style="margin-top: 5%">
        <header>
            <h1>404</h1>
            <h3>Page not found!</h3>
        </header>
        <article>
            <img src="http://www.gravatar.com/avatar/{{ md5('marlonrcardoso@yahoo.com.br') }}" />
        </article>
    </div>
@endsection