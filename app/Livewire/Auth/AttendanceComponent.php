<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Candidate;
use Carbon\Carbon;

class AttendanceComponent extends Component
{

    public $candidateId, $time, $actionType, $modalTitle, $timeLabel;

    protected $listeners = ['openModal'];

    public function openModal($candidateId, $type)
    {
        $this->candidateId = $candidateId;
        $this->actionType = $type;
        $this->modalTitle = $type === 'checkin' ? 'Mark Check-in' : 'Mark Check-out';
        $this->timeLabel = $type === 'checkin' ? 'Check-in Time:' : 'Check-out Time:';
        $this->time = now()->format('Y-m-d\TH:i'); // Default to current time

        $this->dispatchBrowserEvent('show-modal');
    }

    public function markTime()
    {
        $this->validate([
            'time' => 'required|date',
            'candidateId' => 'required|exists:candidates,id',
        ]);

        $candidate = Candidate::findOrFail($this->candidateId);
        $time = Carbon::parse($this->time);

        if ($this->actionType === 'checkin') {
            $candidate->check_in_time = $time;
        } else {
            $candidate->check_out_time = $time;
        }

        $candidate->save();

        $this->dispatchBrowserEvent('hide-modal');
        session()->flash('message', ucfirst($this->actionType) . ' marked successfully.');
        $this->emit('refreshTable'); // Refresh Livewire table if needed
    }
    public function render()
    {
        return view('livewire.auth.attendance-component');
    }
}