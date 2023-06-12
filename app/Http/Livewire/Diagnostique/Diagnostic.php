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
    public $diagnosctic_history;
    public function render()
    {
        return view('livewire.diagnostique.diagnostic');
    }
    public function getPatient()
    {
        $this->patient = Patient::where('id', $this->numeroPatient)->first();
        $this->updateDiagnostic();
    }
    private function updateDiagnostic(){
        $this->diagnosctic_history = \App\Models\Diagnostic::where('patient_id', $this->patient?->id)->take(50)->latest()->get();
    }
    public function saveDiagnostique()
    {
        $this->validate([
            'contenu' => 'required'
        ]);
        \App\Models\Diagnostic::create([
            'patient_id' => $this->patient->id,
            'docteur_id' => auth()->user()->id,
            'contenu' => $this->contenu,
            'date_diag' => date('Y-m-d H:i:s'),
        ]);
        $this->contenu = "";
        $this->updateDiagnostic();

    }
}
