@props(['name'=>null, 'type'=>'text', 'placeholder'=>null, 'autofocus' => false, 'required' => false])
<div class="form-group @error($name) has-error @enderror">
    {{$slot}}
    <input type="{{$type}}" placeholder="{{$placeholder}}" name="{{$name}}" value="{{old($name)}}" @if($autofocus) autofocus @endif @if($required) required @endif/>
    @error($name)
        <div class="error-message">{{$message}}</div>
    @enderror
</div>
