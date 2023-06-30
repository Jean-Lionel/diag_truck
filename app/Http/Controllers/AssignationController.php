<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignationStoreRequest;
use App\Http\Requests\AssignationUpdateRequest;
use App\Models\Assignation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssignationController extends Controller
{
    public function index(Request $request): View
    {
        $assignations = Assignation::where('docteur_id',  auth()->user()->id)->latest()->get();

        if(auth()->user()->isAdmin() || auth()->user()->isInfirmier()){
            $assignations = Assignation::latest()->get();

        }

        return view('assignation.index', compact('assignations'));
    }

    public function create(Request $request): View
    {
        return view('assignation.create');
    }

    public function store(AssignationStoreRequest $request)
    {
        $assignation = Assignation::create($request->validated());

        session()->flash('assignation.id', $assignation->id);

        return redirect()->route('assignation.index');
    }

    public function show(Request $request, Assignation $assignation): View
    {
        return view('assignation.show', compact('assignation'));
    }

    public function edit(Request $request, Assignation $assignation): View
    {
        return view('assignation.edit', compact('assignation'));
    }

    public function update(AssignationUpdateRequest $request, Assignation $assignation)
    {
        $assignation->update($request->validated());

        session()->flash('assignation.id', $assignation->id);

        return redirect()->route('assignation.index');
    }

    public function destroy(Request $request, Assignation $assignation)
    {
        $assignation->delete();

        return redirect()->route('assignation.index');
    }
}
