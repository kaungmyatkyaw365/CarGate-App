<x-layout :title="$city->name.'-'.$monthsaryinid->month.'-စာရင်းရှင်းတမ်း'">
    <!-- table -->
    <div class="row justify-content-center"  id="printjs">
    <img class="block logoimg" style="height: 100px;margin-bottom:10px" src="../assets/img/loinankhome.jpg" alt="" srcset="">
        <div class="col-md-7">   
            <div class="d-flex noprint justify-content-end">
                <button id="printButton" class="btn  bg-gradient-info w-10 ">print</button>
            </div>
            <div class="d-flex justify-content-between align-items-center my-4">
                <h4>စာရင်းရှင်းတမ်း - {{$monthsaryinid->month}}</h4>
                <h6 class="px-2">ရက်စွဲ :{{ date('Y-m-d ') }}</h6>
            </div>
            <div class="row mx-1">
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class=" p-0">
                            <table class="table align-items-center mb-0" id="posts-table">
                                <thead style="width:100%">
                                    <tr class="my-0 py-0" style="width:100%">
                                        <th style="width: 10px;" class="text-center my-0 py-0 mx-0 px-0  ">စဥ်</th>
                                        <th style="width:80%"  class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">အကြောင်းအရာ</th>
                                        <th style="width:10%"  class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">သင့်ငွေ</th>
                                        <th style="width:1%" class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder noprint"></th>
                                    </tr>
                                </thead>
                                <tbody style="width:100%">
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">1</td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">
                                            {{$city->name}}ဂိတ်အား စိုက်ငွေ ပေးရန်စာရင်း
                                            </p>
                                        </td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$tksitetotal}}</p>
                                        </td>
                                        
                                        <td class="my-0 py-0 noprint"><a href="{{route('tksiteview',$monthsaryinid->id)}}"class="btn btn-outline-primary my-0 py-0">view</a></td>
                                    </tr>
                                    @foreach($topay as $key=>$d)
                                    <tr class="my-0 py-0" style="width:100%">
                                        <td class="text-center text-xs my-0 py-0">{{++$key +1}}</td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">
                                                {{$d->about}}
                                            </p>
                                        </td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$d->amount}}</p>
                                        </td>
                                        <td class="noprint my-0 py-0"><a href=""class="btn btn-outline-primary my-0 py-0" data-bs-toggle="modal" data-bs-target="#ktModelEdit{{$d->id}}">edit</a></td>
                                    </tr>
                                    <x-ktedit :d="$d" />
                                    @endforeach
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0"></td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">စုစုပေါင်း
                                            <p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$topaytotal + $tksitetotal}}</p>
                                        </td>
                                    </tr>
                                    <div class="text-center">
                                        <h5>{{$city->name}}ဂိတ်အား ပေးရန်</h5>
                                    </div>
                                </tbody>
                            </table>
                            <div class="text-end container noprint">
                                <a href="" class="btn py-1 px-3 bg-gradient-success" data-bs-toggle="modal" data-bs-target="#ktModelPayAdd">+</a>
                                <x-kttopay-model :monthsaryinid="$monthsaryinid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div class="row mx-1">
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class=" p-0">
                            <table class="table align-items-center mb-0" id="posts-table">
                                <thead>
                                    <tr class="my-0 py-0">
                                        <th style="width: 10px;" class="text-center my-0 py-0 mx-0 px-0  ">စဥ်</th>
                                        <th style="width:80%" class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">အကြောင်းအရာ</th>
                                        <th style="width:10%" class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">သင့်ငွေ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">1</td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">
                                            ရှမ်းရွှေမြေ ခရီးသည် ကားခစိုက်ထားငွေ စာရင်း
                                            </p>
                                        </td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$psitetotal}}</p>
                                        </td>
                                        
                                        <td class="my-0 py-0 noprint"><a href="{{route('psiteview',$monthsaryinid->id)}}"class="btn btn-outline-primary my-0 py-0">view</a></td>
                                    </tr>
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">2</td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">
                                            ငွေတောင်းမှငွေရှင်းသို့ပြန်ပြောင်းသည့်ပစွည်းအား ကားခစိုက်ထားငွေ စာရင်း
                                            </p>
                                        </td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$togetpaidedtotal}}</p>
                                        </td>
                                        
                                        <td class="my-0 py-0 noprint"><a href="{{route('togetpaidedview',$monthsaryinid->id)}}"class="btn btn-outline-primary my-0 py-0">view</a></td>
                                    </tr>
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">3</td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">
                                            ဘောက်ချာမပါ ကားခစိုက်ထားငွေ စာရင်း
                                            </p>
                                        </td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$novounchertotal}}</p>
                                        </td>
                                        
                                        <td class="my-0 py-0 noprint"><a href="{{route('novouncherview',$monthsaryinid->id)}}"class="btn btn-outline-primary my-0 py-0">view</a></td>
                                    </tr>
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">4</td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">
                                            ကားခမှားပေါင်း၍ ပြန်နှုတ်သည့်စာရင်း
                                            </p>
                                        </td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$carrefundtotal}}</p>
                                        </td>
                                        
                                        <td class="my-0 py-0 noprint"><a href="{{route('carrefundview',$monthsaryinid->id)}}"class="btn btn-outline-primary my-0 py-0">view</a></td>
                                    </tr>
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">5</td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">
                                            လားရှိုးမှလောက်ကိုင်သို့ ပစ္စည်းဖိုး ထပ်ဆောင်းပေးရသည့်စာရင်း
                                            </p>
                                        </td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$additionaltotal}}</p>
                                        </td>
                                        <td class="my-0 py-0 noprint"><a href="{{route('additionalview',$monthsaryinid->id)}}"class="btn btn-outline-primary my-0 py-0">view</a></td>
                                    </tr>
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">6</td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">
                                            ခရီးသည်ကားခစိုက်ငွေ စာရင်း
                                            </p>
                                        </td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$carsitetotal}}</p>
                                        </td>
                                        <td class="my-0 py-0 noprint"><a href="{{route('carsiteview',$monthsaryinid->id)}}"class="btn btn-outline-primary my-0 py-0">view</a></td>
                                    </tr>
                                    
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">7</td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">
                                            ပစ္စည်းဖိုးစိုက်ငွေစာရင်း
                                            </p>
                                        </td>
                                        <td class=" my-0 py-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$productsitetotal}}</p>
                                        </td>
                                        <td class="my-0 py-0 noprint"><a href="{{route('productsiteview',$monthsaryinid->id)}}"class="btn btn-outline-primary my-0 py-0">view</a></td>
                                    </tr>
                                    @foreach($toget as $key=>$d)
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">{{++$key +7}}</td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">
                                                {{$d->about}}
                                            </p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$d->amount}}</p>                                            </p>
                                        </td>
                                        <td class="noprint my-0 py-0"><a href=""class="btn btn-outline-primary my-0 py-0" data-bs-toggle="modal" data-bs-target="#ktModelEdit{{$d->id}}">edit</a></td>
                                    </tr>
                                    <x-ktedit :d="$d" />
                                    @endforeach
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0"></td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">စုစုပေါင်း</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$togettotal + $psitetotal + $togetpaidedtotal + $novounchertotal + $carrefundtotal + $additionaltotal + $carsitetotal + $productsitetotal}}</p>
                                        </td>
                                    </tr>
                                    <div class="text-center">
                                        <h5>{{$city->name}}ဂိတ်အား ပေးငွေ / စိုက်ထားငွေ</h5>
                                    </div>
                                </tbody>
                            </table>
                            <div class="text-end container noprint">
                                <a href="" class="btn py-1 px-3 bg-gradient-success" data-bs-toggle="modal" data-bs-target="#ktModelGetAdd">+</a>
                                <x-kttoget-model :monthsaryinid="$monthsaryinid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
            
            $finaltogettotal = $togettotal + $psitetotal + $togetpaidedtotal + $novounchertotal + $carrefundtotal + $additionaltotal + $carsitetotal + $productsitetotal;
            $finaltopaytotal = $topaytotal + $tksitetotal;
            @endphp
            <div class="d-flex justify-content-center row">
                <div style="width: 450px;">
                    <div class="d-flex justify-content-between">
                        <h6>{{$city->name}}ဂိတ်အား ပေးရန်</h6>
                        <h6>{{$finaltopaytotal}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>{{$city->name}}ဂိတ်အား ပေးငွေ / စိုက်ထားငွေ</h6>
                        <h6>{{$finaltogettotal}}</h6>
                    </div>
                    <div style="border-top:2px solid black" class="d-flex justify-content-between">
                        <h6>{{$finaltopaytotal - $finaltogettotal < 0 ? 'ရရန်ငွေ' :'ပေးရန်ကျန်ရှိငွေ'}} </h6>
                        <?php
                        $total = $finaltopaytotal - $finaltogettotal;
                        if ($total < 0) {
                            $total = $total * -1;
                        }
                        ?>
                        <h6>{{$total}}</h6>
                    </div>
                </div>
            </div>
            <div class="mt-5 text-center py-2">
                <h5>မှတ်ချက်။ ။ စာရင်းစစ်ဆေးပြီး လွဲမှားပါက ပြန်လည်အကြောင်းကြားပေးပါရန်။</h5>
            </div>
        </div>
    </div>
</x-layout>