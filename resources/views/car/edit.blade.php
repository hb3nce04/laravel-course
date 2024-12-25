<x-app-layout title="Change Car">
    <main>
        <div class="container-small">
            <h1 class="car-details-page-title">Edit car</h1>
            <form
                action="{{route('car.update', $car)}}"
                method="POST"
                enctype="multipart/form-data"
                class="card add-new-car-form"
            >
                @csrf
                {{method_field('put')}}
                <div class="form-content">
                    <div class="form-details">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Maker</label>
                                    <select>
                                        @foreach(\App\Models\Maker::all() as $maker)
                                            <option value="{{$maker->id}}">{{$maker->name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="error-message">This field is required</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Model</label>
                                    <select name="model">
                                        @foreach(\App\Models\Model::all() as $model)
                                            <option value="{{$model->id}}">{{$model->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Year</label>
                                    <select>
                                        <option value="">Year</option>
                                        @foreach(range(date("Y"), 1950) as $year)
                                            <option value="{{$year}}">{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Car Type</label>
                            <div class="row">
                                @foreach(\App\Models\CarType::all() as $carType)
                                    <div class="col">
                                        <label class="inline-radio">
                                            <input type="radio" name="car_type" value="{{$carType->id}}" />
                                            {{$carType->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" placeholder="Price" value="{{$car->price}}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Vin Code</label>
                                    <input placeholder="Vin Code" value="{{$car->vin}}"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Mileage (ml)</label>
                                    <input placeholder="Mileage" value="{{$car->mileage}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Fuel Type</label>
                            <div class="row">
                                @foreach(\App\Models\FuelType::all() as $fuelType)
                                    <div class="col">
                                        <label class="inline-radio">
                                            <input type="radio" name="fuel_type" value="{{$fuelType->id}}" />
                                            {{$fuelType->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>State/Region</label>
                                    <select>
                                        @foreach(\App\Models\State::all() as $state)
                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>City</label>
                                    <select>
                                        <option value="">City</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input placeholder="Address" value="{{$car->address}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="checkbox">
                                        <input
                                            type="checkbox"
                                            name="air_conditioning"
                                            value="1"
                                        />
                                        Air Conditioning
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="power_windows" value="1" />
                                        Power Windows
                                    </label>

                                    <label class="checkbox">
                                        <input
                                            type="checkbox"
                                            name="power_door_locks"
                                            value="1"
                                        />
                                        Power Door Locks
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="abs" value="1" />
                                        ABS
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="cruise_control" value="1" />
                                        Cruise Control
                                    </label>

                                    <label class="checkbox">
                                        <input
                                            type="checkbox"
                                            name="bluetooth_connectivity"
                                            value="1"
                                        />
                                        Bluetooth Connectivity
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="checkbox">
                                        <input type="checkbox" name="remote_start" value="1" />
                                        Remote Start
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="gps_navigation" value="1" />
                                        GPS Navigation System
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="heated_seats" value="1" />
                                        Heated Seats
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="climate_control" value="1" />
                                        Climate Control
                                    </label>

                                    <label class="checkbox">
                                        <input
                                            type="checkbox"
                                            name="rear_parking_sensors"
                                            value="1"
                                        />
                                        Rear Parking Sensors
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="leather_seats" value="1" />
                                        Leather Seats
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Detailed Description</label>
                            <textarea rows="10">{{$car->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="checkbox">
                                <input type="checkbox" name="published" checked="{{$car->is_published}}" />
                                Published
                            </label>
                        </div>
                    </div>
                    <div class="form-images">
                        <div class="form-image-upload">
                            <div class="upload-placeholder">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    style="width: 48px"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                    />
                                </svg>
                            </div>
                            <input id="carFormImageUpload" type="file" multiple />
                        </div>
                        <div id="imagePreviews" class="car-form-images"></div>
                    </div>
                </div>
                <div class="p-medium" style="width: 100%">
                    <div class="flex justify-end gap-1">
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
