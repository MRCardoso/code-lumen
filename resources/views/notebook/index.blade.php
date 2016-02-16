@extends('templates.layout')

@section('header')
    <div class="col-lg-12">
        @if( app('session')->has('success') )
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session('success') }}
            {{ session()->forget('success') }}
        </div>
        @endif
        @if( app('session')->has('error') )
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session('error') }}
            {{ session()->forget('error') }}
        </div>
        @endif
        <div class="btn-row">
            @foreach($letters as $letter)
                <a href="{{ route('notebook.letter', ['letter' => $letter]) }}" data-id="{{$letter}}" class="storage-letter btn btn-primary btn-xs">
                    {{ $letter }}
                </a>
            @endforeach
            <div class="pull-right">
                <a href="{{ route('person.create') }}" class="btn btn-primary"
                   data-toggle="tooltip" data-placement="top" title="Criar contato">
                    Novo
                    <i class="fa fa-plus"></i>
                </a>
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



