<div class="text-right">
    <a href="{{ route("{$module}.edit", $data) }}"
       class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Editar registro">
        <i class="fa fa-pencil"></i>
    </a>
    <a href="#" class="remove-link btn btn-danger btn-xs"
       data-url="{{ route("{$module}.destroy", $data) }}" data-toggle="modal" data-target=".modal-remove">
        <i class="fa fa-remove" data-toggle="tooltip" data-placement="top" title="Remover registro"></i>
    </a>
</div>