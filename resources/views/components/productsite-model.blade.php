<!-- Modal -->
<div class="modal fade" aria-hidden="true" id="carsiteAdd" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                   ပစ္စည်းဖိုး စိုက်ငွေစာရင်း
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" action="{{route('productsite.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">ရက်စွဲ</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" name="date">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">ကားဆရာ</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" name="driver">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">ပိုင်ရှင်</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" name="owner">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">လိပ်စာ</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" name="address">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">အမျိုးအစား</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" name="type">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">ဦးရေ</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" name="item">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">သင့်ငွေ</label>
                        <div class="mb-3 d-flex">
                            <input type="number" required class="form-control" name="amount">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="monthsaryin_id" value="{{$monthsaryinid}}">
                <div class="modal-footer">
                    <a class="btn btn-outline-secondary" data-bs-dismiss="modal">No</a>
                    <button type="submit" class="btn btn-outline-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>