<x-layout>
    <!-- table -->
    <div class="row mx-4">
        <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="posts-table">
                        <thead>
                            <tr>
                                <th class="text-center">စဥ်</th>
                                <th class="text-center font-weight-bolder">အမည်</th>
                                <th class=" font-weight-bolder text-center">ဖုန်းနံပါတ်</th>
                                <th class=" font-weight-bolder text-center">အရေအတွက်</th>
                                <th class=" font-weight-bolder text-center">ကားခ</th>
                                <th class=" font-weight-bolder text-center">စိုက်ငွေ</th>
                                <th class=" font-weight-bolder text-center">မှတ်ချက်</th>
                                <th scope="col" class=" font-weight-bolder text-center"><input type="checkbox" class="check-all"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <form role="form" action="{{route('historyoutadd.update',$data->id)}}" method="POST">
                                @csrf
                                @foreach($products as $key=> $d)
                                <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td>
                                        <div class="text-center d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h5 class="mb-0 text-xs">{{$d->customer}} , {{$d->address->name}}</h5>
                                                <p class="text-xxs text-secondary mb-0">{{$d->driver->name}}, {{$d->driver->carno}}///{{$d->created_at->format('d-m-Y/ h:ia')}}</p>
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
                                        <p class="text-xs text-center font-weight-bold mb-0">{{ $d->is_paided == 1 ? 'ရှင်း' : 'တောင်း'}}{{$d->remark}}</p>
                                    </td>
                                    <td class=" font-weight-bolder text-center"><input type="checkbox" name="ids[]" class="check" value="{{ $d->id }}"></td>
                                </tr>
                                @endforeach
                                <div class="d-flex justify-content-end ">
                                    <input class="btn  bg-gradient-info w-10 mt-4 " type="submit" value="ထုတ်မည်">
                                </div>
                                <h6>ကုန်ပစ္စည်းများ</h6>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
<x-js>
    $.fn.TableCheckAll = function (options) {
    // Default options
    var settings = $.extend({
    checkAllCheckboxClass: '.check-all',
    checkboxClass: '.check'
    }, options);
    return this.each(function () {
    $(this).find(settings.checkAllCheckboxClass).on('click', function () {
    if ($(this).is(':checked')) {
    $.each($(this).parents("table").find(settings.checkboxClass), function () {
    $(this).prop('checked', true);
    });
    } else {
    $.each($(this).parents("table").find(settings.checkboxClass), function () {
    $(this).prop('checked', false);
    });
    }
    });
    $(this).find(settings.checkboxClass).on('click', function () {
    var totalCheckbox = $(this).parents("table").find(settings.checkboxClass).length;
    var totalChecked = $(this).parents("table").find(settings.checkboxClass + ":checked").length;

    if (totalCheckbox == totalChecked) {
    if (!$(this).parents("table").find(settings.checkAllCheckboxClass).is(':checked')) {
    $(this).parents("table").find(settings.checkAllCheckboxClass).prop('checked', true);
    }
    }

    if (totalCheckbox != totalChecked && !$(this).is(':checked')) {
    $(this).parents("table").find(settings.checkAllCheckboxClass).prop('checked', false);
    }
    });
    });
    };


    $(document).ready(function () {
    $("#posts-table").TableCheckAll();
    });

</x-js>