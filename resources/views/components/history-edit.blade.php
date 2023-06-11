<!-- Modal -->
<div class="modal fade" id="historyedit{{$c->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
            </div>
            <form role="form" action="{{route('productout.update', $c->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-body">
                <div class="form-group">
    <input type="datetime-local" value="{{$c->created_at}}" class="form-control" id="created_at" name="created_at" >
</div>
                    <select class="form-select mb-3 " required name="driver_id">
                        @foreach($drivers as $d)
                        <option value="{{$d->id}}" {{ $c->driver->id == $d->id ? 'selected' : ''}}>{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline-secondary" data-bs-dismiss="modal">No</a>
                    <button type="submit" class="btn btn-outline-primary">Save Change</button>
                </div>
            </form>
        </div>
    </div>
</div>