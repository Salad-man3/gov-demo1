<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Decision;
use App\Http\Resources\DecisionResource;
use Illuminate\Support\Facades\Validator;

class ApiDecisionController extends Controller
{
    public function index()
    {
        $decisions = Decision::get();
        if ($decisions->count() > 0) {
            return DecisionResource::collection($decisions);
        } else {
            return response()->json(['message' => 'No decisions found'], 200);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'adminstrator' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }


        $decision = Decision::create([
            'title' => $request->title,
            'description' => $request->description,
            'adminstrator' => $request->adminstrator,
        ]);

        return response()->json(['message' => 'Decision created successfully', 'data' => new DecisionResource($decision)], 200);
    }

    public function show(Decision $decision)
    {
        return new DecisionResource($decision);
    }

    public function update(Request $request, Decision $decision)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'adminstrator' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }


        $decision->update([
           'title' => $request->title,
            'description' => $request->description,
            'adminstrator' => $request->adminstrator,
        ]);

        return response()->json(['message' => 'Decision updated successfully', 'data' => new DecisionResource($decision)], 200);

    }

    public function destroy(Decision $decision)
    {
        $decision->delete();
        return response()->json(['message' => 'Decision deleted successfully'], 200);
    }
}
