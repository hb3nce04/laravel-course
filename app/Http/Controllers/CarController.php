<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
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
        return "asd";
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
        return view('car.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        dd('teszt');
    }
    public function search() {
        $query = Car::where('published_at', '<', now())->orderBy('published_at', 'desc');
        $cars = $query->paginate(15);
        return view('car.search', compact('cars'));
    }

    public function watchlist() {
        $userId = Auth::user()->id;
        $cars = User::find($userId)->favouriteCars()->paginate(15);
        return view('car.watchlist', compact('cars'));
    }
}
