<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\CarFeatures;
use App\Models\CarImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: ->paginate(15)->appends(['sort' => 'filter']);
        $userId = Auth::user()->id;
        $cars = User::find($userId)->cars()->orderBy('created_at', 'desc')->paginate(15);
        return view('car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        $car = Car::create($validated);
        $car->features()->create($validated);
        $car->images()->create(CarImage::factory()->sequence(['position'=>1], 'images')->raw());
        //$car->images()->create(CarImage::factory()->raw());
        return redirect()->route('car.show', $car);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        // TODO
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        dd('teszt');
    }
    public function search(Request $request) { // TODO
        $query = Car::query();
        $query->where('published_at', '<', now());

        $queryParams = $request->query();

        // Ordering
        $sortParam = $request->query('sort', '');
        $direction = str_starts_with($sortParam, '-') ? 'desc' : 'asc';
        $column = ltrim($sortParam, '-');
        if (!empty($column)) {
            $query->orderBy($column, $direction);
        }

        // Filtering
        $filterable=['maker_id', 'model_id', 'car_type_id', 'year_from', 'year_to', 'price_from', 'price_to', 'mileage', 'state_id', 'city_id', 'fuel_type_id'];
        foreach ($filterable as $param) {
            if ($request->filled($param)) {
                $query->where($param, $request->query($param));
            }
        }

        $cars = $query->paginate(15);

        return view('car.search', compact('cars'));
    }

    public function watchlist() {
        $userId = Auth::user()->id;
        $cars = User::find($userId)->favouriteCars()->paginate(15);
        return view('car.watchlist', compact('cars'));
    }

    public function like(int $id) {
        $user = Auth::user();
        $user->favouriteCars()->attach($id);
        return redirect()->back();
    }
}
