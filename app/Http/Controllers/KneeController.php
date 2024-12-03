<?php

namespace App\Http\Controllers;

use App\Models\Knee;
use App\Models\Consultant;
use App\Http\Requests\StoreKneeRequest;
use App\Http\Requests\UpdateKneeRequest;

class KneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('knees.index', [
            'knees' => Knee::with('consultant')->latest()->filter(request(['q']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('knees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKneeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKneeRequest $request)
    {
        Knee::create($request->validated());

        return redirect(route('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knee  $knee
     * @return \Illuminate\Http\Response
     */
    public function show(Knee $knee)
    {
        return view('knees.show', [
            'knee' => $knee->load('consultant'),
            'comments' => $knee->comments->sortByDesc('created_at')->load('user'),
            'related' => Knee::with('consultant')
                ->whereNot('id', '=', $knee->id)
                ->whereNotNull('chi')
                ->where('chi', '=', $knee->chi)
                ->latest()
                ->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knee  $knee
     * @return \Illuminate\Http\Response
     */
    public function edit(Knee $knee)
    {
        return view('knees.edit', [
            'knee' => $knee,
            'consultants' => Consultant::where('is_active', '=', '1')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKneeRequest  $request
     * @param  \App\Models\Knee  $knee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKneeRequest $request, Knee $knee)
    {
        $validated = $request->validated();
        $validated["surgery_cancelled"] = request()->has('surgery_cancelled');
        $validated["surgery_notfv"] = request()->has('surgery_notfv');
        $knee->update($validated);

        return redirect(route('knees.show', $knee));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knee  $knee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knee $knee)
    {
        //
    }
}
