<x-app-layout title="Search Car">
    <main>
        <!-- Found Cars -->
        <section>
            <div class="container">
                <div class="sm:flex items-center justify-between mb-medium">
                    <div class="flex items-center">
                        <button class="show-filters-button flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" style="width: 20px">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
                            </svg>
                            Filters
                        </button>
                        <h2>Define your search criteria</h2>
                    </div>

                    <select class="sort-dropdown">
                        <option value="">Order By</option>
                        <option value="price">Price Asc</option>
                        <option value="-price">Price Desc</option>
                    </select>
                </div>
                <div class="search-car-results-wrapper">
                    <div class="search-cars-sidebar">
                        <div class="card card-found-cars">
                            <p class="m-0">Found <strong>{{$cars->total()}}</strong> cars</p>

                            <button class="close-filters-button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 24px">
                                    <path fill-rule="evenodd"
                                          d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                                          clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!-- Find a car form -->
                        <section class="find-a-car">
                            <form action="{{route('car.search')}}" method="GET" class="find-a-car-form card flex p-medium">
                                <div class="find-a-car-inputs">
                                    <div class="form-group">
                                        <label class="mb-medium">Maker</label>
                                        <select id="makerSelect" name="maker_id">
                                            <option value="" style="display: block">Maker</option>
                                            @foreach(\App\Models\Maker::all() as $maker)
                                                <option value="{{$maker->id}}">{{$maker->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-medium">Model</label>
                                        <select id="modelSelect" name="model_id">
                                            <option value="" style="display: block">Model</option>
                                            @foreach(\App\Models\Model::all() as $model)
                                                <option value="{{$model->id}}">{{$model->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-medium">Type</label>
                                        <select name="car_type_id">
                                            <option value="">Type</option>
                                            <option value="2">Hatchback</option>
                                            <option value="6">Jeep</option>
                                            <option value="5">Minivan</option>
                                            <option value="4">Pickup Truck</option>
                                            <option value="3">SUV</option>
                                            <option value="1">Sedan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-medium">Year</label>
                                        <div class="flex gap-1">
                                            <input type="number" placeholder="Year From" name="year_from" />
                                            <input type="number" placeholder="Year To" name="year_to" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-medium">Price</label>
                                        <div class="flex gap-1">
                                            <input type="number" placeholder="Price From" name="price_from" />
                                            <input type="number" placeholder="Price To" name="price_to" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-medium">Mileage</label>
                                        <div class="flex gap-1">
                                            <select name="mileage">
                                                <option value="">Any Mileage</option>
                                                <option value="10000">10,000 or less</option>
                                                <option value="20000">20,000 or less</option>
                                                <option value="30000">30,000 or less</option>
                                                <option value="40000">40,000 or less</option>
                                                <option value="50000">50,000 or less</option>
                                                <option value="60000">60,000 or less</option>
                                                <option value="70000">70,000 or less</option>
                                                <option value="80000">80,000 or less</option>
                                                <option value="90000">90,000 or less</option>
                                                <option value="100000">100,000 or less</option>
                                                <option value="150000">150,000 or less</option>
                                                <option value="200000">200,000 or less</option>
                                                <option value="250000">250,000 or less</option>
                                                <option value="300000">300,000 or less</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-medium">State</label>
                                        <select id="stateSelect" name="state_id">
                                            <option value="">State/Region</option>
                                            <option value="4">California</option>
                                            <option value="2">Kansas</option>
                                            <option value="1">Ohio</option>
                                            <option value="5">Oregon</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-medium">City</label>
                                        <select id="citySelect" name="city_id">
                                            <option value="" style="display: block">City</option>
                                            <option value="3" data-parent="1" style="display: none">
                                                Carmelstad
                                            </option>
                                            <option value="8" data-parent="2" style="display: none">
                                                Cormierville
                                            </option>
                                            <option value="14" data-parent="3" style="display: none">
                                                Dareville
                                            </option>
                                            <option value="13" data-parent="3" style="display: none">
                                                Demarcotown
                                            </option>
                                            <option value="10" data-parent="2" style="display: none">
                                                Doylebury
                                            </option>
                                            <option value="18" data-parent="4" style="display: none">
                                                East Alfonso
                                            </option>
                                            <option value="9" data-parent="2" style="display: none">
                                                East Ladarius
                                            </option>
                                            <option value="23" data-parent="5" style="display: none">
                                                Kelvinmouth
                                            </option>
                                            <option value="24" data-parent="5" style="display: none">
                                                Kemmerchester
                                            </option>
                                            <option value="25" data-parent="5" style="display: none">
                                                Kunzeview
                                            </option>
                                            <option value="6" data-parent="2" style="display: none">
                                                Lake Kelsi
                                            </option>
                                            <option value="16" data-parent="4" style="display: none">
                                                Larsonview
                                            </option>
                                            <option value="2" data-parent="1" style="display: none">
                                                Lindstad
                                            </option>
                                            <option value="5" data-parent="1" style="display: none">
                                                Loganshire
                                            </option>
                                            <option value="15" data-parent="3" style="display: none">
                                                Maximilliaberg
                                            </option>
                                            <option value="7" data-parent="2" style="display: none">
                                                Monroeside
                                            </option>
                                            <option value="17" data-parent="4" style="display: none">
                                                Muellerville
                                            </option>
                                            <option value="12" data-parent="3" style="display: none">
                                                New Bennieville
                                            </option>
                                            <option value="1" data-parent="1" style="display: none">
                                                New Britneystad
                                            </option>
                                            <option value="21" data-parent="5" style="display: none">
                                                New Devenmouth
                                            </option>
                                            <option value="22" data-parent="5" style="display: none">
                                                North Alvah
                                            </option>
                                            <option value="20" data-parent="4" style="display: none">
                                                Port Johnson
                                            </option>
                                            <option value="19" data-parent="4" style="display: none">
                                                South Shanellefort
                                            </option>
                                            <option value="11" data-parent="3" style="display: none">
                                                Toyport
                                            </option>
                                            <option value="4" data-parent="1" style="display: none">
                                                West Lulu
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-medium">Fuel Type</label>
                                        <select name="fuel_type_id">
                                            <option value="">Fuel Type</option>
                                            <option value="2">Diesel</option>
                                            <option value="3">Electric</option>
                                            <option value="1">Gasoline</option>
                                            <option value="4">Hybrid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button type="reset" class="btn btn-find-a-car-reset">
                                        Reset
                                    </button>
                                    <button class="btn btn-primary btn-find-a-car-submit">
                                        Search
                                    </button>
                                </div>
                            </form>
                        </section>
                        <!--/ Find a car form -->
                    </div>

                    <div class="search-cars-results">
                        <div class="car-items-listing">
                            @foreach($cars as $car)
                                <x-car-item :$car/>
                            @endforeach
                        </div>
                        {{$cars->onEachSide(1)->links()}}
                    </div>
                </div>
            </div>
        </section>
        <!--/ Found Cars -->
    </main>
</x-app-layout>
