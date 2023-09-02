<div class="row">
    <a href="{{ $edit }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
    @if ($delete != "del")
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{ $id }}">
        <i class="fa fa-trash"></i>
    </button>
    <div class="modal fade" id="delete_{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="delete_{{ $id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف العنصر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                هل تريد حذف هذا العنصر ؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{$delete}}" class="btn btn-danger">delete <i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if ($view != "yes")
    <a href="{{$view}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
    @endif
</div>
