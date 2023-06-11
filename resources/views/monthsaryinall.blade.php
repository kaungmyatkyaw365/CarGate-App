<x-layout >
    <div class="container d-flex">
        <div class="card col-md-6 p-5">
          <h4>{{$city->name}} စာရင်းရှင်းတမ်း</h4>
            <form action="{{route('monthsaryin.store')}}" method="post">
                @csrf
                <input required type="text" name="month" placeholder="လအမည်" class=" w-25">
                <input type="hidden" value="{{$city->id}}" name="city_id">
                <button type="submit" >Create</button>
            </form>

            <div class="p-2">
            <table class="table table_striped">
            <th>
                <td></td>
                <td></td>
            </th>
                @foreach($monthsaryins as $saryin)
                
            <tr>
                <td>{{$saryin->month}}</td>
                <td>
                    <a href="{{route('monthsaryin.show',$saryin->id)}}" class="btn btn-outline-success p-2 mb-0">VIEW</a>
                <button type="button" class="btn btn-outline-danger p-2 mb-0" data-bs-toggle="modal" data-bs-target="#deleteModal{{$saryin->id}}">Delete</button>
                </td>
            </tr>
                        <!-- Modal -->
<div class="modal fade" id="deleteModal{{$saryin->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ဖျက်မည် အတည်ပြုခြင်း</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {{$saryin->month}} စာရင်းကို ဖျက်မည်သေခြာပါသလား?
      </div>
      <div class="modal-footer">
        <form action="{{route('monthsaryin.destroy',$saryin->id)}}" method="post">
            @csrf
            @method('delete')

        <a class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-danger">ဖျက်မည်</button>
        </form>
      </div>
    </div>
  </div>
</div>
                @endforeach
</table>
            </div>
        </div>
        <!-- ............... -->
        <div class="card col-md-6 p-5">
          <h4>{{$city->name}} ကားထွက်စာရင်း</h4>
            <form action="{{route('monthsaryin.store')}}" method="post">
                @csrf
                <input required type="text" name="month" placeholder="လအမည်" class=" w-25">
                <input type="hidden" value="{{$city->id}}" name="city_id">
                <input type="hidden" value="1" name="is_carhtut">
                <button type="submit" >Create</button>
            </form>

            <div class="p-2">
            <table class="table table_striped">
            <th>
                <td></td>
                <td></td>
            </th>
                @foreach($carhtutsaryins as $saryin)
                
            <tr>
                <td>{{$saryin->month}}</td>
                <td>
                    <a href="{{route('carhtutshows',$saryin->id)}}" class="btn btn-outline-success p-2 mb-0">VIEW</a>
                <button type="button" class="btn btn-outline-danger p-2 mb-0" data-bs-toggle="modal" data-bs-target="#deleteModal{{$saryin->id}}">Delete</button>
                </td>
            </tr>
                        <!-- Modal -->
<div class="modal fade" id="deleteModal{{$saryin->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ဖျက်မည် အတည်ပြုခြင်း</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {{$saryin->month}} စာရင်းကို ဖျက်မည်သေခြာပါသလား?
      </div>
      <div class="modal-footer">
        <form action="{{route('monthsaryin.destroy',$saryin->id)}}" method="post">
            @csrf
            @method('delete')

        <a class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-danger">ဖျက်မည်</button>
        </form>
      </div>
    </div>
  </div>
</div>
                @endforeach
</table>
            </div>
        </div>
        <!-- ............... -->
    </div>
</x-layout>