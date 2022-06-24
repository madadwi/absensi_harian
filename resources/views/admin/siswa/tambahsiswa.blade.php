@extends('admin.layouts.app')
@section('content')

<!-- <link type="text/css" href="/admin/css/tambahsiswa-page.css" rel="stylesheet" /> -->
<style>
    .tambah-page {
        top: 64px;
        left: 300px;
        bottom: 0;
        right: 0;
        position: absolute;
        padding: 20px 50px;
    }

    .tambah-page .bg-table {
        width: 100%;
        border: 2px solid black;
        margin-bottom: 12px;
        background-color: black;
        color: white;
        font-weight: 500;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px black;
        border: 2px solid purple;
    }

    .bg-table table {
        width: 100%;
    }

    .bg-table h1 {
        font-size: 25px;
        margin-bottom: 20px;
        border-bottom: 2px solid purple;
        padding-left: 20px;
        color: white;
    }

    .bg-table input {
        background-color: lightgrey;
        box-shadow: 0px 0px 10px grey;
        border: 2px solid purple;
        border-radius: 10px;
        color: black;
        font-weight: 800;
        color: white;
    }

    .bg-table .input1 {
        width: 100%;
        color: white;
    }

    .bg-table .judul-input {
        padding-left: 10px;
        color: white;
    }

    .bg-table select {
        background-color: black;
        border: 2px solid purple;
        border-radius: 10px;
        box-shadow: 0px 0px 5px grey;
        color: white;
    }

    .bg-table-btn button {
        background-image: radial-gradient(purple, black);
        padding: 12px;
        border-radius: 20px;
        border: 2px solid white;
        text-shadow: 0px 0px 10px black;
        box-shadow: 0px 0px 10px grey;
        transition: .5s;
        font-weight: 500;
        color: white;
    }

    .bg-table-btn button:hover {
        background-image: radial-gradient(skyblue, blue);
        transform: scale(1.04);
        color: white;

    }

    .bg-table .btn-kembali {
        position: absolute;
        left: 70px;
        background-image: radial-gradient(grey, black);
        padding: 7px;
    }
</style>

<div class="tambah-page">
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-table">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table>
                <tr>
                    <td>
                        <h1>IDENTITAS</h1>
                    </td>
                </tr>
                <tr>
                    <td class="judul-input">NIS :</td>
                    <td style="padding-left: 15px;">Nama Lengkap :</td>
                    <td style="padding-left: 15px;">Foto</td>
                </tr>
                <tr>
                    <td><input value="{{ old('nis') }}" class="input1" type="number" name="nis" placeholder="Masukan NIS.."></td>
                    <td><input value="{{ old('name') }}" class="input1" style="margin-left: 5px;" type="text" name="name" placeholder="Masukan Nama.."></td>
                    <td><input class="input1" style="margin-left: 5px;" type="file" name="avatar"></td>
                </tr>
            </table>
        </div>

        <div class="bg-table">
            <table>
                <tr>
                    <td>
                        <h1>KELAS</h1>
                    </td>
                </tr>
                <tr>
                    <td class="judul-input">Rombel :</td>
                    <td class="judul-input">Rayon :</td>
                </tr>
                <tr>
                    <td>
                        <select name="rombel_id">
                            <option selected>Pilih Rombel</option>
                            @foreach ($rombel as $row)
                            <option {{ $row->id == old('rombel_id') ? 'selected' : '' }} value="{{ $row->id }}">
                                {{ $row->rombel }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="rayon_id">
                            <option selected>Pilih Rayon</option>
                            @foreach ($rayon as $row)
                            <option {{ $row->id == old('rayon_id') ? 'selected' : '' }} value="{{ $row->id }}">
                                {{ $row->rayon }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <div class="bg-table">
            <table>
                <tr>
                    <td>
                        <h1>AKUN</h1>
                    </td>
                </tr>
                <tr>
                    <td class="judul-input">E-mail :</td>
                    <td class="judul-input">Password :</td>
                </tr>
                <tr>
                    <td><input value="{{ old('email') }}" class="input1" type="email" name="email" placeholder="Maukan Email.."></td>
                    <td><input class="input1" type="password" name="password" placeholder="Masukan Password.."></td>
                </tr>
            </table>
        </div>

        <!-- <div class="bg-table">
            <table>
                <tr>
                    <td>
                        <h1>Lainnya</h1>
                    </td>
                </tr>
                <tr>
                    <td class="judul-input">Agama :</td>
                    <td class="judul-input">Jenis Kelamin :</td>
                </tr>
                <tr>
                    <td>
                        <select name="agama">
                            <option selected="selected" value="islam">Islam</option>
                            <option value="protestan">Protestan</option>
                            <option value="khatolik">Khatolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="buddha">Buddha</option>
                            <option value="konghucu">Konghucu</option>
                        </select>
                    </td>
                    <td>
                        <input type="radio" name="JK" value="Laki">
                        <label for="laki">Laki-laki &emsp;</label>
                        <input type="radio" name="JK" value="prpn">
                        <label for="prpn">Perempuan</label>
                    </td>
                </tr>
            </table>
        </div> -->

        <div class="bg-table bg-table-btn" align="center">
            <button>Tambahkan Siswa</button>
            <a href="{{ route('students.index') }}"><button type="button" class="btn-kembali"><i class="fas fa-arrow-circle-left"></i> Kembali</button></a>
        </div>
    </form>
</div>
@endsection
