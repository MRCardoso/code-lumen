@extends('templates.layout')

@section('header')
    <div class="content">
        <ul class="breadcrumb">
            <li><a href="{{ route('notebook.index') }}">Home</a></li>
            <li>Email</li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="content">
        @if( isset($email) )
        <h2 class="breadcrumb text-center">(Email) {{ $email->person->name }}</h2>
        <form action="{{ route('email.update', ['id' => $email->id, 'person_id' => $email->person->id]) }}" class="form-horizontal" method="post">
            <input type="hidden" name="_method" value="PUT">
        @else
        <h2 class="breadcrumb text-center">(Email) {{ $person->name }}</h2>
        <form action="{{ route('email.store',['person_id' => $person->id]) }}" class="form-horizontal" method="post">
        @endif
            @include('partials._errors')
            <div class="form-group">
                <label class="control-label col-md-3">
                    Status
                </label>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="status" value="0" {{ (isset($email) ? $email->status : old('status') )  == '0' ? 'checked': '' }}>Inativo
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" value="1" {{ (isset($email) ? $email->status : old('status') )  == '1' ? 'checked': '' }}>Ativo
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Tipo</label>
                <div class="col-md-6">
                    <select name="type" class="form-control">
                        <option value="">Select</option>
                        @foreach(['personal', 'commercial'] as $type)
                            <option value="{{ $type }}" {{ (isset($email) ?$email->type :old('type')) == $type ? 'selected': '' }}>{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">E-mail</label>
                <div class="col-md-6">
                    <input type="text" name="email" value="{{ isset($email) ? $email->email : old('email') }}" class="form-control" placeholder="E-mail">
                </div>
            </div>
            @include('partials._actions')
        </form>
    </div>
@endsection