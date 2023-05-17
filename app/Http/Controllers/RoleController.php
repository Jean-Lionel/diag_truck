<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(Request $request): View
    {
        $roles = Role::all();

        return view('role.index', compact('roles'));
    }

    public function create(Request $request): View
    {
        return view('role.create');
    }

    public function store(RoleStoreRequest $request)
    {
        $role = Role::create($request->validated());

        session()->flash('role.id', $role->id);

        return redirect()->route('role.index');
    }

    public function show(Request $request, Role $role): View
    {
        return view('role.show', compact('role'));
    }

    public function edit(Request $request, Role $role): View
    {
        return view('role.edit', compact('role'));
    }

    public function update(RoleUpdateRequest $request, Role $role)
    {
        $role->update($request->validated());

        session()->flash('role.id', $role->id);

        return redirect()->route('role.index');
    }

    public function destroy(Request $request, Role $role)
    {
        $role->delete();

        return redirect()->route('role.index');
    }
}
