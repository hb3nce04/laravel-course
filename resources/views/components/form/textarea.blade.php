@props(['name'=>null, 'label'=>null, 'rows'=>null])
<div class="form-group @error($name) has-error @enderror">
    <label>{{$label}}</label>
    <textarea rows="{{$rows}}" name="{{$name}}">{{old($name)}}</textarea>
    @error($name)
    <div class="error-message">{{$message}}</div>
    @enderror
</div>
