<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrescriptionStoreRequest;
use App\Http\Requests\PrescriptionUpdateRequest;
use App\Models\Prescription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PrescriptionController extends Controller
{
    public function index(Request $request): View
    {
        $prescriptions = Prescription::all();

        return view('prescription.index', compact('prescriptions'));
    }

    public function create(Request $request): View
    {
        return view('prescription.create');
    }

    public function store(PrescriptionStoreRequest $request)
    {
        $prescription = Prescription::create($request->validated());

        session()->flash('prescription.id', $prescription->id);

        return redirect()->route('prescription.index');
    }

    public function show(Request $request, Prescription $prescription): View
    {
        return view('prescription.show', compact('prescription'));
    }

    public function edit(Request $request, Prescription $prescription): View
    {
        return view('prescription.edit', compact('prescription'));
    }

    public function update(PrescriptionUpdateRequest $request, Prescription $prescription)
    {
        $prescription->update($request->validated());

        session()->flash('prescription.id', $prescription->id);

        return redirect()->route('prescription.index');
    }

    public function destroy(Request $request, Prescription $prescription)
    {
        $prescription->delete();

        return redirect()->route('prescription.index');
    }
}