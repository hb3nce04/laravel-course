<x-app-layout title="Car #{{$car->id}}">
    <main>
        <div class="container">
            <h1 class="car-details-page-title">{{$car->maker->name}} {{$car->model->name}} - {{$car->year}}</h1>
            <div class="car-details-region">{{$car->city->name}} - {{$car->getPublishDate()}}</div>

            <div class="car-details-content">
                <div class="car-images-and-description">
                    <div class="car-images-carousel">
                        <div class="car-image-wrapper">
                            <img
                                src="{{$car->primaryImage->image_path}}"
                                alt=""
                                class="car-active-image"
                                id="activeImage"
                            />
                        </div>
                        <div class="car-image-thumbnails">
                            @foreach($car->images as $image)
                                <img src="{{$image->image_path}}" alt=""/>
                            @endforeach
                        </div>
                        <button class="carousel-button prev-button" id="prevButton">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                style="width: 64px"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 19.5 8.25 12l7.5-7.5"
                                />
                            </svg>
                        </button>
                        <button class="carousel-button next-button" id="nextButton">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                style="width: 64px"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m8.25 4.5 7.5 7.5-7.5 7.5"
                                />
                            </svg>
                        </button>
                    </div>

                    <div class="card car-detailed-description">
                        <h2 class="car-details-title">Detailed Description</h2>
                        {!! $car->description !!}
                    </div>

                    <div class="card car-detailed-description">
                        <h2 class="car-details-title">Car Specifications</h2>

                        <ul class="car-specifications">
                            <x-car-specification :value="$car->features->air_conditioning">Air Conditioning
                            </x-car-specification>
                            <x-car-specification :value="$car->features->power_windows">Power Windows
                            </x-car-specification>
                            <x-car-specification :value="$car->features->power_door_locks">Power Door Locks
                            </x-car-specification>
                            <x-car-specification :value="$car->features->abs">ABS</x-car-specification>
                            <x-car-specification :value="$car->features->cruise_control">Cruise Control
                            </x-car-specification>
                            <x-car-specification :value="$car->features->bluetooth_connectivity">Bluetooth
                                Connectivity
                            </x-car-specification>
                            <x-car-specification :value="$car->features->remote_start">Remote Start
                            </x-car-specification>
                            <x-car-specification :value="$car->features->gps_navigation">GPS Navigation System
                            </x-car-specification>
                            <x-car-specification :value="$car->features->heated_seats">Heated Seats
                            </x-car-specification>
                            <x-car-specification :value="$car->features->climate_control">Climate Control
                            </x-car-specification>
                            <x-car-specification :value="$car->features->rear_parking_sensors">Rear Parking Sensors
                            </x-car-specification>
                            <x-car-specification :value="$car->features->leather_seats">Leather Seats
                            </x-car-specification>
                        </ul>
                    </div>
                </div>
                <div class="car-details card">
                    <div class="flex items-center justify-between">
                        <p class="car-details-price">${{$car->price}}</p>
                        <x-like-button :isInWatchList="true" :carId="$car->id"/>
                    </div>

                    <hr/>
                    <table class="car-details-table">
                        <tbody>
                        <tr>
                            <th>Maker</th>
                            <td>{{$car->maker->name}}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{$car->model->name}}</td>
                        </tr>
                        <tr>
                            <th>Year</th>
                            <td>{{$car->year}}</td>
                        </tr>
                        <tr>
                            <th>Vin</th>
                            <td>{{$car->vin}}</td>
                        </tr>
                        <tr>
                            <th>Mileage</th>
                            <td>{{$car->mileage}}</td>
                        </tr>
                        <tr>
                            <th>Car Type</th>
                            <td>{{$car->carType->name}}</td>
                        </tr>
                        <tr>
                            <th>Fuel Type</th>
                            <td>{{$car->fuelType->name}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$car->address}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>

                    <div class="flex gap-1 my-medium">
                        <img
                            src="{{$car->owner->avatar}}"
                            alt=""
                            class="car-details-owner-image"
                        />
                        <div>
                            <h3 class="car-details-owner">{{$car->owner->getFullName()}}</h3>
                            <div class="text-muted">{{$car->owner->cars()->count()}} cars</div>
                        </div>
                    </div>
                    @if($car->owner->phone)
                        <div class="wrapper">
                            <a id="linkNumber"
                               class="car-details-phone">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    style="width: 16px"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"
                                    />
                                </svg>
                                <span id="number">{{\Illuminate\Support\Str::mask($car->owner->phone, '*', -3)}}</span>
                            </a>
                            <button id="viewNumber" class="car-details-phone-view">show</button>
                            <script type="text/javascript">
                                const link = document.querySelector("a#linkNumber")
                                const outputElement = document.querySelector("span#number")
                                const button = document.querySelector("button#viewNumber")
                                button.addEventListener("click", () => {
                                    outputElement.innerText = <?php echo $car->owner->phone ?>;
                                    link.href = `tel:${<?php echo $car->owner->phone ?>}`;
                                })
                            </script>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
