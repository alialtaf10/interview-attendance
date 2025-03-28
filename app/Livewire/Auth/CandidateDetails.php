<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Candidate;

class CandidateDetails extends Component
{
    public $candidateId;
    public $candidate;

    public function mount($candidateId)
    {
        $this->candidateId = $candidateId;
        $this->fetchCandidate();
    }

    private function fetchCandidate()
    {
        $this->candidate = Candidate::find($this->candidateId);
    }

    public function render()
    {
        return view('livewire.auth.candidate-details');
    }
}
