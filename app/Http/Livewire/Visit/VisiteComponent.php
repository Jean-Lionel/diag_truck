<?php

namespace App\Http\Livewire\Visit;

use App\Models\Assignation;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class VisiteComponent extends Component
{
    public $numberId;
    public $docteurId;
    public $docteurs;
    public $patient;

    protected $rules = [
        'docteurId' => 'required',
        'numberId' => 'required',
    ];

    public function mount(){
        $this->docteurs = User::where('role_name', 'DOCTEUR')->get();
    }
    public function render()
    {
        return view('livewire.visit.visite-component');
    }

    public function searChPatient(){
        $this->patient = Patient::where('id', '=', $this->numberId)
        ->first();
    }

    public function saveVisite(){
       // dd($this->docteurId);
        $this->validate($this->rules);
        $assignation = Assignation::create([
        'patient_id' => $this->patient->id,
        'infirmier_id' => $this->docteurId,
        'docteur_id' => $this->docteurId,
        'date_assignation' => Carbon::now(),
        ]);

        return redirect()->route('assignation.index');
    }
}
