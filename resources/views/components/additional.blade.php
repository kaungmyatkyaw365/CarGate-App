<!-- Modal -->
<div class="modal fade" aria-hidden="true" id="additionalAdd" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">လားရှိုးမှလောက်ကိုင်သို့ ပစ္စည်းဖိုး ထပ်ဆောင်းပေးရသည့်စာရင်း</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" action="/adadd" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">ရက်စွဲ</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" name="date">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">နံပါတ်</label>
                        <div class="mb-3 d-flex">
                            <input class="form-control" name="number">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">အမည်</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" name="name">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">လိပ်စာ</label>
                        <div class="mb-3 d-flex">
                            <input required class="form-control" name="location">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">အမျိုးအစား</label>
                        <div class="mb-3 d-flex">
                            <input class="form-control" name="type">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">ဦးရေ</label>
                        <div class="mb-3 d-flex">
                            <input class="form-control" name="item">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">သင့်ငွေ</label>
                        <div class="mb-3 d-flex">
                            <input type="number" required class="form-control" name="amount">
                        </div>
                    </div>
                    <div class="d-flex ">
                        <label style="font-size: 15px;" class="col-md-3">မှတ်ချက်</label>
                        <div class="mb-3 d-flex">
                            <input class="form-control" name="remark">
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