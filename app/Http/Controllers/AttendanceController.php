<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function checkIn(Request $request, $candidate_id)
    {
        // Find the candidate or throw an error if not found
        $candidate = Candidate::findOrFail($candidate_id);

        // Check if an attendance record already exists for this candidate
        $attendance = Attendance::where('candidate_id', $candidate->id)->first();

        if ($attendance) {
            // Flash a message if the candidate has already checked in
            return redirect()->route('all-candidates')->with('error', 'Candidate has already checked in.');
        }

        // Update the candidate's status
        $candidate->status = 'attended';
        $candidate->save();

        // Create a new attendance record
        Attendance::create([
            'candidate_id' => $candidate->id,
            'check_in' => now(),
        ]);

        return redirect()->route('all-candidates')->with('success', 'Check-in successful.');
    }


    public function checkOut(Request $request, $candidate_id)
    {
        $candidate = Candidate::findOrFail($candidate_id);
        $attendance = Attendance::where('candidate_id', $candidate->id)->first();
        $attendance->check_out = now();
        $attendance->save();

        return redirect()->route('all-candidates')->with('success', 'Check-out successful.');
    }

}
