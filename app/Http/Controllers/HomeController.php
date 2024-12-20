<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\Maker;
use App\Models\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index() {
        $model = Model::factory()->count(5)->for(Maker::factory()->state(['name'=>'Lexus']));
        dd($model);
        return view('home.index');
    }
}
