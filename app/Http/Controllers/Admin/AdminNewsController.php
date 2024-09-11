<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(20);
        return view("admin.News.index", compact("news"));
    }

    public function create()
    {
        return view("admin.News.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "photo" => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);

        $photo = $request->file('photo');
        $photoPath = $photo->store('news_photos', 'public');

        News::create([
            "title" => $request->title,
            "description" => $request->description,
            "photo" => $photoPath
        ]);

        return redirect('admin/news')->with("status", "News Created Successfully");
    }

    public function show(News $news)
    {
        return view("admin.News.show", compact('news'));
    }

    public function edit(News $news)
    {
        return view("admin.News.edit", compact('news'));
    }

    public function update(Request $request, News $news)
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
            if ($news->photo) {
                Storage::disk('public')->delete($news->photo);
            }

            $photo = $request->file('photo');
            $photoPath = $photo->store('news_photos', 'public');
            $data['photo'] = $photoPath;
        }

        $news->update($data);
        return redirect('admin/news')->with("status", "News Updated Successfully");
    }

    public function destroy(News $news)
    {
        if ($news->photo) {
            Storage::disk('public')->delete($news->photo);
        }
        $news->delete();
        return redirect('admin/news')->with("status", "News Deleted Successfully");
    }
}
