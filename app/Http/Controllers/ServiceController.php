<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServicesCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 4;
        return view('services', [
            'services' => Service::paginate($perpage)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('service_create', [
            'categories' => ServicesCategory::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:services|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'cabinet' => 'required|integer',
            'category_id' => 'integer',
        ]);
        $service = new Service($validated);
        $service->save();
        return redirect('/services');
    }

    public function show(string $id)
    {
        return view('service', [
            'service' => Service::all()->where('id', $id)->first()
        ]);
    }

    public function edit(string $id)
    {
        return view('service_edit', [
            'service' => Service::all()->where('id', $id)->first(),
            'categories' => ServicesCategory::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'cabinet' => 'required|integer',
            'category_id' => 'integer',
        ]);
        $service = Service::all()->where('id', $id)->first();
        $service->name = $validated['name'];
        $service->description = $validated['description'];
        $service->price  = $validated['price'];
        $service->cabinet  = $validated['cabinet'];
        $service->category_id = $validated['category_id'];
        $service->save();
        return redirect('/services');
    }

    public function destroy(string $id)
    {
        Service::destroy($id);
        return redirect('/services');
    }
}
