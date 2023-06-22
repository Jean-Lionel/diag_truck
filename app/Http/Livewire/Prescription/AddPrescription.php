<?php

namespace App\Http\Livewire\Prescription;

use Livewire\Component;
use App\Models\Medicament;
use App\Models\Prescription;
class AddPrescription extends Component
{
    public $medicament;
    public $dose;
    public $showForm = false;
    public $patientId;

    public function mount($patientId){
        $this->patientId = $patientId;
    }
    public function openForm(){
        $this->showForm = !$this->showForm;
    }

    public function savePrescription(){
        Prescription::create([
            'diag_id' => 1,
            'patient_id' => $this->patientId,
            'med_id' => $this->medicament,
            'dose' => $this->dose,
        ]);
        $this->openForm();
    }
    public function render()
    {
        $medicaments = Medicament::all();
        $prescriptions = Prescription::where('patient_id', $this->patientId)->get();
        return view('livewire.prescription.add-prescription', [
            'medicaments' => $medicaments,
            'prescriptions' => $prescriptions,
        ]);
    }
}
