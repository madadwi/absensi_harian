<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.absen.absenpage', [
            'absen' => Absen::filter(request(['search']))->join('users', 'users.id', '=', 'user_id')->get()
        ])->with('i', 0);
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
    public function update(Request $request, $id)
    {
        //
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

    public function hadir()
    {
        $hash = md5(bcrypt(Auth::id() . time() . uniqid()));

        Absen::create([
            'user_id' => Auth::id(),
            'hadir' => date('H:i'),
            'is_present' => true,
            'present' => "Hadir",
            'hash' => $hash
        ]);

        Riwayat::create([
            'user_id' => Auth::id(),
            'hadir' => date('H:i'),
            'is_present' => true,
            'present' => "Hadir",
            'hash' => $hash,
            'tanggal' => date('d/M/Y')
        ]);

        return redirect()->route('dashboard');
    }

    public function pulang($hash)
    {
        Absen::where('hash', $hash)->update([
            'pulang' => date('H:i'),
        ]);

        Riwayat::where('hash', $hash)->update([
            'pulang' => date('H:i'),
        ]);

        return redirect()->route('dashboard');
    }

    public function reset()
    {
        Absen::truncate();

        return redirect('/absen-page');
    }

    public function izin()
    {
        return view('keterangan.index');
    }

    public function tidakhadir(Request $request)
    {
        //? Validasi input
        $rules = [
            'present' => ['required', 'max:255', 'string'],
            'description' => ['required'],
            'proof' => ['required', 'file', 'image', 'max:2048'],
        ];

        $hash = md5(bcrypt(Auth::id() . time() . uniqid()));

        $validatedData = $request->validate($rules);
        $validatedData['proof'] = $request->file('proof')->store('img/bukti');
        $validatedData['user_id'] = Auth::id();
        $validatedData['is_present'] = false;
        $validatedData['hadir'] = date('H:i');
        $validatedData['hash'] = $hash;


        //? Memasukkan data ke dalam database
        Absen::create($validatedData);

        $validatedData['tanggal'] = date('d/M/Y');

        Riwayat::create($validatedData);

        //? Redirect ke dashboard user dengan session success
        return redirect()->route('dashboard')->with('success', 'Berhasil ABSEN!');
    }
}
