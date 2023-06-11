<x-layout :title="'ငွေတောင်းမှငွေရှင်းသို့ပြန်ပြောင်းသည့်ပစွည်းအား ကားခစိုက်ထားငွေ စာရင်း'.$monthsaryinid">
    <div class="row justify-content-center" id="printjs">
        <img class="block logoimg" style="height: 100px;margin-bottom:10px" src="../assets/img/loinankhome.jpg" alt="" srcset="">
        <div class="col-md-9">     
            <div class="d-flex noprint justify-content-end">
            <button id="printButton" class="btn  bg-gradient-info w-10 ">print</button>
            </div>
            <div class="text-end align-items-center px-2">
                <h6>ရက်စွဲ :{{ date('Y-m-d ') }}</h6>
            </div>
            <!-- total -->
            <div class='row mx-1'>
            <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table p-0">
                            <table class="table align-items-center mb-0" id="posts-table">
                                <thead>
                                    <tr class="my-0 py-0">
                                        <th style="width: 10px;" class="text-center my-0 py-0 mx-0 px-0  ">စဥ်</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">ရက်စွဲ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">နံပါတ်</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">အမည်</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">လိပ်စာ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">အမျိုးအစား</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">ဦးရေ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">သင့်ငွေ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">မှတ်ချက်</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder noprint"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($togetpaided as $key=>$d)
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">{{++$key}}</td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->date}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->number}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->name}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->location}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->type}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->item}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$d->amount}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->remark}}</p>
                                        </td>
                                        <td class="noprint my-0 py-0"><a href=""class="btn btn-outline-primary my-0 py-0" data-bs-toggle="modal" data-bs-target="#togetpaidedEdit{{$d->id}}">edit</a></td>
                                    </tr>
                                    <x-togetpaidededit :d="$d" />
                                    @endforeach
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">စုစုပေါင်း</p>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$togetpaidedtotal}}</p>
                                        </td>
                                    </tr>
                                    <div class="text-center">
                                        <h5 contenteditable="true">ငွေတောင်းမှငွေရှင်းသို့ပြန်ပြောင်းသည့်ပစွည်းအား ကားခစိုက်ထားငွေ စာရင်း</h5>
                                    </div>
                                </tbody>
                            </table>
                            <div class="text-end container noprint">
                                <a href="" class="btn py-1 px-3 bg-gradient-success" data-bs-toggle="modal" data-bs-target="#togetpaidedAdd">+</a>
                                <x-togetpaided monthsaryinid="{{$monthsaryinid}}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 text-center">
                <h5>မှတ်ချက်။ ။ စာရင်းစစ်ဆေးပြီး လွဲမှားပါက ပြန်လည်အကြောင်းကြားပေးပါရန်။</h5>
            </div>
        </div>
    </div>
</x-layout>