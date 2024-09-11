<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Storage;

class AdminActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::paginate(20);
        return view("admin.Activities.index", compact("activities"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.Activities.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "photo" => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);

        $photo = $request->file('photo');
        $photoPath = $photo->store('activities_photos', 'public');

        Activity::create([
            "title" => $request->title,
            "description" => $request->description,
            "photo" => $photoPath
        ]);

        return redirect('admin/activities')->with("status", "Activity Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return view("admin.Activities.show", compact('activity'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("admin.Activities.edit", compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "photo" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);

        $data = [
            "title" => $request->title,
            "description" => $request->description,
        ];

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($activity->photo) {
                Storage::disk('public')->delete($activity->photo);
            }

            $photo = $request->file('photo');
            $photoPath = $photo->store('activities_photos', 'public');
            $data['photo'] = $photoPath;
        }

        $activity->update($data);
        return redirect('admin/activities')->with("status", "Activity Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        if($activity->photo) {
            Storage::disk('public')->delete($activity->photo);
        }
        $activity->delete();
        return redirect('admin/activities')->with("status", "Activity Deleted Successfully");
    }
}
