<!-- Modal from message delete confirmation-->
<div class="modal fade modal-remove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form method="post" id="form-delete">
            <input type="hidden" name="_method" value="delete">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete a record</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        Do you want really remove this record?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger">Remove</button>
                </div>
            </div>
        </form>
    </div>
</div>