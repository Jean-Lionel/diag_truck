<?php

namespace App\Http\Livewire\Diagnostique;

use Livewire\Component;
use App\Models\Patient;

class Diagnostic extends Component
{
    public $numeroPatient;
    public function render()
    {
        return view('livewire.diagnostique.diagnostic');
    }

    public function getPatient()
    {
        $patient = Patient::where('id', $this->numeroPatient)->first()->get();

        dd($patient);
    }
}