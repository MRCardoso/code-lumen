@extends('templates.layout')

@section('header')
    <div class="content">
        <ul class="breadcrumb">
            <li><a href="{{ route('notebook.index') }}">Home</a></li>
            <li>Contato</li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="content">
        @if( isset($person) )
        <form action="{{ route('person.update', ['id' => $person->id]) }}" class="form-horizontal" method="post">
            <input type="hidden" name="_method" value="PUT">
        @else
        <form action="{{ route('person.store') }}" class="form-horizontal" method="post">
        @endif
            @include('partials._errors')
            <div class="form-group {{ $errors->has('sex') ? 'has-error' : '' }}">
                <label class="control-label col-md-3">
                    Sexo
                </label>
                <div class="col-md-6">
                    <div class="radio-inline">
                        <input type="radio" name="sex" value="F" {{ (isset($person) ? $person->sex : old('sex') )  == 'F' ? 'checked': '' }}><i class="fa fa-female"></i>
                    </div>
                    <div class="radio-inline">
                        <input type="radio" name="sex" value="M" {{ (isset($person) ? $person->sex : old('sex') ) == 'M' ? 'checked': '' }}><i class="fa fa-male"></i>
                    </div>
                </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label class="control-label col-md-3">Nome</label>
                <div class="col-md-6">
                    <input type="text" name="name" value="{{ isset($person) ? $person->name : old('name') }}" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="form-group {{ $errors->has('nickname') ? 'has-error' : '' }}">
                <label class="control-label col-md-3">Apelido</label>
                <div class="col-md-6">
                    <input type="text" name="nickname" value="{{ isset($person) ? $person->nickname : old('nickname') }}" class="form-control" placeholder="Apelido">
                </div>
            </div>
            @include('partials._actions')
        </form>
    </div>
@endsection