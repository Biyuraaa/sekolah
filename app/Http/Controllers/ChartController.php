<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\ClassroomSubject;
use App\Models\Payment;
use App\Models\StudentScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    //
    public function attendanceData()
    {
        $subjectData = Absence::select(
            'subjects.name AS subject',
            DB::raw('SUM(CASE WHEN absences.status = "present" THEN 1 ELSE 0 END) AS present'),
            DB::raw('SUM(CASE WHEN absences.status = "absent" THEN 1 ELSE 0 END) AS absent'),
            DB::raw('SUM(CASE WHEN absences.status = "late" THEN 1 ELSE 0 END) AS late')
        )
            ->join('weeks', 'absences.week_id', '=', 'weeks.id')
            ->join('classroom_subjects', 'weeks.classroom_subject_id', '=', 'classroom_subjects.id')
            ->join('subjects', 'classroom_subjects.subject_id', '=', 'subjects.id')
            ->groupBy('subjects.name')
            ->orderBy('subjects.name')
            ->get();

        $overallData = Absence::selectRaw("
            status, 
            COUNT(*) AS count
        ")
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status')
            ->toArray();

        // Ensure we have data for all statuses
        $statuses = ['present', 'absent', 'late'];
        foreach ($statuses as $status) {
            if (!isset($overallData[$status])) {
                $overallData[$status] = 0;
            }
        }

        $attendanceByYearLevel = Absence::select(
            'classrooms.year_level',
            DB::raw('SUM(CASE WHEN absences.status = "present" THEN 1 ELSE 0 END) AS present'),
            DB::raw('SUM(CASE WHEN absences.status = "absent" THEN 1 ELSE 0 END) AS absent'),
            DB::raw('SUM(CASE WHEN absences.status = "late" THEN 1 ELSE 0 END) AS late')
        )
            ->join('weeks', 'absences.week_id', '=', 'weeks.id')
            ->join('classroom_subjects', 'weeks.classroom_subject_id', '=', 'classroom_subjects.id')
            ->join('classrooms', 'classroom_subjects.classroom_id', '=', 'classrooms.id')
            ->groupBy('classrooms.year_level')
            ->orderBy('classrooms.year_level')
            ->get();



        return response()->json([
            'barChart' => [
                'categories' => $subjectData->pluck('subject'),
                'series' => [
                    ['name' => 'Present', 'data' => $subjectData->pluck('present')],
                    ['name' => 'Absent', 'data' => $subjectData->pluck('absent')],
                    ['name' => 'Late', 'data' => $subjectData->pluck('late')]
                ]
            ],
            'pieChart' => [
                'labels' => ['Present', 'Absent', 'Late'],
                'series' => array_values($overallData)
            ],
            'attendanceByYearLevel' => [
                'categories' => $attendanceByYearLevel->pluck('year_level'),
                'series' => [
                    ['name' => 'Present', 'data' => $attendanceByYearLevel->pluck('present')],
                    ['name' => 'Absent', 'data' => $attendanceByYearLevel->pluck('absent')],
                    ['name' => 'Late', 'data' => $attendanceByYearLevel->pluck('late')]
                ]
            ],
        ]);
    }

    public function paymentData()
    {
        $paymentMethods = Payment::groupBy('payment_method')
            ->select('payment_method', DB::raw('count(*) as count'))
            ->get();

        $monthlyPayments = Payment::select(
            DB::raw('CONCAT(MONTHNAME(STR_TO_DATE(month, "%M")), " ", year) as month_year'),
            DB::raw('SUM(amount) as total')
        )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy(DB::raw('FIELD(month, "january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december")'))
            ->get();


        $paymentStatus = Payment::groupBy('status')
            ->select('status', DB::raw('count(*) as count'))
            ->get();

        $totalAmount = (float) Payment::sum('amount');
        $totalPayments = Payment::count();

        return response()->json([
            'paymentMethods' => $paymentMethods,
            'monthlyPayments' => $monthlyPayments,
            'paymentStatus' => $paymentStatus,
            'totalAmount' => number_format($totalAmount, 2, '.', ''),
            'totalPayments' => $totalPayments
        ]);
    }

    public function progressData()
    {
        // Average student scores over years
        $averageScoresByYear = StudentScore::join('exams', 'student_scores.exam_id', '=', 'exams.id')
            ->selectRaw('YEAR(exams.date) as year, ROUND(AVG(student_scores.score), 2) as average_score')
            ->groupBy('year')
            ->orderBy('year')
            ->get()
            ->map(function ($item) {
                return [
                    'year' => $item->year,
                    'average_score' => (float) $item->average_score
                ];
            });

        // Average scores by subject during exams
        $averageScoresBySubject = StudentScore::join(
            'exams',
            'student_scores.exam_id',
            '=',
            'exams.id'
        )
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->selectRaw('subjects.name as subject, ROUND(AVG(student_scores.score), 2) as average_score')
            ->groupBy('subjects.id', 'subjects.name')
            ->orderBy('average_score', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'subject' => $item->subject,
                    'average_score' => (float) $item->average_score
                ];
            });

        // Distribution of scores across subjects (for radar chart)
        $scoreDistributionBySubject = StudentScore::join('exams', 'student_scores.exam_id', '=', 'exams.id')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->selectRaw('subjects.name as subject, 
                     AVG(CASE WHEN student_scores.score >= 90 THEN 1 ELSE 0 END) as excellent,
                     AVG(CASE WHEN student_scores.score >= 80 AND student_scores.score < 90 THEN 1 ELSE 0 END) as good,
                     AVG(CASE WHEN student_scores.score >= 70 AND student_scores.score < 80 THEN 1 ELSE 0 END) as average,
                     AVG(CASE WHEN student_scores.score < 70 THEN 1 ELSE 0 END) as below_average')
            ->groupBy('subjects.id', 'subjects.name')
            ->get();

        return response()->json([
            'averageScoresByYear' => $averageScoresByYear,
            'averageScoresBySubject' => $averageScoresBySubject,
            'scoreDistributionBySubject' => $scoreDistributionBySubject,
        ]);
    }

    public function consultationData()
    {
        $subjectStats = DB::table('appointments')
            ->join('consultations', 'appointments.consultation_id', '=', 'consultations.id')
            ->join('teachers', 'consultations.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teachers.subject_id', '=', 'subjects.id')
            ->select(
                'subjects.name as subject',
                DB::raw('COUNT(appointments.id) as consultation_count'),
                DB::raw('AVG(TIMESTAMPDIFF(MINUTE, consultations.start_time, consultations.end_time)) as average_duration')
            )
            ->groupBy('subjects.name')
            ->orderBy('consultation_count', 'desc')
            ->get()
            ->toArray(); // Konversi hasil menjadi array



        // Monthly trends
        $monthlyTrends = DB::table('appointments')
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Teacher consultation loads
        $teacherLoads = DB::table('appointments')
            ->join('consultations', 'appointments.consultation_id', '=', 'consultations.id')
            ->join('teachers', 'consultations.teacher_id', '=', 'teachers.id')
            ->join('users', 'teachers.user_id', '=', 'users.id') // Tambahkan join ke tabel `users`
            ->select(
                'users.name as teacher', // Ambil `name` dari tabel `users`
                DB::raw('COUNT(appointments.id) as total_consultations')
            )
            ->groupBy('users.name') // Group berdasarkan kolom `users.name`
            ->orderBy('total_consultations', 'desc')
            ->limit(10)
            ->get();


        return response()->json([
            'subject_statistics' => $subjectStats,
            'monthly_trends' => $monthlyTrends,
            'teacher_loads' => $teacherLoads,
        ]);
    }
}
