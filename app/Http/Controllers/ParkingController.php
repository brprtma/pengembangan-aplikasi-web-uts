<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Parking;
use App\Models\User;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function index(User $user)
    {
        return view('parking', [
            'parking' => Parking::all(),
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function create()
    {
        return view('parking-create', [
            'gedung' => Gedung::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gedung_id' => 'required',
            'plat' => 'required',
            'tanggal_masuk' => 'required',
        ]);

        \App\Models\Parking::create($validatedData);

        return redirect('/parking');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function edit(Parking $parking)
    {
        return view('parking-edit', [
            'parking' => $parking
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);
        Parking::where('id', $id)->update($validatedData);
        return redirect('/parking');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    // Fungsi Keluar Parkir
    public function keluar(Parking $parking)
    {
        return view('parking-keluar', [
            'parking' => $parking
        ]);
    }

    public function out(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'tanggal_keluar' => 'required',
        ]);
        Parking::where('id', $id)->update($validatedData);
        return redirect('/parking');
    }
}
