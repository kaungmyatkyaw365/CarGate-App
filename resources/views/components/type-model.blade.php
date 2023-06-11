<!-- Modal -->
<div class="modal fade" id="typeModalEdit{{$c->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" action="{{route('type.update', $c->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">ရေတွက်ပုံ</label>
                        <div class="mb-3 d-flex">
                            <input value="{{$c->name}}" required class="form-control" name="name">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-outline-primary">Save Change</button>
                </div>
            </form>
        </div>
    </div>
</div>