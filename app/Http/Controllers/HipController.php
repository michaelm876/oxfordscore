<?php

namespace App\Http\Controllers;

use App\Models\Hip;
use App\Models\Consultant;
use App\Http\Requests\StoreHipRequest;
use App\Http\Requests\UpdateHipRequest;

class HipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hips.index', [
            'hips' => Hip::with('consultant')->latest()->filter(request(['q']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHipRequest $request)
    {
        Hip::create($request->validated());

        return redirect(route('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hip  $hip
     * @return \Illuminate\Http\Response
     */
    public function show(Hip $hip)
    {
        return view('hips.show', [
            'hip' => $hip->load('consultant'),
            'comments' => $hip->comments->sortByDesc('created_at')->load('user'),
            'related' => Hip::with('consultant')
                ->whereNot('id', '=', $hip->id)
                ->whereNotNull('chi')
                ->where('chi', '=', $hip->chi)
                ->latest()
                ->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hip  $hip
     * @return \Illuminate\Http\Response
     */
    public function edit(Hip $hip)
    {
        return view('hips.edit', [
            'hip' => $hip,
            'consultants' => Consultant::where('is_active', '=', '1')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHipRequest  $request
     * @param  \App\Models\Hip  $hip
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHipRequest $request, Hip $hip)
    {
        $validated = $request->validated();
        $validated["surgery_cancelled"] = request()->has('surgery_cancelled');
        $validated["surgery_notfv"] = request()->has('surgery_notfv');
        $hip->update($validated);

        return redirect(route('hips.show', $hip));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hip  $hip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hip $hip)
    {
        //
    }
}
