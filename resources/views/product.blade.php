<x-layout>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <!-- table -->
                        <div class="col-md-9">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between">
                                    <div class="card-header pb-0">
                                        <h6>ကုန်ပစ္စည်းများ</h6>
                                    </div>
                                    <form action="" style="margin-right: 10px;" class="d-flex">
                                        <input name="date" class="date mt-4 form-control" style="width: 150px;" type="date">
                                        <select class="form-select mt-4" style="width: 150px;" name="driver_id">
                                            <option value="">ကားဆရာ</option>
                                            @foreach($drivers as $d)
                                            <option value="{{$d->id}}">{{$d->name}}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-select mt-4" style="width: 150px;" name="address_id">
                                            <option value="">လိပ်စာ</option>
                                            @foreach($addresses as $d)
                                            <option value="{{$d->id}}">{{$d->name}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn  mb-0 mt-4 bg-gradient-info">ရှာမည်</button>
                                    </form>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 10px;">စဥ်</th>
                                                    <th class="text-center font-weight-bolder">အမည်</th>
                                                    <th class=" font-weight-bolder text-center">ဖုန်းနံပါတ်</th>
                                                    <th class=" font-weight-bolder text-center">အရေအတွက်</th>
                                                    <th class=" font-weight-bolder text-center">ကားခ</th>
                                                    <th class=" font-weight-bolder text-center">စိုက်ငွေ</th>
                                                    <th class=" font-weight-bolder text-center">မှတ်ချက်</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $key=> $d)
                                                <tr>
                                                    <td class="text-center" style="width: 10px;">{{++$key}}</td>
                                                    <td>
                                                        <div class="text-center d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <p class="mb-0 font-weight-bold  text-xs">{{$d->customer}}({{$d->address->name}})</p>
                                                                <p class="text-xxs mb-0">{{$d->driver->name}}, {{$d->driver->carno}}///{{$d->created_at->format('d-m-Y/ h:ia')}}</p>
                                                                @if(isset($d->outdriver_id))
                                                                <p class="text-xxs mb-0">
                                                                    @foreach($drivers as $p)
                                                                    @if($p->id == $d->outdriver_id)
                                                                    {{$p->name}}, {{$p->carno}}/
                                                                    @endif
                                                                    @endforeach//{{$d->outtime}}
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs text-center font-weight-bold mb-0">{{$d->phone}}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs text-center font-weight-bold mb-0">{{$d->quantity}} @foreach($types as $c)
                               {{ $d->type_id == $c->id ? $c->name : ''}}
                                @endforeach</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs text-center font-weight-bold mb-0 {{ $d->is_paided == 1 ? 'text-decoration-line-through' : ''}} ">{{$d->carfare}}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs text-center font-weight-bold mb-0">{{$d->invested}}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs text-center font-weight-bold mb-0">{{ $d->is_paided == 1 ? 'ရှင်း' : 'တောင်း'}}
                                                        <p><p class="text-xs text-center font-weight-bold mb-0">{{$d->remark}}
                                                        <p>
                                                    </td>
                                                    <td class="text-xs text-center w-50 font-weight-bold mb-0">
                                                        <a href="" class="btn btn-outline-primary p-2" data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$d->id}}">EDIT</a>
                                                        <x-model-edit :c="$d" :drivers="$drivers" :addresses="$addresses" :types="$types" />

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$products->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Form -->
                        <div class="col-md-3 noprint d-flex flex-column mx-0">
                            <div class="card">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <div style="font-size: 19px;" class="font-weight-bolder text-info text-center text-gradient">ကုန်ပစ္စည်းထည့်သွင်းခြင်း</div>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{route('product.store')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
    <input type="datetime-local" step="1" class="form-control" id="created_at" name="created_at" >
</div>

                                        <select class="form-select mb-3 " required name="driver_id">
                                            @foreach($drivers as $d)
                                            <option value="{{$d->id}}" {{ session( 'driver_id' ) == $d->id ? 'selected': '' }}>{{$d->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input required="required autofocus" label="အမည်" placeHolder="Enter name" name="customer" />
                                        <x-input required="required" label="ဖုန်းနံပါတ်" placeHolder="Enter phone number" name="phone" />
                                        <div class="d-flex ">
                                            <label style="font-size: 15px;" class="col-md-3">အရေတွက်</label>
                                            <div class="mb-3 d-flex">
                                                <input required class="form-control" name="quantity" value='1' placeholder="Enter amount">
                                                <select class="form-select " required name="type_id">
                                                    @foreach($types as $d)
                                                    <option value="{{$d->id}}">{{$d->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex ">
                                            <label style="font-size: 15px;" class="col-md-3">ကားခ</label>
                                            <div class="mb-3 d-flex">
                                                <input type="number" required type="integer" class="form-control" name="carfare" placeholder="Enter amount">
                                                <select class="form-select " required name="is_paided">
                                                    <option value="0">တောင်း</option>
                                                    <option value="1">ရှင်းပြီး</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex ">
                                            <label style="font-size: 15px;" class="col-md-3">စိုက်ငွေ</label>
                                            <div class="mb-3 d-flex">
                                                <input type="number" class="form-control" value="0" type="integer" name="invested" placeholder="Enter amount">
                                                <select class="form-select " required name="address_id">
                                                    @foreach($addresses as $d)
                                                    <option {{ session( 'address_id' ) == $d->id ? 'selected': '' }} value="{{$d->id}}">{{$d->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <textarea class="form-control" name="remark" placeholder="မှတ်ချက်"></textarea>
                                        <input type="hidden" name="inGate" value="1">
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>
<x-js>
document.addEventListener('DOMContentLoaded', function() {
    var created_at = document.getElementById('created_at');
    if (created_at) {
        created_at.addEventListener('click', function() {
            var now = new Date();
            var year = now.getFullYear();
            var month = now.getMonth() + 1;
            var day = now.getDate();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var formattedDate = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
            created_at.value = formattedDate;
        });
    }
});

</x-js>