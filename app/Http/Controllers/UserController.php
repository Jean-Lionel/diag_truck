<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function create(Request $request): View
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());

        session()->flash('user.id', $user->id);

        return redirect()->route('user.index');
    }

    public function show(Request $request, User $user): View
    {
        return view('user.show', compact('user'));
    }

    public function edit(Request $request, User $user): View
    {
        return view('user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        session()->flash('user.id', $user->id);

        return redirect()->route('user.index');
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
