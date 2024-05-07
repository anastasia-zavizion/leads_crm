<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use App\Models\LeadStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::latest()->get();
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
        try {
            $validated = $request->validated(); // This line throws an exception on validation failure

            Lead::create($validated);

            dd('ddd');

          //  return redirect()->route('leads.index')->with('success', 'New Lead was created');
        } catch (ValidationException $e) {
            dd($e->validator->errors());

            return back()->withErrors($e->validator->errors())->withInput();
        }


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
        return inertia('Leads/Edit',['lead'=>$lead]);
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
    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->with('success','Lead was deleted');
    }
}
