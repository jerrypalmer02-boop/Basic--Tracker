<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
    // Display all records
    public function index()
    {
        $trackers = Tracker::latest()->get();

        return view('trackers.index', compact('trackers'));
    }

    // Show the create form
    public function create()
    {
        return view('trackers.create');
    }

    // Save a new record
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:Pending,Completed',
        ]);

        Tracker::create($request->all());

        return redirect()->route('trackers.index')
            ->with('success', 'Record added successfully!');
    }

    // Show the edit form
    public function edit(Tracker $tracker)
    {
        return view('trackers.edit', compact('tracker'));
    }

    // Update an existing record
    public function update(Request $request, Tracker $tracker)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:Pending,Completed',
        ]);

        $tracker->update($request->all());

        return redirect()->route('trackers.index')
            ->with('success', 'Record updated successfully!');
    }

    // Delete a record
    public function destroy(Tracker $tracker)
    {
        $tracker->delete();

        return redirect()->route('trackers.index')
            ->with('success', 'Record deleted successfully!');
    }
}