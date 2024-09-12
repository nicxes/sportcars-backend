<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use acidjazz\metapi\MetApi;

use App\Models\Vehicle;

class VehicleController extends Controller
{
    use MetApi;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return $this->render($vehicles);
    }
}
