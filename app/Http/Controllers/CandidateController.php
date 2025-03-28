<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function markAbsent(Request $request, $candidate_id)
    {
        $candidate = Candidate::where('id', $candidate_id)->firstOrFail();
        $candidate->status = "absent";
        $candidate->save();
        return redirect()->route('all-candidates');
    }
}
