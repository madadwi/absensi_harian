<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'name' => ['required', 'max:255', 'string'],
            'avatar' => ['nullable', 'file', 'image', 'max:2048'],
        ];

        $validatedData = $request->validate($rules);

        if (!is_null($request->avatar)) {
            $validatedData['avatar'] = $request->file('avatar')->store('img/avatar/upload');
            $validatedData['is_edited'] = true;
        } else {
            $validatedData['avatar'] = Auth::user()->avatar;
        }

        $user = User::find(Auth::id());

        $user->update([
            'name' => $validatedData['name'],
            'avatar' => $validatedData['avatar'],
        ]);

        return redirect('/edit-page')->with('success', 'Berhasil EDIT ANJEEEEEEEEEEEEEEEEEEE!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
