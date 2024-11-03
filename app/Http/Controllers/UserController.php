<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function index(User $user)
    {
        if (! Gate::allows('kelola-user', $user)) {
            abort(403);
        }

        return view('user', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function create(User $user)
    {
        if (! Gate::allows('kelola-user', $user)) {
            abort(403);
        }

        return view('user-create' , [
            'gedung' => Gedung::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        if (! Gate::allows('kelola-user', $user)) {
            abort(403);
        }

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required',
            'gedung_id' => 'required'
        ]);

        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);
        return redirect('/user');
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
    public function edit(User $user)
    {
        if (! Gate::allows('kelola-user', $user)) {
            abort(403);
        }

        return view('user-edit', [
            'user' => $user,
            'gedung' => Gedung::all()
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
        if (! Gate::allows('kelola-user', new User())) {
            abort(403);
        }

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'gedung_id' => 'required'
        ]);

        User::where('id', $id)->update($validate);
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        if (! Gate::allows('kelola-user', new User())) {
            abort(403);
        }

        User::destroy($id);
        return redirect('/user');
    }
}
