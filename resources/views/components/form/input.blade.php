@props(['name'=>null, 'type'=>'text', 'placeholder'=>null, 'autofocus' => false, 'required' => false, 'disabled' => false])
<div class="form-group @error($name) has-error @enderror">
    {{$slot}}
    <input type="{{$type}}" placeholder="{{$placeholder}}" name="{{$name}}" value="{{old($name)}}" @if($autofocus) autofocus @endif @required($required) @disabled($disabled)/>
    @error($name)
        <div class="error-message">{{$message}}</div>
    @enderror
</div>
