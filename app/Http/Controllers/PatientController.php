<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Models\Patient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::all();

        return view('patient.index', compact('patients'));
    }

    public function create(Request $request)
    {
        return view('patient.create');
    }

    public function store(PatientStoreRequest $request)
    {
        $patient = Patient::create($request->validated());

       session()->flash('patient.id', $patient->id);

        return redirect()->route('patient.index');
    }

    public function show(Request $request, Patient $patient)
    {
        return view('patient.show', compact('patient'));
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
