<x-app-layout title="Add New Car">
    <main>
        <div class="container-small">
            <h1 class="car-details-page-title">Add new car</h1>
            <form
                action="{{route('car.store')}}"
                method="POST"
                enctype="multipart/form-data"
                class="card add-new-car-form"
            >
                @csrf
                <div class="form-content">
                    <div class="form-details">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Maker</label>
                                    <select name="maker_id">
                                        @foreach(\App\Models\Maker::all() as $maker)
                                            <option
                                                value="{{$maker->id}}" @selected(old('maker_id') == $maker->id)>{{$maker->name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="error-message">This field is required</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Model</label>
                                    <select name="model_id">
                                        @foreach(\App\Models\Model::all() as $model)
                                            <option
                                                value="{{$model->id}}" @selected(old('model_id') == $model->id)>{{$model->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Year</label>
                                    <select name="year">
                                        @foreach(range(date("Y"), 1950) as $year)
                                            <option value="{{$year}}" @selected(old('year') == $year)>{{$year}}</option>
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
                                            <input type="radio" name="car_type_id"
                                                   value="{{$carType->id}}" @checked(old('car_type_id') == $carType->id)/>
                                            {{$carType->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <x-form.input name="price" type="number" placeholder="Price">
                                    <label>Price</label>
                                </x-form.input>
                            </div>
                            <div class="col">
                                <x-form.input name="vin" placeholder="Vin Code">
                                    <label>Vin Code</label>
                                </x-form.input>
                            </div>
                            <div class="col">
                                <x-form.input name="mileage" placeholder="Mileage">
                                    <label>Mileage (ml)</label>
                                </x-form.input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Fuel Type</label>
                            <div class="row">
                                @foreach(\App\Models\FuelType::all() as $fuelType)
                                    <div class="col">
                                        <label class="inline-radio">
                                            <input type="radio" name="fuel_type_id"
                                                   value="{{$fuelType->id}}" @checked(old('fuel_type_id') == $fuelType->id)/>
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
                                    <select name="city_id">
                                        @foreach(\App\Models\City::all() as $city)
                                            <option
                                                value="{{$city->id}}" @selected(old('city_id') == $city->id)>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <x-form.input name="address" placeholder="Address">
                                    <label>Address</label>
                                </x-form.input>
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
                                            @checked(old('air_conditioning'))
                                        />
                                        Air Conditioning
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="power_windows"
                                               value="1" @checked(old('power_windows'))/>
                                        Power Windows
                                    </label>

                                    <label class="checkbox">
                                        <input
                                            type="checkbox"
                                            name="power_door_locks"
                                            value="1"
                                            @checked(old('power_door_locks'))
                                        />
                                        Power Door Locks
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="abs" value="1" @checked(old('abs'))/>
                                        ABS
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="cruise_control"
                                               value="1" @checked(old('cruise_control')) />
                                        Cruise Control
                                    </label>

                                    <label class="checkbox">
                                        <input
                                            type="checkbox"
                                            name="bluetooth_connectivity"
                                            value="1"
                                            @checked(old('bluetooth_connectivity'))
                                        />
                                        Bluetooth Connectivity
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="checkbox">
                                        <input type="checkbox" name="remote_start"
                                               value="1" @checked(old('remote_start'))/>
                                        Remote Start
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="gps_navigation"
                                               value="1" @checked(old('gps_navigation'))/>
                                        GPS Navigation System
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="heated_seats"
                                               value="1" @checked(old('heated_seats')) />
                                        Heated Seats
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="climate_control"
                                               value="1" @checked(old('climate_control'))/>
                                        Climate Control
                                    </label>

                                    <label class="checkbox">
                                        <input
                                            type="checkbox"
                                            name="rear_parking_sensors"
                                            value="1"
                                            @checked(old('rear_parking_sensors'))
                                        />
                                        Rear Parking Sensors
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="leather_seats"
                                               value="1" @checked(old('leather_seats'))/>
                                        Leather Seats
                                    </label>
                                </div>
                            </div>
                        </div>
                        <x-form.textarea name="description" label="Detailed Description" rows="10"/>
                        <div class="form-group">
                            <label class="checkbox">
                                <input type="checkbox" name="published" value="1" @checked(old('published'))/>
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
                            <input id="carFormImageUpload" type="file" multiple/>
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
<script>
    function getCities() {
        // TODO
    }
    console.log('todo')
</script>
