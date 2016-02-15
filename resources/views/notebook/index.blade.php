@extends('templates.layout')

@section('header')
    <div class="col-lg-12">
        <div class="btn-row">
            @foreach($letters as $letter)
                <a href="{{ route('notebook.letter', ['letter' => $letter]) }}" data-id="{{$letter}}" class="storage-letter btn btn-primary btn-xs">
                    {{ $letter }}
                </a>
            @endforeach
            <div class="pull-right">
                <a href="{{ route('person.create') }}" class="btn btn-primary">New Contact</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @foreach($persons as $k=>$person)
        <div class="col-md-6">
            @include('partials._contact')
        </div>
        @if ( ($k%2) == 1 )<div class="row"></div> @endif
    @endforeach
@endsection



