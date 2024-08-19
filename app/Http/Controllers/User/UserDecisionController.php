<?php

namespace App\Http\Controllers\User;

use App\Models\Decision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserDecisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decisions = Decision::paginate(15);
        $data = [
            "all_decisions" => $decisions
        ];
        return view("User.Decisions.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Decision $decision)
    {
        return view("User.Decisions.show", compact('decision'));
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
