<div class="panel panel-{{ $person->sex == 'F' ? 'danger': 'info'}}">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-{{ $person->sex == 'F' ? 'female': 'male'}}"></i>
            {{ $person->nickname }}
            <div class="pull-right">
                <a href="{{ route('person.edit', ['id' => $person->id]) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit the person(not implement!)">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="#" class="remove-link btn btn-danger btn-xs"
                   data-url="{{ route('person.destroy', ['id' => $person->id]) }}" data-toggle="modal" data-target=".modal-remove">
                    <i class="fa fa-remove" data-toggle="tooltip" data-placement="top" title="Remove the person"></i>
                </a>
            </div>
        </h3>
    </div>
    <div class="panel-body">
        <h4> {{ $person->name }}</h4>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Phones</strong>
                <div class="btn-row pull-right">
                    <a href="{{ route('phone.create', ['person_id' => $person->id]) }}" class="btn btn-primary btn-xs">New Phone</a>
                </div>
            </div>
            <table class="table table-condensed table-hover table-bordered">
                @foreach($person->phones as $phone)
                    <tr>
                        <td>{{ $phone->description }}</td>
                        <td>{{ $phone->maskNumber }}</td>
                        <td>
                            <a href="{{ route('phone.edit', ['id' => $phone->id,'person_id'=>$person->id ]) }}" class="label label-primary" data-toggle="tooltip" data-placement="top" title="Edit the Phone">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="remove-link label label-danger" data-url="{{ route('phone.destroy', ['id' => $phone->id, 'person_id' => $person->id]) }}" data-toggle="modal" data-target=".modal-remove">
                                <i class="fa fa-remove" data-toggle="tooltip" data-placement="top" title="Remove the phone"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>