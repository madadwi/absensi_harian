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

    <div class="bg-table">
        <table>
            <tr>
                <td>
                    <h1>edit rombel</h1>
                </td>
            </tr>
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
            <form action="{{ route('rombels.update',$rombel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')

                <tr>
                    <!-- <td class="judul-input">NIS :</td> -->
                    <td style="padding-left: 15px;">Tambahkan</td>
                </tr>
                <tr>
                    <!-- <td><input class="input1" type="number" name="nis" placeholder="Masukan NIS.."></td> -->
                    <td><input class="input1" style="margin-left: 5px;" type="text" name="rombel" placeholder="Masukan Nama rombel.." value="{{$rombel->rombel}}"> </td>
                </tr>
        </table>
    </div>
    <div class="bg-table bg-table-btn" align="center">
        <button type="submit">Tambahkan</button>
        <a href="{{ route('rombels.index') }}"><button class="btn-kembali"><i class="fas fa-arrow-circle-left"></i> Kembali</button></a>
    </div>

    </form>
</div>
@endsection