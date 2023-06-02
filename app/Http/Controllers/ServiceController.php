<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all();

        return view('service.index', compact('services'));
    }

    public function create(Request $request)
    {
        $service = new Service();
        return view('service.create', compact('service'));
    }

    public function store(ServiceStoreRequest $request)
    {

        $service = Service::create($request->validated());

        session()->flash('service.id', $service->id);

        return redirect()->route('service.index');
    }

    public function show(Request $request, Service $service)
    {
        return view('service.show', compact('service'));
    }

    public function edit(Request $request, Service $service)
    {
        return view('service.edit', compact('service'));
    }

    public function update(ServiceUpdateRequest $request, Service $service)
    {
        // dd($request->validated());
        $service->update($request->validated());

        session()->flash('service.id', $service->id);

        return redirect()->route('service.index');
    }

    public function destroy(Request $request, Service $service)
    {
        $service->delete();

        return redirect()->route('service.index');
    }
}