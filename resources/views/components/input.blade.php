@props([ 'required'=>'','name','label'=>'','placeHolder'=>'','default'=>'', 'type' => ''])
<div class="d-flex justify-content-between">
    <label style="font-size: 15px;" class="{{ $type == 'number' ? 'col-5': '' }}">{{ $label}}</label>
    <div class="mb-3 ">
        <input {{$required}} value="{{$default}}" type="{{$type}}" style="width: 150px;" class="form-control p-2" name="{{$name}}" placeholder="{{$placeHolder}}">
    </div>
</div>