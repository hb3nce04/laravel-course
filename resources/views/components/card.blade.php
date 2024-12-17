@props(['color', 'bgColor' => 'white'])
<div {{$attributes->class("card card-text-$color card-bg-$bgColor")}}>
    <div {{$title->attributes->class("card-header")}}>
        {{$title}}
    </div>
    {{$slot}}
    <div class="card-footer">
        {{$footer}}
    </div>
</div>
