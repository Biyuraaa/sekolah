<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == "admin") {
            // Paginate data for display
            $positions = Position::paginate(10);

            // Count total positions
            $positionsCount = Position::count();

            // Calculate statistics
            $averageBaseSalary = number_format(Position::avg('base_salary'), 0, ',', '.');
            $averageAllowance = number_format(Position::avg('allowance'), 0, ',', '.');
            $highestBaseSalary = number_format(
                Position::selectRaw('MAX(base_salary + allowance) as total_salary')
                    ->value('total_salary'),
                0,
                ',',
                '.'
            );

            return view("dashboard.admin.positions.index", compact(
                "positions",
                "positionsCount",
                "averageBaseSalary",
                "averageAllowance",
                "highestBaseSalary"
            ));
        }

        abort(403, 'Unauthorized action.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Auth::user()->role == 'admin') {
            return view('dashboard.admin.positions.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request)
    {
        //

        $request->validated();

        try {
            Position::create($request->all());

            return redirect()->route('positions.index')->with('success', ' Position created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('positions.create')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
        if (Auth::user()->role == 'admin') {
            return view('dashboard.admin.positions.show', compact('position'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
        if (Auth::user()->role == 'admin') {
            return view('dashboard.admin.positions.edit', compact('position'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, Position $position)
    {
        $request->validated();

        try {
            $position->update($request->all());

            return redirect()->route('positions.index')->with('success', 'Position updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('positions.edit', $position)->with('error', $e->getMessage());
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
        if (Auth::user()->role == 'admin') {
            $position->delete();
            return redirect()->route('positions.index')->with('success', ' Position deleted successfully.');
        }
    }
}
