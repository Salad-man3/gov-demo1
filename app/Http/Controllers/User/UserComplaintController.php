<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;

class UserComplaintController extends Controller
{
    public function index()
    {
        return view("User.Complaints.index");


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("User.Complaints.create");
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            $request->validate([
                "subject" => "required|string|max:255",
                "description" => "required|string|max:1027",
                "type" => "required|in:complaint,recommendation",
                "mobile_number"=>"required|string|max:15"
            ]);

            Complaint::create([
                "subject" => $request->subject,
                "description" => $request->description,
                "type" => $request->type,
                "mobile_number" => $request->mobile_number
            ]);

            return redirect()->route('complaints.index')->with("status", "Complaint submitted successfully");
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaints)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
