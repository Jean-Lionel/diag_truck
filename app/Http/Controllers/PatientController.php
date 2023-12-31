<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Models\Patient;
use App\Models\Diagnostic;
use App\Models\Prescription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PatientController extends Controller
{
    public function fiche_medicale(){
        $patients = Patient::all();
        return view('patient.fiche_medicale', compact('patients'));
    }
    public function index(Request $request)
    {
        $patients = Patient::all();
        return view('patient.index', compact('patients'));
    }

    public function create(Request $request)
    {
        $patient = new Patient;
        return view('patient.create', compact('patient'));
    }

    public function store(PatientStoreRequest $request)
    {

        $patient = Patient::create($request->validated());

       session()->flash('patient.id', $patient->id);

        return redirect()->route('patient.index');
    }

    public function show(Request $request, Patient $patient)
    {
       // dd($patient); groupBy('browser')
       $prescriptions = Prescription::where('patient_id', $patient->id)
                            ->get()->keyBy('created_at')->groupBy(function ($item) {
                return $item->created_at->format('Y-m-d');
            });

        $diagnostics = Diagnostic::where('patient_id', $patient->id)->get()->keyBy('created_at')->groupBy(function ($item) {
            return $item->created_at->format('Y-m-d');
        });
        //dump($prescriptions);
        return view('patient.show', compact('patient', 'prescriptions', 'diagnostics'));
    }

    public function edit(Request $request, Patient $patient)
    {
        return view('patient.edit', compact('patient'));
    }

    public function update(PatientUpdateRequest $request, Patient $patient)
    {

        $patient->update($request->validated());

        session()->flash('patient.id', $patient->id);

        return redirect()->route('patient.index');
    }

    public function destroy(Request $request, Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patient.index');
    }
}
