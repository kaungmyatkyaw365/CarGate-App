<!-- Modal -->
<div class="modal fade" id="exampleModalEdit{{$c->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                
                <form role="form" action="{{route('product.destroy',$c->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
            <form role="form" action="{{route('product.update', $c->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-body">
                <div class="form-group">
    <input type="datetime-local" step="1" value="{{$c->created_at}}" class="form-control" id="created_at" name="created_at" >
</div>
                    <select class="form-select mb-3 " required name="driver_id">
                        @foreach($drivers as $d)
                        <option value="{{$d->id}}" {{ $c->driver->id == $d->id ? 'selected' : ''}}>{{$d->name}}</option>
                        @endforeach
                    </select>
                    <x-input default="{{$c->customer}}" required="required" label="အမည်" placeHolder="Enter name" name="customer" />
                    <x-input default="{{$c->phone}}" required="required" label="ဖုန်းနံပါတ်" placeHolder="Enter phone number" name="phone" />
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">အရေတွက်</label>
                        <div class="mb-3 d-flex">
                            <input value="{{$c->quantity}}" required class="form-control" name="quantity" placeholder="Enter amount">
                            <select class="form-select " required name="type_id">
                                @foreach($types as $d)
                                <option value="{{$d->id}}" {{ $c->type_id == $d->id ? 'selected' : ''}}>{{$d->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">ကားခ</label>
                        <div class="mb-3 d-flex">
                            <input type="number" value="{{$c->carfare}}" required class="form-control" name="carfare" placeholder="Enter amount">
                            <select class="form-select " required name="is_paided">
                                <option value="0">မရှင်း</option>
                                <option {{ $c->is_paided == 1 ? 'selected' : ''}} value="1">ရှင်းပြီး </option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">စိုက်ငွေ</label>
                        <div class="mb-3 d-flex">
                            <input type="number" class="form-control" value="{{$c->invested}}" name="invested" placeholder="Enter amount">
                            <select class="form-select " required name="address_id">
                                @foreach($addresses as $d)
                                <option {{ $c->address->id == $d->id ? 'selected' : ''}} value="{{$d->id}}">{{$d->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <textarea class="form-control" name="remark" placeholder="မှတ်ချက်">{{$c->remark}}</textarea>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline-secondary" data-bs-dismiss="modal">No</a>
                    <button type="submit" class="btn btn-outline-primary">Save Change</button>
                </div>
            </form>
        </div>
    </div>
</div>