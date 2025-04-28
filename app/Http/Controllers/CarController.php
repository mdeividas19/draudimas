<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\CarPhoto;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $car = new Car();
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car, Request $request)
    {
        if (!$request->user()->can('modifyCar', $car)) {
            return redirect()->route('cars.index');
        }
        $owners = Owner::all();
        return view('cars.edit', compact('car', 'owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        if (!$request->user()->can('modifyCar', $car)) {
            return redirect()->route('cars.index');
        }
        if ($request->hasFile('photos'))
        {
            foreach ($request->file('photos') as $photo)
            {
                $path = $photo->store('car_photos', 'public');
                CarPhoto::create(['car_id'=>$car->id, 'photo_path'=>$path]);
            }
        }
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car, Request $request)
    {
        if (!$request->user()->can('modifyCar', $car)) {
            return redirect()->route('cars.index');
        }
        $car->delete();
        return redirect()->route('cars.index');
    }

    public function deletePhoto(CarPhoto $photo)
    {
        Storage::disk('public')->delete($photo->photo_path);
        $photo->delete();
        return redirect()->back();
    }
}
