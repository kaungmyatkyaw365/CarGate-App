<x-layout >
    <div class="container">
        <div class="card px-5 py-2">
            <form action="{{route('city.store')}}" method="post">
                @csrf
                <input type="text" name="name" placeholder="Name" class=" w-25">
                <button type="submit" >Create</button>
            </form>
        </div>
        <div class="card p-5">
            <h4>City List</h4>
            <div class="p-2">
                @foreach($cities as $city)
                <div>{{$city->name}}</div></hr>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>