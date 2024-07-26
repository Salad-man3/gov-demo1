<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Decision;

class AdminDecisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decisions = Decision::paginate(10);
        $data = [
            "all_decisions" => $decisions
        ];
        return view("Admin.Decisions.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.Decisions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string|max:1027",
            "adminstrator"=> "required|string|max:255"
        ]);

        Decision::create([
            "title" => $request->title,
            "description" => $request->description,
            "adminstrator" => $request->adminstrator
        ]);
        return redirect('admin/decisions')->with("status", "Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Decision $decision)
    {
        return view("Admin.Decisions.show", compact('decision'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Decision $decision)
    {
        return view("Admin.Decisions.edit", compact('decision'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Decision $decision)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string|max:255",
            "adminstrator"=> "required|string|max:255"
        ]);

        $decision->update([
            "title" => $request->title,
            "description" => $request->description,
            "adminstrator" => $request->adminstrator
        ]);
        return redirect('admin/decisions')->with("status", "Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Decision::destroy($id);
        return redirect('admin/decisions')->with("status", "Deleted Successfully");
    }
}
