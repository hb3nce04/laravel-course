@props(['car'])
<div class="car-item card">
    <a href="{{route('car.show', $car->id)}}">
        <img
            src="{{$car->primaryImage->image_path}}"
            alt=""
            class="car-item-img rounded-t"
        />
    </a>
    <div class="p-medium">
        <div class="flex items-center justify-between">
            <small class="m-0 text-muted">{{$car->city->name}}</small>
            <x-like-button :liked="true" :carId="$car->id"/>
        </div>
        <h2 class="car-item-title">{{$car->year}} - {{$car->maker->name}} {{$car->model->name}}</h2>
        <p class="car-item-price">${{$car->price}}</p>
        <hr/>
        <p class="m-0">
            <span class="car-item-badge">{{$car->carType->name}}</span>
            <span class="car-item-badge">{{$car->fuelType->name}}</span>
        </p>
    </div>
</div>
