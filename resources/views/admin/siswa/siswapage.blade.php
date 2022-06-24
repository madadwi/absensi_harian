@extends('admin.layouts.app')
@section('content')
<link type="text/css" href="/css/admin/siswa-page.css" rel="stylesheet" />

<div class="siswa-page">
    <div class="header-content">
        <form action="/students" >
            <div class="search-bar">
                <input type="text" id="mySearch" class="search" onkeyup="myFunction()" name="search" placeholder="Search..."> <button><i class="fas fa-search" type="submit"></i></button>
            </div>
        </form>

        <div class="tambah-siswa">
            <a href="{{ route('students.create') }}"><button>Tambahkan +</button></a>
        </div>
    </div>



    <div class="table-content">
        <table>
            <tr>

                <th width="120px">Foto</th>
                <th width="120px">NIS</th>
                <th>Nama</th>
                <th width="90px">Rombel</th>
                <th width="80px">Rayon</th>
                <th>Email</th>
                <th width="60px">Aksi</th>
                @if (Auth::user()->role == 'Admin')
                <th class="border-0 rounded-end">Action</th>
                @endif
            </tr>
            @foreach ($siswa as $row)
            <tr>
                <td class="foto-siswa"><img src="{{ asset('storage/' . $row->avatar)}}"></td>
                <td>{{ $row->nis }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->rombel->rombel }}</td>
                <td>{{ $row->rayon->rayon }}</td>
                <td>{{ $row->email }}</td>
                <form method="POST" action="{{ route('students.destroy', $row->id) }}">
                    <td class="btn-aksi">
                        <a href="{{ route('students.edit', $row->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </form>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="overlay" id="gambar-siswa">
        <a href="#" class="close"><i class="far fa-times-circle"></i></a>
        <!-- <img class="rounded mx-auto d-block" src="{{ asset('img/.jpg') }}"> -->
    </div>
</div>
@endsection
