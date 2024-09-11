<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class UserNewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(20);
        return view("User.News.index", compact("news"));
    }

    public function create() {}

    public function store(Request $request) {}

    public function show(News $news) {}

    public function edit(News $news) {}

    public function update(Request $request, News $news) {}

    public function destroy(News $news) {}
}
