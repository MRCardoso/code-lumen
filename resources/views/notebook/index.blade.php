@extends('templates.layout')
@section('content')
    @foreach($persons as $person)
        <div class="col-md-6">
            @include('partials._contact')
        </div>
    @endforeach
@endsection



