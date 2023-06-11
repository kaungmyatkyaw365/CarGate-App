<!-- Modal -->
<div class="modal fade" aria-hidden="true" id="deletehistroy{{$d->id}}" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> 
                ဖျက်မည် သေခြာပါသလား ?
                <p>
                {{$d->drivername}} - {{$d->created_at->format('d-m-Y/ h:ia')}}</p>
                </h1>
                <form role="form" action="{{route('historyout.destroy',$d->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{$d->id}}">
                    <button type="submit" class="btn btn-outline-danger my-2">ဖျက်မည်</button>
                </form>
            </div>
        </div>
    </div>
</div>