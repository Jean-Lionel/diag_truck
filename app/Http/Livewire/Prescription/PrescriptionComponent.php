<?php

namespace App\Http\Livewire\Prescription;

use Livewire\Component;
use App\Models\Patient;

class PrescriptionComponent extends Component
{
    public $patientID;
    public function render()
    {
    $patients = Patient::latest()->get();

        return view('livewire.prescription.prescription-component', [
            'patients' => $patients
        ]);
    }

    public function getPrescription(){
        dd('prescription');
    }
}
