<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeMedicamentStoreRequest;
use App\Http\Requests\TypeMedicamentUpdateRequest;
use App\Models\TypeMedicament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TypeMedicamentController extends Controller
{
    public function index(Request $request): Response
    {
        $typeMedicaments = TypeMedicament::all();

        return view('typeMedicament.index', compact('typeMedicaments'));
    }

    public function create(Request $request): Response
    {
        return view('typeMedicament.create');
    }

    public function store(TypeMedicamentStoreRequest $request): Response
    {
        $typeMedicament = TypeMedicament::create($request->validated());

        $request->session()->flash('typeMedicament.id', $typeMedicament->id);

        return redirect()->route('typeMedicament.index');
    }

    public function show(Request $request, TypeMedicament $typeMedicament): Response
    {
        return view('typeMedicament.show', compact('typeMedicament'));
    }

    public function edit(Request $request, TypeMedicament $typeMedicament): Response
    {
        return view('typeMedicament.edit', compact('typeMedicament'));
    }

    public function update(TypeMedicamentUpdateRequest $request, TypeMedicament $typeMedicament): Response
    {
        $typeMedicament->update($request->validated());

        $request->session()->flash('typeMedicament.id', $typeMedicament->id);

        return redirect()->route('typeMedicament.index');
    }

    public function destroy(Request $request, TypeMedicament $typeMedicament): Response
    {
        $typeMedicament->delete();

        return redirect()->route('typeMedicament.index');
    }
}
