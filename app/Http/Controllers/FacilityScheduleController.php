<?php

namespace App\Http\Controllers;

use App\Models\FacilitySchedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacilityScheduleRequest;
use App\Http\Requests\UpdateFacilityScheduleRequest;
use Illuminate\Support\Facades\Auth;

class FacilityScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        if (Auth::user()->role != "admin") {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to access this page');
        } else {
            $facilitySchedules = FacilitySchedule::paginate(10);
            $totalBookings = FacilitySchedule::count();
            $approvedBookings = FacilitySchedule::where('status', 'approved')->count();
            $pendingBookings = FacilitySchedule::where('status', 'booking')->count();
            $rejectedBookings = FacilitySchedule::where('status', 'rejected')->count();
            return view('dashboard.admin.facilitySchedules.index', compact(
                'facilitySchedules',
                "totalBookings",
                "approvedBookings",
                "pendingBookings",
                "rejectedBookings"
            ));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacilityScheduleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FacilitySchedule $facilitySchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FacilitySchedule $facilitySchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacilityScheduleRequest $request, FacilitySchedule $facilitySchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FacilitySchedule $facilitySchedule)
    {
        //
    }
}
