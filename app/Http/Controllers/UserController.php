<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::latest()->get();

        return view('user.index', compact('users'));
    }

    public function create(Request $request): View
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    public function store(UserStoreRequest $request)
    {
        dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'sexe' => $request->sexe,
            'role_name' => $request->role_name,
            'groupe' => $request->groupe,
            'specialite' => $request->specialite,
            'qualification' => $request->qualification,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
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
        $data = $request->all();
        if ($data["password"] != "") {
            $data["password"] = Hash::make($request->password);
        } else {
            unset($data["password"]);
        }

        $user->update($data);

        session()->flash('user.id', $user->id);

        return redirect()->route('user.index');
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}