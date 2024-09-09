<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class AdminServiceController extends Controller
{
    /**&
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(15);
        $data = [
            "all_services" => $services
        ];
        return view("admin.Services.index", compact("data"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.Services.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "description" => "required|string|max:255"
        ]);

        Service::create([
            "name" => $request->name,
            "description" => $request->description
        ]);
        return redirect('admin/services')->with("status", "Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view("admin.Services.show", compact('service'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view("admin.Services.edit", compact('service'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "description" => "required|string|max:255"
        ]);

        $service->update([
            "name" => $request->name,
            "description" => $request->description
        ]);
        return redirect('admin/services')->with("status", "Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Service::destroy($id);
        return redirect('admin/services')->with("status", "Deleted Successfully");
    }
}
