<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Candidate;

class CandidateComponent extends Component
{
    public $candidates;

    public function mount()
    {
        $this->candidates = Candidate::all();
    }

    public function render()
    {
        return view('livewire.auth.candidate-component');
    }
}