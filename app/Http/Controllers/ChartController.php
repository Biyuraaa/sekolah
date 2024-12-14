<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //
    public function attendanceData(Request $request)
    {
        // Data untuk Stacked Bar Chart
        $data = Absence::selectRaw("weeks.title AS week, 
                                    SUM(CASE WHEN status = 'present' THEN 1 ELSE 0 END) AS present,
                                    SUM(CASE WHEN status = 'absent' THEN 1 ELSE 0 END) AS absent,
                                    SUM(CASE WHEN status = 'late' THEN 1 ELSE 0 END) AS late")
            ->join('weeks', 'absences.week_id', '=', 'weeks.id')
            ->groupBy('weeks.title')
            ->get();

        // Data untuk Pie Chart
        $subjectId = $request->input('subject_id'); // Untuk filter
        $pieData = Absence::selectRaw("status, COUNT(*) AS count")
            ->join('weeks', 'absences.week_id', '=', 'weeks.id')
            ->where('weeks.classroom_subject_id', $subjectId)
            ->groupBy('status')
            ->get();

        return response()->json([
            'barChart' => $data,
            'pieChart' => $pieData,
        ]);
    }
}
