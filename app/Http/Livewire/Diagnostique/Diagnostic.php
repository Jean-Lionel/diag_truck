<?php

namespace App\Http\Livewire\Diagnostique;

use Livewire\Component;
use App\Models\Patient;

class Diagnostic extends Component
{
    public $numeroPatient;
    public $patient;
    public $diagnostique;
    public $contenu;
    public function render()
    {
        return view('livewire.diagnostique.diagnostic');
    }

    public function getPatient()
    {
        $this->patient = Patient::where('id', $this->numeroPatient)->first()->get();
    }

    public function saveDiagnostique()
    {
        Diagnostic::create([
            'patient_id' => $this->patient->id,
            'docteur_id' => auth()->user()->id,
            'contenu' => $this->contenu,
            'date_diag' => date('Y-m-d H:i:s'),
        ]);
    }
}