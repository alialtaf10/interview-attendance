<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Candidate;
use Carbon\Carbon;

class AttendanceReport extends Component
{
    public $date;
    public $candidates = [];

    public function mount()
    {
        $this->date = Carbon::today()->format('Y-m-d'); // Ensure correct format
        $this->fetchCandidates();
    }

    public function filterCandidates() // Called when form is submitted
    {
        $this->fetchCandidates();
    }

    private function fetchCandidates()
    {
        $this->candidates = Candidate::where('status', 'attended')
            ->whereDate('interview_date', $this->date) // Ensure correct column match
            ->get();
    }

    public function render()
    {
        return view('livewire.auth.attendance-report');
    }
}