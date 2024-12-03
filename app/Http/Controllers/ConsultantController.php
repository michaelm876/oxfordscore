<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Http\Requests\StoreConsultantRequest;
use App\Http\Requests\UpdateConsultantRequest;

class ConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('consultants.index', [
            'consultants' => Consultant::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consultants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConsultantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsultantRequest $request)
    {
        Consultant::create($request->validated());

        return redirect(route('consultants.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function show(Consultant $consultant)
    {
        return redirect(route('consultants.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultant $consultant)
    {
        return view('consultants.edit', [
            'consultant' => $consultant
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConsultantRequest  $request
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultantRequest $request, Consultant $consultant)
    {
        $validated = $request->validated();
        $validated["is_active"] = request()->has('is_active');
        $consultant->update($validated);

        return redirect(route('consultants.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultant $consultant)
    {
        if ($consultant->hips->isEmpty() && $consultant->knees->isEmpty() && $consultant->shoulders->isEmpty()) {
            $consultant->delete();
            return redirect(route('consultants.index'));
        }
        return redirect()->back()->withErrors(['errors' => 'The consultant is attached to records and cannot be deleted. You can make them inactive instead.']);
    }
}