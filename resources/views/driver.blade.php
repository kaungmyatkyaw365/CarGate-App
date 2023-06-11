<x-layout>
    <!-- table -->
    <div class="container">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <form class="form d-flex justify-content-between" action="{{route('driver.store')}}" method="POST">
                    @csrf
                    <x-input required="required" name="name" label="အမည်" />
                    <x-input required="required"  name="carno" label="ကားနံပါတ်" />
                    <x-input required="required"  name="phone" label="ဖုန်းနံပါတ်" />
                    <button type="submit" class="btn bg-gradient-info">Add</button>
                </form>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase font-weight-bolder h5">အမည်</th>
                                <th class="text-uppercase font-weight-bolder h5">ကားနံပါတ်</th>
                                <th class="text-center text-uppercase font-weight-bolder h5">ဖုန်းနံပါတ်</th>
                                <th class=" opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivers as $d)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0">{{$d->name}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class=" font-weight-bold mb-0">{{$d->carno}}</p>
                                </td>
                                <td class="align-middle text-center mb-0">
                                    <span>{{$d->phone}}</span>
                                </td>
                                <td class="mb-0 d-flex">
                                     @if($d->id != 1)
                                    <a href="" class="text-dark btn btn-warning  p-2 mx-2" data-bs-toggle="modal" data-bs-target="#driverModalEdit{{$d->id}}">ပြင်ရန်</a>
                                    <x-driver-model :c="$d" />
                                    <form action="{{route('driver.destroy', $d->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class=" text-dark btn p-2 btn-danger">ဖျက်ရန်</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- table -->
    <div class="container d-flex justify-content-around">
        <div class="card mb-4 ">
            <div class="text-center h4">ပစ္စည်းအမျိုးအစား</div>
            <div class="card-header pb-0">
                <form class="form d-flex justify-content-between" action="{{route('type.store')}}" method="POST">
                    @csrf
                    <x-input required="required" name="name" label="အမည်" />
                    <button type="submit" class="btn bg-gradient-info">Add</button>
                </form>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase font-weight-bolder h5">အမည်</th>
                                <th class=" opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($types as $d)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0">{{$d->name}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="mb-0 d-flex">
                                    @if($d->id != 1)
                                    <a href="" class="text-dark btn btn-warning  p-2 mx-2" data-bs-toggle="modal" data-bs-target="#typeModalEdit{{$d->id}}">ပြင်ရန်</a>
                                    <x-type-model :c="$d" />
                                    <form action="{{route('type.destroy', $d->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class=" text-dark btn p-2 btn-danger">ဖျက်ရန်</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-4 ">
            <div class="text-center h4">နေရာ</div>
            <div class="card-header pb-0">
                <form class="form d-flex justify-content-between" action="{{route('address.store')}}" method="POST">
                    @csrf
                    <x-input required="required" name="name" label="အမည်" />
                    <button type="submit" class="btn bg-gradient-info">Add</button>
                </form>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase font-weight-bolder h5">အမည်</th>
                                <th class=" opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($addresses as $d)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0">{{$d->name}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="mb-0 d-flex">
                                    <a href="" class="text-dark btn btn-warning  p-2 mx-2" data-bs-toggle="modal" data-bs-target="#addressModalEdit{{$d->id}}">ပြင်ရန်</a>
                                    <x-address-model :c="$d" />
                                    <form action="{{route('address.destroy', $d->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class=" text-dark btn p-2 btn-danger">ဖျက်ရန်</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>