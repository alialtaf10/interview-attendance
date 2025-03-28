<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Candidate;


class AddCandidate extends Component
{
    public $name, $email, $phone, $interview_date;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:candidates,email',
        'phone' => 'required|string|max:20',
        'interview_date' => 'required|date',
    ];

    public function store()
    {
        $this->validate();

        Candidate::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'interview_date' => $this->interview_date,
        ]);

        session()->flash('message', 'Candidate added successfully!');
        return redirect()->route('all-candidates');
    }

    public function render()
    {
        return view('livewire.auth.add-candidate');
    }
}
