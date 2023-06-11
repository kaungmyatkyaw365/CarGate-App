<!-- Modal -->
<div class="modal fade" aria-hidden="true" id="togetpaidedEdit{{$d->id}}" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Edit
                </h1>
                <form role="form" action="{{route('carhtut.destroy',$d->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
            <form role="form" action="{{route('carhtut.update',$d->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">ရက်စွဲ</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" value="{{$d->date}}" name="date">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">ကားဆရာ</label>
                        <div class="mb-3 d-flex">
                            <input class="form-control" value="{{$d->driver}}" name="driver">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">{{$city->name == 'လားရှိုး' ? 'ကားနံပါတ်':'အကြောင်းအရာ'}}</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" value="{{$d->about}}" name="about">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">သင့်ငွေ</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" value="{{$d->amount}}" name="amount">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline-secondary" data-bs-dismiss="modal">No</a>
                    <button type="submit" class="btn btn-outline-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>