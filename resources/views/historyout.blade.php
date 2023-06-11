<x-layout>
    <div class="container">
        <!-- table -->
        <div class="row">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>မှတ်တမ်း</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-striped align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>
                                        <form action="">
                                            <select class="form-select mx-0" style="width: 100px;" name="status" onchange='{ this.form.submit(); }'>
                                                <option value="" {{ $status == '' ? 'selected': '' }}>အားလုံး</option>
                                                <option value="topay" {{ $status == 'topay' ? 'selected': '' }}>ပေးရန်</option>
                                                <option value="toget" {{ $status == 'toget' ? 'selected': '' }}>ရရန်</option>
                                                <option value="paided" {{ $status == 'paided' ? 'selected': '' }}>ရှင်းပြီး</option>
                                            </select>
                                            <noscript><input type=”submit” value=”Submit”></noscript>
                                        </form>
                                    </th>
                                    <th class=" font-weight-bolder text-center">အချိန်</th>
                                    <th class=" font-weight-bolder text-center">ကားဆရာ</th>
                                    <th class=" font-weight-bolder text-center">ကားခစုစုပေါင်း</th>
                                    <th class=" font-weight-bolder text-center">စိုက်ငွေစုစုပေါင်း</th>
                                    <th class=" font-weight-bolder text-center">စုစုပေါင်း</th>
                                    <th class=" font-weight-bolder text-center">ပေးငွေ</th>
                                    <th class=" font-weight-bolder text-center">ကျန်ငွေ</th>
                                    <th class=" font-weight-bolder text-center"></th>
                                    <th class=" font-weight-bolder text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($histories as $key=> $histories_list)
                                <tr>
                                    <td class="font-weight-bold">{{$key}}</td>
                                </tr>
                                @foreach($histories_list as $key=> $d)
                                <tr>
                                    <td>
                                        <p class="text-xs text-center font-weight-bold  py-0 my-0">@if($d->balance == 0)<span class="px-3 py-2 rounded-pill bg-gradient-success">ရှင်းပြီး</span>@elseif($d->balance < 0)<span class="px-2 py-2 rounded-pill  bg-gradient-danger">ပေးရန်</span>@else<span class="px-2 py-2 rounded-pill  bg-gradient-warning">ရရန်</span>@endif</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-center font-weight-bold  py-0 my-0">{{$d->created_at->format('d-m-Y/ h:ia')}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-center font-weight-bold  py-0 my-0">{{$d->drivername}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-center font-weight-bold  py-0 my-0">{{$d->totalCarfare}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-center font-weight-bold  py-0 my-0">{{$d->totalInvested}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-center font-weight-bold  py-0 my-0">{{$d->totalCost}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-center font-weight-bold  py-0 my-0">{{$d->payment}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-center font-weight-bold  py-0 my-0 ">{{$d->balance}}</p>
                                    </td>
                                    <td class="text-xs text-center w-50 font-weight-bold  py-0 my-0">
                                        <a href="{{route('historyout.show',$d->id)}}" class="btn btn-outline-success p-2 mb-0">VIEW</a>
                                    </td>
                                    <td class="text-xs text-center w-50 font-weight-bold  py-0 my-0">
                                        @if($d->totalCost == 0 && $d->totalInvested ==0 )
                                        <a class="btn btn-outline-primary p-2 my-2" data-bs-toggle="modal" data-bs-target="#deletehistroy{{$d->id}}">DELETE</a>
                                        @endif
                                    </td>
                                    <x-deletehistroy :d="$d" />
                                </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>