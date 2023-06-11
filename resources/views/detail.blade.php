<x-layout>
    <!-- table -->
    <div class="row justify-content-center">
        <div class="col-md-9">     
            <div class="d-flex noprint justify-content-end">
                <button onclick="window.print()" class="btn  bg-gradient-info ">print</button>
            </div>
            <div class="text-end align-items-center px-2">
                <h6>ရက်စွဲ :{{ date('Y-m-d ') }}</h6>
            </div>
            <!-- total -->
            <div class='row mx-1 {{count($tksite) == 0 ? "noprint":""}}'>
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class=" p-0">
                            <table class="table align-items-center mb-0" id="posts-table">
                                <thead>
                                    <tr class="my-0 py-0">
                                        <th style="width: 10px;" class="text-center my-0 py-0 mx-0 px-0  ">စဥ်</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">အကြောင်းအရာ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">ရက်စွဲ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">သင့်ငွေ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">မှတ်ချက်</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder noprint"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tksite as $key=>$d)
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">{{++$key}}</td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->name}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->date}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$d->amount}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->remark}}</p>
                                        </td>
                                        <td class="noprint"><a href=""class="btn btn-outline-primary p-2" data-bs-toggle="modal" data-bs-target="#tkModelEdit{{$d->id}}">edit</a></td>
                                    </tr>
                                    <x-tkedit :d="$d" />
                                    @endforeach
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0"></td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">စုစုပေါင်း
                                            <p>
                                        </td>
                                        <td></td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$tksitetotal}}</p>
                                        </td>
                                    </tr>
                                    <div class="text-center">
                                        <h5 contenteditable="true">ကျိုင်းတုံဂိတ်အား စိုက်ငွေ ပေးရန်စာရင်း</h5>
                                    </div>
                                </tbody>
                            </table>
                            <div class="text-end container noprint">
                                <a href="" class="btn py-1 px-3 bg-gradient-success" data-bs-toggle="modal" data-bs-target="#tksiteAdd">+</a>
                                <x-tksite-model />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div id="psite" class='row mx-1 {{count($psite) == 0 ? "noprint":""}}'>
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table p-0">
                            <table class="table align-items-center mb-0" id="posts-table">
                                <thead>
                                    <tr class="my-0 py-0">
                                        <th style="width: 10px;" class="text-center my-0 py-0 mx-0 px-0  ">စဥ်</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">ရက်စွဲ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">ကားဆရာ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">ခရီးစဥ်</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">ဦးရေ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">နှုန်း</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">သင့်ငွေ</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder">မှတ်ချက်</th>
                                        <th class="text-center my-0 py-0 mx-0 px-0  font-weight-bolder noprint"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($psite as $key=>$d)
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0">{{++$key}}</td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->date}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->name}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->location}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->item}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->amount}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$d->item * $d->amount}}</p>
                                        </td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">{{$d->remark}}</p>
                                        </td>
                                        <td class="noprint"><a href=""class="btn btn-outline-primary p-2" data-bs-toggle="modal" data-bs-target="#pModelEdit{{$d->id}}">edit</a></td>
                                    </tr>
                                    <x-pedit :d="$d" />
                                    @endforeach
                                    <tr class="my-0 py-0">
                                        <td class="text-center text-xs my-0 py-0"></td>
                                        <td></td>
                                        <td></td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xs text-center font-weight-bold my-0 py-0">စုစုပေါင်း</p>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class=" my-0 py-0 mx-0 px-0">
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$psitetotal}}</p>
                                        </td>
                                    </tr>
                                    <div class="text-center">
                                        <h5 contenteditable="true">ရှမ်းရွှေမြေ ခရီးသည် ကားခစိုက်ထားငွေ စာရင်း</h5>
                                    </div>
                                </tbody>
                            </table>
                            <div class="text-end container noprint">
                                <a href="" class="btn py-1 px-3 bg-gradient-success" data-bs-toggle="modal" data-bs-target="#psiteAdd">+</a>
                                <x-psite />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div class='row mx-1 {{count($togetpaided) == 0 ? "noprint":""}}'>
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
                                        <td class="noprint"><a href=""class="btn btn-outline-primary p-2" data-bs-toggle="modal" data-bs-target="#togetpaidedEdit{{$d->id}}">edit</a></td>
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
                                <x-togetpaided />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div class='row mx-1 {{count($novouncher) == 0 ? "noprint":""}}'>
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
                                    @foreach($novouncher as $key=>$d)
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
                                        <td class="noprint"><a href=""class="btn btn-outline-primary p-2" data-bs-toggle="modal" data-bs-target="#novouncherEdit{{$d->id}}">edit</a></td>
                                    </tr>
                                    <x-novouncher-edit :d="$d" />
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
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$novounchertotal}}</p>
                                        </td>
                                    </tr>
                                    <div class="text-center">
                                        <h5 contenteditable="true">ဘောက်ချာမပါ ကားခစိုက်ထားငွေ စာရင်း</h5>
                                    </div>
                                </tbody>
                            </table>
                            <div class="text-end container noprint">
                                <a href="" class="btn py-1 px-3 bg-gradient-success" data-bs-toggle="modal" data-bs-target="#novouncherAdd">+</a>
                                <x-novouncher />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div class='row mx-1 {{count($carrefund) == 0 ? "noprint":""}}'>
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
                                    @foreach($carrefund as $key=>$d)
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
                                        <td class="noprint"><a href=""class="btn btn-outline-primary p-2" data-bs-toggle="modal" data-bs-target="#carrefundEdit{{$d->id}}">edit</a></td>
                                    </tr>
                                    <x-carrefundedit :d="$d" />
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
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$carrefundtotal}}</p>
                                        </td>
                                    </tr>
                                    <div class="text-center">
                                        <h5 contenteditable="true"> ကားခမှားပေါင်း၍ ပြန်နှုတ်သည့်စာရင်း</h5>
                                    </div>
                                </tbody>
                            </table>
                            <div class="text-end container noprint">
                                <a href="" class="btn py-1 px-3 bg-gradient-success" data-bs-toggle="modal" data-bs-target="#carrefundAdd">+</a>
                                <x-carrefund />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div class='row mx-1 {{count($additional) == 0 ? "noprint":""}}'>
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
                                    @foreach($additional as $key=>$d)
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
                                        <td class="noprint"><a href=""class="btn btn-outline-primary p-2" data-bs-toggle="modal" data-bs-target="#additionalEdit{{$d->id}}">edit</a></td>
                                    </tr>
                                    <x-additionaledit :d="$d" />
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
                                            <p class="text-xxs text-center font-weight-bold my-0 py-0">{{$additionaltotal}}</p>
                                        </td>
                                    </tr>
                                    <div class="text-center">
                                        <h5 contenteditable="true"> လားရှိုးမှလောက်ကိုင်သို့ ပစ္စည်းဖိုး ထပ်ဆောင်းပေးရသည့်စာရင်း</h5>
                                    </div>
                                </tbody>
                            </table>
                            <div class="text-end container noprint">
                                <a href="" class="btn py-1 px-3 bg-gradient-success" data-bs-toggle="modal" data-bs-target="#additionalAdd">+</a>
                                <x-additional />
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