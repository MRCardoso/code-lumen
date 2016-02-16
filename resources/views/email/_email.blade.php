<div class="list-group-item text-right">
    <a href="{{ route('email.create', ['person_id' => $person->id]) }}" class="btn btn-primary btn-xs"
       data-toggle="tooltip" data-placement="top" title="criar E-mail">
        Novo
        <i class="fa fa-plus"></i>
    </a>
</div>
<table class="table table-condensed table-hover table-bordered">
    @foreach($emails as $email)
        <tr>
            <td>{{ $email->email }}</td>
            <td>{{ $email->type }}</td>
            <td>
                <span class="label label-{{ $email->status ==1?'success':'danger'}}">
                    <i class="fa fa-{{ $email->status ==1?'check':'stop'}}-circle-o"></i>
                    {{ $email->status == 1 ? 'Ativo' : 'Inativo' }}
                </span>
            </td>
            <td>
                @include('partials._actionsTable', [
                    'module' => 'email',
                    'data' => ['id' => $email->id,'person_id'=>$person->id ]
                ])
            </td>
        </tr>
    @endforeach
</table>