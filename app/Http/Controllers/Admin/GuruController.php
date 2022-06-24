<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = User::where('role', 'guru')->get();
        return view('admin.guru.gurupage', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.tambahguru');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //? Validasi input
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'avatar' => ['nullable', 'file', 'image', 'max:2048'],
        ]);

        //? Cek jika avatar tidak diisi maka gunakan avatar default
        if (is_null($request->avatar)) {
            $validatedData['avatar'] = '/img/avatar/' . substr($request->name, 0, 1) . '.png';
        } else {
            $validatedData['avatar'] = $request->file('avatar')->store('img/avatar/upload');
            $validatedData['is_edited'] = true;
        }

        //? Menentukan role user
        $validatedData['role'] = 'guru';
        $validatedData['password'] = bcrypt($request->password);
        $validatedData['hash'] = md5(bcrypt($validatedData['email'] . uniqid()));


        //? Memasukkan data ke dalam database
        User::create($validatedData);

        //? Redirect ke dashboard user dengan session success
        return redirect()->route('guru.index')->with('success', 'Berhasil Menambah Data Baru!');
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
        $guru = User::firstWhere('id', $id);
        return view('admin.guru.editguru');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oldData = User::find($id);

        //? Validasi input
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'avatar' => ['nullable', 'file', 'image', 'max:2048'],
        ]);

        if ($request->email != $oldData->email) $validatedData['email'] = ['required', 'max:255', 'email', 'unique:users'];

        //? Cek jika avatar tidak diisi maka gunakan avatar default
        if (!is_null($request->avatar)) {
            $validatedData['avatar'] = $request->file('avatar')->store('img/avatar/upload');
            $validatedData['is_edited'] = true;
        }

        //? Menentukan role user
        $validatedData['password'] = bcrypt($request->password);
        $validatedData['hash'] = md5(bcrypt($request->email . uniqid()));


        //? Memasukkan data ke dalam database
        $oldData->update($validatedData);

        //? Redirect ke dashboard user dengan session success
        return redirect()->route('guru.index')->with('success', 'Berhasil EDIT ANJEEEEEEEEEEEEEEEEEEE!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $students)
    {
        $students->delete();

        return redirect()->route('students.index')
            ->with('success', 'Berhasil Hapus !');
    }
}
