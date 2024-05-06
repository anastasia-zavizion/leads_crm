<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use App\Models\LeadStatus;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Leads/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Leads/Create', ['statuses'=>LeadStatus::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadRequest $request)
    {
       $validated = $request->validated();
       Lead::create($validated);
       return redirect()->route('leads.index')->with('success','New Lead was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
