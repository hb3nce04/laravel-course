<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CarImageFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CarType::factory()->sequence(
            ['name' => 'Sedan'],
            ['name' => 'Hatchback'],
            ['name' => 'SUV'],
            ['name' => 'Pickup Truck'],
            ['name' => 'Minivan'],
            ['name' => 'Jeep'],
            ['name' => 'Coupe'],
            ['name' => 'Crossover'],
            ['name' => 'Sports Car'])->count(9)->create();

        FuelType::factory()->sequence(
            ['name' => 'Gasoline'],
            ['name' => 'Diesel'],
            ['name' => 'Electric'],
            ['name' => 'Hybrid'])->count(4)->create();

        $states = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego'],
            'Texas' => ['Houston', 'San Antonio', 'Dallas', 'Austin'],
            'Florida' => ['Miami', 'Orlando', 'Tampa', 'Jacksonville'],
            'New York' => ['New York City', 'Buffalo', 'Rochester'],
            'Illinois' => ['Chicago', 'Aurora', 'Naperville', 'Joliet'],
            'Pennsylvania' => ['Philadelphia', 'Pittsburgh', 'Allentown'],
            'Ohio' => ['Columbus', 'Cleveland', 'Cincinnati', 'Toledo'],
            'Georgia' => ['Atlanta', 'Augusta', 'Colombus', 'Savannah'],
            'North Carolina' => ['Charlotte', 'Raleigh', 'Greensboro'],
            'Michigan' => ['Detroit', 'Grand Rapids', 'Warren']
        ];
        foreach ($states as $state => $cities) {
            State::factory()->state(['name' => $state])->has(City::factory()->count(count($cities)))->sequence(...array_map(fn($city) => ['name' => $city], $cities))->create();
        }

        $makers = [
            'Toyota' => ['Camry', 'Corolla', 'Highlander', 'RAV4', 'Prius'],
            'Ford' => ['F-150', 'Escape', 'Explorer', 'Mustang', 'Fusion'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'Odyssey'],
            'Chevrolet' => ['Silverado', 'Equinox', 'Malibu', 'Impala'],
            'Nissan' => ['Altima', 'Sentra', 'Rogue', 'Maxima', 'Muarano'],
            'Lexus' => ['RX400', 'RX450', 'RX350', 'ES350', 'LS500', 'IS300']
        ];
        foreach ($makers as $maker => $models) {
            Maker::factory()->state(['name' => $state])->has(Model::factory()->count(count($models)))->sequence(...array_map(fn($model) => ['name' => $model], $models))->create();
        }

        User::factory()->count(3)->create();

        User::factory()->count(2)->has(Car::factory()->count(50)->has(CarImage::factory()->count(5)->sequence(['position'=>1], ['position'=>2], ['position'=>3], ['position'=>4], ['position'=>5]), 'images')->hasFeatures(), 'favouriteCars')->create();
    }
}
