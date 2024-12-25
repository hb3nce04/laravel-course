<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $currentYear = date("Y");
        return [
            'maker_id' => 'required|integer',
            'model_id' => 'required|integer',
            'year' => "required|integer|min:1950|max:$currentYear",
            'car_type_id' => 'required|integer',
            'price' => 'required|integer',
            'vin' => 'required|integer',
            'mileage' => 'required|integer',
            'fuel_type_id' => 'required|integer',
            'city_id' => 'required|integer',
            'address' => 'required|string',
            'description' => 'required|string',
            'published' => 'boolean',
            'air_conditioning' => 'boolean',
            'power_windows' => 'boolean',
            'power_door_locks' => 'boolean',
            'abs' => 'boolean',
            'cruise_control' => 'boolean',
            'bluetooth_connectivity' => 'boolean',
            'remote_start' => 'boolean',
            'gps_navigation' => 'boolean',
            'heated_seats' => 'boolean',
            'climate_control' => 'boolean',
            'rear_parking_sensors' => 'boolean',
            'leather_seats' => 'boolean',
        ];
    }
}
