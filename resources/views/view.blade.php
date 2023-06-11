<x-layout :title="$data->created_at->format('Y-m-d').' '.$data->drivername">
    <!-- table -->
    <div  class="row mx-1" id="printjs">
        <img class="block logoimg" style="height: 100px;margin-bottom:10px" src="../assets/img/loinankhome.jpg" alt="" srcset="">
        <div class="" style="width:90%">
            <div class="card-body px-0 pt-0">
                <div class=" p-0">
                    <table style="width:100%" class="table align-items-center my-0 py-3" id="posts-table">
                        <thead>
                            <tr class="my-0 py-0">
                                <th style="width:2%" class="text-center my-0 py-0 mx-0 px-0 ">စဥ်</th>
                                <th style="width:20%" class="text-center my-0 py-0 mx-0 px-0 font-weight-bolder">အကြောင်းအရာ</th>
                                <th style="width:10%" class="text-center my-0 py-0 mx-0 px-0 font-weight-bolder">လိပ်စာ</th>
                                <th style="width:10%" class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0">ဖုန်းနံပါတ်</th>
                                <th style="width:10%" class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0">အမျိုးအစား</th>
                                <th style="width:10%" class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0">ဦးရေ</th>
                                <th style="width:10%" class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0">စိုက်ငွေ</th>
                                <th style="width:13%" class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0">ကားခ</th>
                                <th style="width:15%" class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0">မှတ်ချက်</th>
                                <th  class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0 noprint"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalCar = 0;
                            $totalSite = 0;
                            $limit = 0;
                            @endphp
                            @foreach($products as $key=> $d)
                            @php
                            $limit += 1;
                            $totalCar += (int)$d->carfare ;
                            $totalSite += (int)$d->invested ;
                            @endphp
                            <tr class="my-0 py-0">
                                <td class="text-center text-xs my-0 py-0">{{++$key}}</td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                    <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->customer}}</p>
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                    <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$d->address->name}}</p>

                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                    <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->phone}}</p>
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                    <p class="text-xs text-center font-weight-bold my-0 py-0"> @foreach($types as $c)
                               {{ $d->type_id == $c->id ? $c->name : ''}}
                                @endforeach</p>
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                    <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->quantity}}</p>
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                    <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->invested}}</p>
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                    <p class="text-xs text-center font-weight-bold my-0 py-0 {{ $d->is_paided == 1 ? 'text-decoration-line-through' : ''}} ">{{$d->carfare}}</p>
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                    <p class="text-xs text-center font-weight-bold my-0 py-0">{{ $d->is_paided == 1 ? 'ရှင်း' : 'တောင်း'}},{{$d->remark}}</p>
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0 noprint">
                                    <p class="text-xs text-center font-weight-bold my-0 py-0 noprint">
                                        <a class="btn btn-outline-primary py-1 my-0" data-bs-toggle="modal" data-bs-target="#remove{{$d->id}}">remove</a>
                                    </p>
                                </td>
                                <x-remove :d="$d" :data="$data" />
                            </tr>
                            @endforeach
                            <tr class="my-0 py-0">
                                <td class="text-center text-xs my-0 py-0"></td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                    <p class="text-xs text-center font-weight-bold my-0 py-0">ကားခ စုစုပေါင်း</p>
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                    <p class="text-xs text-center font-weight-bold my-0 py-0 ">{{$totalCar}}</p>
                                </td>
                                <td class=" my-0 py-0 mx-0 px-0">
                                </td>
                            </tr>
                                <div class="d-flex mx-2 my-0 py-0 justify-content-between">
                                    <h6  style="width:300px" >ကားဆရာ : {{ $data->driver->name}}</h6>
                                    <h6 style="width:300px" class="mx-3">ကားနံပါတ် : {{ $data->driver->carno}}</h6>
                                </div>
                            <div class="d-flex mx-2 y-0 py-0 justify-content-between">
                                <h6>ရက်စွဲ : {{ $data->created_at->format('d-m-Y/ h:ia')}}</h6>
                                <a class="noprint btn  btn-outline-danger" data-bs-toggle="modal" data-bs-target="#historyedit{{$data->id}}">edit</a>
                            </div>
                        </tbody>
                    </table>  
                    <x-history-edit :c="$data" :drivers="$drivers" />
                    
    <form style="page-break-before: always;" action="{{route('historyout.update',$data->id)}}" method="POST">
                        @method('patch')
                        @csrf
    <div class="text-end">
    <div class="noprint container ">
        <a href="{{route('historyoutadd.show',$data->id)}}" class="btn  bg-gradient-success ">+</a>
    </div>
    </div>
                        <div  class="d-flex" style="border-bottom:1px solid ">
                        <p  style="width:270px" class="text-xs my-0 py-1" >ပင်လုံ - ရာခိုင်နှုန်း : <input name="pinlonpercent" style="width: 100px;text-align:right;border:none" value="{{$data->pinlonpercent ? $data->pinlonpercent : 0}}" type="text"></p>
                        <p  style="width:270px" class="text-xs my-0 py-1 mx-3" >လွိုင်လင် - ရာခိုင်နှုန်း : <input name="loilempercent" style="width: 100px;text-align:right;border:none" value="{{$data->loilempercent ? $data->loilempercent : 0}}" type="text"></p>
                        </div>
                        <div  class="mx-5 mt-2 d-flex justify-content-between">
                            <div class="text-end">
                                <p  style="width:270px" class="text-xs my-0 py-2">စိုက်​ငွေစုစုပေါင်း : <input name="totalInvested" onkeyup="change()" readonly="true" id="totalSite" style="width: 100px;text-align:right;border:none" value="{{$totalSite}}" type="text"></p>
                                <p  style="width:270px" class="text-xs my-0 py-2">ရာခိုင်နှုန်း : <input name="percent" onkeyup="change()" id="percent" style="width: 100px;text-align:right;border:none" text-align:right; value="{{$data->percent}}" type="text"></p>
                                <p  style="width:270px" class="text-xs my-0 py-2">လုပ်အားခ : <input name="workCost" onkeyup="change()" id="workcost" style="width: 100px;text-align:right;border:none" value="{{$data->workCost}}" type="text"></p>
                                <p  style="width:270px" class="text-xs my-0 py-2">အာမခံကြေး : <input name="insurance" onkeyup="change()"  id="insurance" style="width: 100px;text-align:right;border:none" value="{{$data->insurance}}" type="text"></p>
                            </div>
                            <div class="text-end">
                                <p  style="width:270px" class="text-xs my-0 py-2">ရရန် စုစုပေါင်း : <input name="totalCarfare" readonly="true" id="totalget" style="width: 100px; text-align:right;border:none" value="{{$data->insurance + $totalSite + $data->percent + $data->workCost}}" type="text"></p>
                                <p  style="width:270px" class="text-xs my-0 py-2">ငွေရှင်းပြီး :
                                    <input id="paidedValue" type="text" value="{{$paided}}" style="width: 100px;text-align:right;border:none" readonly="true">
                                </p>
                                <p  style="width:270px" class="text-xs my-0 py-2">စုစုပေါင်း :
                                    <input id="total1" type="text" value="{{$data->totalCost}}" style="width: 100px;text-align:right;border:none" readonly="true">
                                </p>
                            </div>
                            <div class="text-end">
                                <p  style="width:270px" class="text-xs my-0 py-2">စုစုပေါင်း :
                                    <input name="totalCost" id="total" type="text" value="{{$data->totalCost}}" style="width: 100px;text-align:right;border:none" readonly="true">
                                </p>
                                <p  style="width:270px" class="text-xs my-0 py-2">ပေးငွေ : <input name="payment" onkeyup="changepay()" id="payment" style="width: 100px;text-align:right;border:none" value="{{$data->payment}}" type="text"></p>
                                <p  style="width:270px" class="text-xs my-0 py-2">{{$data->balance < 0 ? 'ပေးရန်':'ကျန်ငွေ'}} :
                                    <input name="balance" id="balance" type="text" value="{{$data->balance}}" style="width: 100px;text-align:right;border:none" readonly="true">
                                </p>
                            </div>
                            <input type="hidden" name="driver_id" value="{{$data->driver_id}}">
                            @foreach($productsIds as $productId)

                            <input type="hidden" name="productsIds[]" value="{{ $productId }}">

                            @endforeach

                        </div>
                        <div  class="text-end my-0 py-0">မှတ်ချက်။ ။ ပစ္စည်းများ ရေစို၊ပေါက်ပြဲ၊ပျက်စီးပါက ပစ္စည်းတန်ဖိုးအတိုင်းပေးလျှော်ရမည်။</div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end my-3">
    <div style="width:80%" class="noprint container ">
            <button type="submit" class="btn  bg-gradient-warning w-10 ">Update</button>
            </form>
            <button id="printButton" class="btn  bg-gradient-info w-10 ">print</button>
    </div>
    </div>
</x-layout>