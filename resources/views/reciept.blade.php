<x-layout :title=" date('Y-m-d ').$driver->name">
    <form action="{{route('historyout.store')}}" name="reciept_form" method="POST">
        @csrf
        <!-- table -->
        <div class="row mx-1">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="posts-table">
                            <thead>
                                <tr class="my-0 py-0">
                                    <th style="width: 10px;" class="text-center my-0 py-0 mx-0 px-0  ">စဥ်</th>
                                    <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">အကြောင်းအရာ</th>
                                    <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">လိပ်စာ</th>
                                    <th class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0 ">ဖုန်းနံပါတ်</th>
                                    <th class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0 ">အမျိုးအစား</th>
                                    <th class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0 ">ဦးရေ</th>
                                    <th class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0 ">စိုက်ငွေ</th>
                                    <th class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0 ">ကားခ</th>
                                    <th class=" font-weight-bolder text-center my-0 py-0 mx-0 px-0 ">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalCar = 0;
                                $totalSite = 0;
                                @endphp
                                @foreach($products as $key=> $d)
                                @php
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
                                        <p class="text-xs text-center font-weight-bold my-0 py-0">@foreach($types as $c)
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
                                </tr>
                                @endforeach
                                <tr></tr>
                                <tr></tr>
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
                                        <p class="text-xs text-center font-weight-bold my-0 py-0">{{$totalCar}}</p>
                                    </td>
                                    <td class=" my-0 py-0 mx-0 px-0">
                                    </td>
                                </tr>
                                <div class="d-flex mx-2 mt-3 justify-content-between ">
                                    <div class="d-flex">
                                        <h6>ကားဆရာ : {{$driver->name}}</h6>
                                        <h6 class="mx-3">ကားနံပါတ် : {{$driver->carno}}</h6>
                                    </div>
                                    <h6>ရက်စွဲ : {{ date('Y-m-d ') }}</h6>
                                </div>
                            </tbody>
                        </table>
                        <div class="mx-5 mt-2 d-flex justify-content-between">
                            <div class="text-end">
                                <p class="text-xs my-0 py-0">စိုက်ငွေစုစုပေါင်း : <input name="totalInvested" onkeyup="change()" readonly="true" id="totalSite" style="width: 70px;text-align:right;border:none" value="{{$totalSite}}" type="text"></p>
                                <p class="text-xs my-0 py-0" my-0 py-0>ရာခိုင်နှုန်း : <input name="percent" onkeyup="change()" id="percent" style="width: 70px;text-align:right;border:none" text-align:right; value="{{$totalCar*0.1}}" type="text"></p>
                                <p class="text-xs my-0 py-0">လုပ်အားခ : <input name="workCost" onkeyup="change()" id="workcost" style="width: 70px;text-align:right;border:none" value="{{
                                10000
                            }}" type="text"></p>
                            <p class="text-xs my-0 py-0">အာမခံကြေး : <input name="insurance" onkeyup="change()" readonly="true" id="insurance" style="width: 70px;text-align:right;border:none" value="{{$insurance + 300}}" type="text"></p>
                            </div>
                            <div class="text-end">
                                <p class="text-xs my-0 py-0">ရရန် စုစုပေါင်း : <input name="totalCarfare" readonly="true" id="totalget" style="width: 70px; text-align:right;border:none" value="{{($insurance +300 + $totalSite + $totalCar*0.1 + 10000)}}" type="text"></p>
                                <p class="text-xs my-0 py-0">ငွေရှင်းပြီး :
                                    <input id="paidedValue" type="text" value="{{$paided}}" style="width: 70px;text-align:right;border:none" readonly="true">
                                </p>
                                <p class="text-xs my-0 py-0">စုစုပေါင်း :
                                    <input id="total1" type="text" value="{{($insurance+ 300 + $totalSite + $totalCar*0.1 + 10000) - $paided}}" style="width: 70px;text-align:right;border:none" readonly="true">
                                </p>
                            </div>
                            <div class="text-end">
                                <p class="text-xs my-0 py-0">စုစုပေါင်း :
                                    <input name="totalCost" id="total" type="text" value="{{($insurance +300 + $totalSite + $totalCar*0.1 + 10000) - $paided}}" style="width: 70px;text-align:right;border:none" readonly="true">
                                </p>
                                <p class="text-xs my-0 py-0">ပေးငွေ : <input name="payment" onkeyup="changepay()" id="payment" style="width: 70px;text-align:right;border:none" value="0" type="text"></p>
                                <p class="text-xs my-0 py-0">ကျန်ငွေ :
                                    <input name="balance" id="balance" type="text" value="{{($insurance +300 + $totalSite + $totalCar*0.1 + 10000) - $paided}}" style="width: 70px;text-align:right;border:none" readonly="true">
                                </p>
                            </div>
                            <input type="hidden" name="driver_id" value="{{$driver->id}}">
                            <input type="hidden" name="drivername" value="{{$driver->name}}">
                            <input type="hidden" name="totalCarfare" value="{{$totalCar}}">
                            @foreach($productsIds as $productId)

                            <input type="hidden" name="productsIds[]" value="{{ $productId }}">

                            @endforeach

                        </div>
                        <div class="text-center my-3">မှတ်ချက်။ ။ ပစ္စည်းများ ရေစို၊ပေါက်ပြဲ၊ပျက်စီးပါက ပစ္စည်းတန်ဖိုးအတိုင်းပေးလျှော်ရမည်။</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="noprint container">
            <div class="text-end">
                <button onclick="window.print()" class="btn  bg-gradient-info w-10 ">print</button>
            </div>
        </div>
    </form>
</x-layout>
<x-js>
    window.onload = function(){
        document.forms['reciept_form'].submit();
    }
</x-js>