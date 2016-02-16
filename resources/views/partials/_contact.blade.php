<div class="panel panel-{{ $person->sex == 'F' ? 'danger': 'info'}}">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-{{ $person->sex == 'F' ? 'female': 'male'}}"></i>
            {{ $person->nickname }}
            <div class="pull-right">
                @include('partials._actionsTable', [
                    'module' => 'person',
                    'data' => ['id' => $person->id]
                ])
            </div>
        </h3>
    </div>
    <div class="panel-body">
        <h4 class="breadcrumb">
            {{ $person->name }}
        </h4>
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active">
                    <a href="#phone-{{ $person->id }}" aria-controls="phone-{{ $person->id }}" role="tab" data-toggle="tab">
                        <i class="fa fa-phone"></i>
                        Telefone
                        <i class="badge">{{$person->phones()->count()}}</i>
                    </a>
                </li>
                <li role="presentation">
                    <a href="#email-{{ $person->id }}" aria-controls="email-{{ $person->id }}" role="tab" data-toggle="tab">
                        <i class="fa fa-envelope-o"></i>
                        E-mail
                        <i class="badge">{{$person->emails()->count()}}</i>
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="phone-{{ $person->id }}">
                    @include('phone._phone', ['phones' => $person->phones])
                </div>
                <div role="tabpanel" class="tab-pane" id="email-{{ $person->id }}">
                    @include('email._email', ['emails' => $person->emails])
                </div>
            </div>
        </div>
    </div>
</div>