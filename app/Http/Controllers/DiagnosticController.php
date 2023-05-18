<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosticStoreRequest;
use App\Http\Requests\DiagnosticUpdateRequest;
use App\Models\Diagnostic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiagnosticController extends Controller
{
    public function index(Request $request): View
    {
        $diagnostics = Diagnostic::all();

        return view('diagnostic.index', compact('diagnostics'));
    }

    public function create(Request $request): View
    {
        return view('diagnostic.create');
    }

    public function store(DiagnosticStoreRequest $request)
    {
        $diagnostic = Diagnostic::create($request->validated());

        session()->flash('diagnostic.id', $diagnostic->id);

        return redirect()->route('diagnostic.index');
    }

    public function show(Request $request, Diagnostic $diagnostic): View
    {
        return view('diagnostic.show', compact('diagnostic'));
    }

    public function edit(Request $request, Diagnostic $diagnostic): View
    {
        return view('diagnostic.edit', compact('diagnostic'));
    }

    public function update(DiagnosticUpdateRequest $request, Diagnostic $diagnostic)
    {
        $diagnostic->update($request->validated());

        session()->flash('diagnostic.id', $diagnostic->id);

        return redirect()->route('diagnostic.index');
    }

    public function destroy(Request $request, Diagnostic $diagnostic)
    {
        $diagnostic->delete();

        return redirect()->route('diagnostic.index');
    }
}
