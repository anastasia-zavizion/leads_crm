<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use App\Models\LeadStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::latest()->with('status')->paginate(10);
        return inertia('Leads/Index', ['leads'=>$leads]);
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
        return redirect()->route('leads.index')->with('success', 'New Lead was created');
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
    public function edit(Lead $lead)
    {
        return inertia('Leads/Edit',['lead'=>$lead, 'statuses'=>LeadStatus::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeadRequest $request, Lead $lead)
    {
        $validated = $request->validated();
        $lead->update($validated);
        return redirect()->route('leads.index')->with('success', 'Lead was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->with('success','Lead was deleted');
    }
}
