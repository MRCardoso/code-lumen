@extends('templates.layout')

@section('header')
    <div class="content">
        <ul class="breadcrumb">
            <li><a href="{{ route('notebook.index') }}">Home</a></li>
            <li>Phone</li>
        </ul>
    </div>
@endsection


@section('content')
    <div class="content">
        @if( isset($phone) )
        <h2 class="breadcrumb text-center">(Phone) {{ $phone->person->name }}</h2>
        <form action="{{ route('phone.update', ['id' => $phone->id, 'person_id' => $phone->person->id]) }}" class="form-horizontal" method="post">
            <input type="hidden" name="_method" value="PUT">
        @else
        <h2 class="breadcrumb text-center">(Phone) {{ $person->name }}</h2>
        <form action="{{ route('phone.store',['person_id' => $person->id]) }}" class="form-horizontal" method="post">
        @endif
            @include('partials._errors')
            <div class="form-group">
                <label class="control-label col-md-3">Descrição</label>
                <div class="col-md-6">
                    <select name="description" class="form-control">
                        <option value="">Select</option>
                        @foreach(['residencial', 'comercial', 'celular', 'recado'] as $type)
                            <option value="{{ $type }}" {{ (isset($phone) ?$phone->description :old('description')) == $type ? 'selected': '' }}>{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Country Code</label>
                <div class="col-md-6">
                    <input type="text" name="country_code" value="{{ isset($phone) ? $phone->country_code : old('country_code') }}" class="form-control" placeholder="Country code">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Number</label>
                <div class="col-md-6">
                    <input type="text" name="number" value="{{ isset($phone) ? $phone->number : old('number') }}" class="form-control" placeholder="Number">
                </div>
            </div>
            @include('partials._actions')
        </form>
    </div>
@endsection