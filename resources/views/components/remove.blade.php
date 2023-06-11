<!-- Modal -->
<div class="modal fade" aria-hidden="true" id="remove{{$d->id}}" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    ပြန်ထုတ်မည် သေခြာပါသလား ?
                </h1>
                <form role="form" action="{{route('historyoutremove.update',$data->id)}}" method="POST">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{$d->id}}">
                    <button type="submit" class="btn btn-outline-danger my-2">ထုတ်မည်</button>
                </form>
            </div>
        </div>
    </div>
</div>