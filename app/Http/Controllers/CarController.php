<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    /**
     * Display a listing of the cars.
     */
    public function index()
    {
        $cars = Cars::all();
        return ApiResponse::success($cars, 'Cars retrieved successfully');
    }

    /**
     * Store a newly created car in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_cars' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|date_format:Y-m-d',
        ]);

        $car = Cars::create($validated);

        return ApiResponse::success($car, 'Car created successfully', Response::HTTP_CREATED);
    }

    /**
     * Display the specified car.
     */
    public function show($id)
    {
        $car = Cars::find($id);

        if ($car) {
            return ApiResponse::success($car, 'Car retrieved successfully');
        } else {
            return ApiResponse::error('Car not found', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified car in the database.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_cars' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|date_format:Y-m-d',
        ]);

        $car = Cars::find($id);

        if ($car) {
            $car->update($validated);
            return ApiResponse::success($car, 'Car updated successfully');
        } else {
            return ApiResponse::error('Car not found', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified car from the database.
     */
    public function destroy($id)
    {
        $car = Cars::find($id);

        if ($car) {
            $car->delete();
            return ApiResponse::success(null, 'Car deleted successfully');
        } else {
            return ApiResponse::error('Car not found', Response::HTTP_NOT_FOUND);
        }
    }
}
