<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $facilities = Facility::paginate();
        $totalFacilities = Facility::count();
        $availableFacilities = Facility::where("status", "available")->count();
        $facilitiesInMaintenance = Facility::where("status", "maintenance")->count();
        $unavailableFacilities = Facility::where("status", "unavailable")->count();
        return view("dashboard.admin.facilities.index", compact(
            "facilities",
            "totalFacilities",
            "availableFacilities",
            "facilitiesInMaintenance",
            "unavailableFacilities",

        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        if (Auth::user()->role != "admin") {
            return redirect()->route("facilities.index")->with("error", "Unauthorized action.");
        }

        return view("dashboard.admin.facilities.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacilityRequest $request)
    {
        //

        $request->validated();

        try {
            Facility::create($request->all());
            return redirect()->route("facilities.index")->with("success", " Facility created successfully");
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->route("facilities.create")->with("error", "Failed to create facility: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        //
        $totalBookings = $facility->facilitySchedules()->where("status", "approved")->count();
        $schedules = $facility->facilitySchedules()->paginate(10);
        $approvedBookings = $facility->facilitySchedules()->where("status", "approved")->count();
        $pendingBookings = $facility->facilitySchedules()->where("status", "pending")->count();
        $rejectedBookings = $facility->facilitySchedules()->where("status", "rejected")->count();
        return view("dashboard.admin.facilities.show", compact(
            "facility",
            "totalBookings",
            "schedules",
            "approvedBookings",
            "pendingBookings",
            "rejectedBookings"
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        //
        if (Auth::user()->role != "admin") {
            return redirect()->route("facilities.index")->with("error", "Unauthorized action.");
        }
        return view("dashboard.admin.facilities.edit", compact("facility"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacilityRequest $request, Facility $facility)
    {
        //
        $request->validated();
        try {
            $facility->update($request->all());
            return redirect()->route("facilities.index")->with("success", "Facility updated successfully");
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->route("facilities.edit", $facility)->with("error", "Failed to update facility: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        //
        if (Auth::user()->role != "admin") {
            return redirect()->route("facilities.index")->with("error", "Unauthorized action.");
        }

        try {
            $facility->delete();
            return redirect()->route("facilities.index")->with("success", " Facility deleted successfully");
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->route("facilities.index", $facility)->with("error" . $e->getMessage());
        }
    }
}
