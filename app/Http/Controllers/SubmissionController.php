<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreSubmissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubmissionRequest $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }

    public function grade(Request $request, Submission $submission)
    {
        $validated = $request->validate([
            'grade' => 'required|integer|min:0|max:100',
            'notes' => 'nullable|string|max:500',
        ]);

        $submission->update([
            'grade' => $validated['grade'],
            'notes' => $validated['notes'],
        ]);

        return back()->with('success', 'Nilai berhasil disimpan.');
    }



    public function fetchSubmission(Submission $submission)
    {
        return response()->json($submission);
    }

    public function submit(Request $request, Submission $submission)
    {
        $validated = $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        try {
            $userName = str_replace(' ', '_', Auth::user()->name);
            $originalExtension = $request->file('file')->getClientOriginalExtension();
            $fileName = "{$userName}_" . time() . ".{$originalExtension}";

            if ($submission->file_path) {
                $oldFilePath = 'stprage/files/submissions/' . $submission->file_path;
                if (Storage::exists($oldFilePath)) {
                    $result = Storage::delete($oldFilePath);
                }
            }

            $path = $request->file('file')->storeAs(
                'files/submissions',
                $fileName,
                'public'
            );

            if (!$path) {
                throw new \Exception('Failed to store file');
            }

            $task = $submission->task;
            $classroomSubject = $task->week->classroomSubject;
            $submittedAt = now();
            $status = $submittedAt->greaterThan($task->due_date) ? 'late' : 'submitted';

            $submission->update([
                'file_path' => $fileName,
                'submitted_at' => $submittedAt,
                'status' => $status,
            ]);

            return redirect()->route('classroomSubjects.tasks.assign', [$classroomSubject, $task])->with('success', 'Assignment submitted successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to submit assignment. Please try again later.']);
        }
    }
}
