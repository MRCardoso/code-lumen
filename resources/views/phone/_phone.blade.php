<div class="list-group-item text-right">
    <a href="{{ route('phone.create', ['person_id' => $person->id]) }}" class="btn btn-primary btn-xs"
       data-toggle="tooltip" data-placement="top" title="Criar telefone">
        Novo
        <i class="fa fa-plus"></i>
    </a>
</div>
<table class="table table-condensed table-hover table-bordered">
    @foreach($phones as $phone)
        <tr>
            <td>{{ $phone->maskNumber }}</td>
            <td>{{ $phone->description }}</td>
            <td>
                @include('partials._actionsTable', [
                    'module' => 'phone',
                    'data' => ['id' => $phone->id,'person_id'=>$person->id ]
                ])
            </td>
        </tr>
    @endforeach
</table>