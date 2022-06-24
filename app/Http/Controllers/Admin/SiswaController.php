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
        $siswa = User::filter(request(['search']))->where('role', 'siswa')->get();
        return view('admin.siswa.siswapage', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rombel = Rombel::orderBy('rombel')->get();
        $rayon = Rayon::orderBy('rayon')->get();
        return view('admin.siswa.tambahsiswa', compact('rombel', 'rayon'));
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
            'nis' => ['required', 'numeric', 'unique:users'],
            'rombel_id' => ['required'],
            'rayon_id' => ['required'],
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
        $validatedData['role'] = 'siswa';
        $validatedData['password'] = bcrypt($request->password);
        $validatedData['hash'] = md5(bcrypt($validatedData['email'] . uniqid()));


        //? Memasukkan data ke dalam database
        User::create($validatedData);

        //? Redirect ke dashboard user dengan session success
        return redirect()->route('students.index')->with('success', 'Berhasil Menambah Data Baru!');
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
        $rombel = Rombel::orderBy('rombel')->get();
        $rayon = Rayon::orderBy('rayon')->get();
        $siswa = User::firstWhere('id', $id);
        return view('admin.siswa.editsiswa', compact('rombel', 'rayon', 'siswa'));
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
        $rules = [
            'name' => ['required', 'max:255', 'string'],
            'rombel_id' => ['required'],
            'rayon_id' => ['required'],
            'avatar' => ['nullable', 'file', 'image', 'max:2048'],
        ];

        if ($request->email != $oldData->email) $rules['email'] = ['required', 'max:255', 'email', 'unique:users'];
        if ($request->nis != $oldData->nis) $rules['nis'] = ['required', 'numeric', 'unique:users'];

        $validatedData = $request->validate($rules);

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
        return redirect()->route('students.index')->with('success', 'Berhasil EDIT gan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = User::find($id);
        $students->delete();

        return redirect()->route('students.index')
            ->with('success', 'Berhasil Hapus !');
    }
}
