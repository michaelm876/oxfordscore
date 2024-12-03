<?php

namespace App\Http\Controllers;

use App\Models\Shoulder;
use App\Models\Consultant;
use App\Http\Requests\StoreShoulderRequest;
use App\Http\Requests\UpdateShoulderRequest;

class ShoulderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shoulders.index', [
            'shoulders' => Shoulder::with('consultant')->latest()->filter(request(['q']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shoulders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShoulderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShoulderRequest $request)
    {
        Shoulder::create($request->validated());

        return redirect(route('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shoulder  $shoulder
     * @return \Illuminate\Http\Response
     */
    public function show(Shoulder $shoulder)
    {
        return view('shoulders.show', [
            'shoulder' => $shoulder->load('consultant'),
            'comments' => $shoulder->comments->sortByDesc('created_at')->load('user'),
            'related' => Shoulder::with('consultant')
                ->whereNot('id', '=', $shoulder->id)
                ->whereNotNull('chi')
                ->where('chi', '=', $shoulder->chi)
                ->latest()
                ->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shoulder  $shoulder
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoulder $shoulder)
    {
        return view('shoulders.edit', [
            'shoulder' => $shoulder,
            'consultants' => Consultant::where('is_active', '=', '1')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoulderRequest  $request
     * @param  \App\Models\Shoulder  $shoulder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShoulderRequest $request, Shoulder $shoulder)
    {
        $validated = $request->validated();
        $validated["surgery_cancelled"] = request()->has('surgery_cancelled');
        $validated["surgery_notfv"] = request()->has('surgery_notfv');
        $shoulder->update($validated);

        return redirect(route('shoulders.show', $shoulder));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shoulder  $shoulder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoulder $shoulder)
    {
        //
    }
}
