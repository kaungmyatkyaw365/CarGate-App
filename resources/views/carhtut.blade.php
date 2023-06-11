<x-layout :title="$city->name.'-'.$monthsaryin->month.'-'.'ကားထွက်စာရင်း'">
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
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">ကားဆရာ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">{{$city->name == 'လားရှိုး' ? 'ကားနံပါတ်':'အကြောင်းအရာ'}}</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">သင့်ငွေ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder noprint"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carhtuts as $key=>$d)
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">{{++$key}}</td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->date}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->date}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->driver}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->amount}}</p>
                                        </td>
                                        <td class="noprint my-0 py-0"><a href=""class="btn btn-outline-primary my-0 py-0" data-bs-toggle="modal" data-bs-target="#togetpaidedEdit{{$d->id}}">edit</a></td>
                                    </tr>
                                    <x-carhtutedit :d="$d" :city="$city" />
                                    @endforeach
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0"></td>
                                        <td></td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">စုစုပေါင်း</p>
                                        </td>
                                        <td></td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$carhtuttotal}}</p>
                                        </td>
                                    </tr>
                                    <div class="text-center">
                                        <h5>{{$city->name}} ကားထွက်စာရင်း</h5>
                                    </div>
                                </tbody>
                            </table>
                            <div class="text-end container noprint">
                                <a href="" class="btn py-1 px-3 bg-gradient-success" data-bs-toggle="modal" data-bs-target="#togetpaidedAdd">+</a>
                                <x-carhtutadd monthsaryinid="{{$monthsaryin->id}}" :city="$city"/>
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