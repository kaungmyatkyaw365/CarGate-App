<x-layout >
    <div class="card container p-3">
        <h5>စာရင်းရှင်းရန်</h5>
        <table class="table table_striped">
            <th>
                <td></td>
                <td></td>
            </th>
            @foreach($cities as $city)
            <tr>
                <td>{{$city->name}}</td>
                <td>
                    <a href="{{route('city.show',$city->id)}}" class="btn btn-outline-success p-2 mb-0">VIEW</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-layout>