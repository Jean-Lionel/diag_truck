<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentStoreRequest;
use App\Http\Requests\MedicamentUpdateRequest;
use App\Models\Medicament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MedicamentController extends Controller
{
    public function index(Request $request)
    {
        $medicaments = Medicament::all();
       // dd($medicaments );

        return view('medicament.index', compact('medicaments'));
    }

    public function create(Request $request)
    {
        return view('medicament.create');
    }

    public function store(MedicamentStoreRequest $request)
    {
        $medicament = Medicament::create($request->validated());

       session()->flash('medicament.id', $medicament->id);

        return redirect()->route('medicament.index');
    }

    public function show(Request $request, Medicament $medicament)
    {
        return view('medicament.show', compact('medicament'));
    }

    public function edit(Request $request, Medicament $medicament)
    {
        return view('medicament.edit', compact('medicament'));
    }

    public function update(MedicamentUpdateRequest $request, Medicament $medicament)
    {
        $medicament->update($request->validated());

        session()->flash('medicament.id', $medicament->id);

        return redirect()->route('medicament.index');
    }

    public function destroy(Request $request, Medicament $medicament)
    {
        $medicament->delete();

        return redirect()->route('medicament.index');
    }
}
