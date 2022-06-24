@extends('admin.layouts.app')
@section('content')
{{-- <link type="text/css" href="/css/admin/siswa-page.css" rel="stylesheet" /> --}}
<section class="admin-rombel">
    @yield('rombel-page')
</section>

{{-- <link type="text/css" href="/css/admin/rombel-page.css" rel="stylesheet" /> --}}
<style>
    .siswa-page {
        top: 64px;
        left: 300px;
        bottom: 0;
        right: 0;
        position: absolute;
        padding: 20px 50px;
    }

    .search-bar {
        background-image: radial-gradient(purple, black);
        width: 240px;
        color: white;
        border: 2px solid white;
        box-shadow: 0px 0px 10px black;
        border-radius: 10px;
    }
    .search-bar .search {
        background-color: transparent;
        border: none;
        outline: none !important;
        border-radius: 10px;
    }
    .search::-webkit-input-placeholder {
        color: whitesmoke;
    }

    .tambah-siswa button {
        color: white;
        background-image: radial-gradient(purple, black);
        font-weight: bold;
        padding: 8px 10px;
        position: absolute;
        top: 20px;
        right: 50px;
        border-radius: 10px;
        border: 2px solid white;
        box-shadow: 0px 0px 10px black;
        transition: .5s;
    }
    .tambah-siswa button:hover {
        transform: scale(1.04);
        opacity: .8;
    }

    .tabel-hadir th {
        border: 1px solid white;
        background-image: radial-gradient(purple, black);
    }

    .tabel-hadir table {
        width: 100%;
        margin-top: 20px;
        text-align: center;
        background-color: lightgrey;
        color: white;
        box-shadow: 0px 0px 10px black;
        border: 3px solid white;
    }

    .tabel-hadir td {
        border: 1px solid black;
        color: black;
        font-weight: 600;
    }
</style>

<div class="siswa-page">
    <div class="header-content">
        <form action="/rombels" method="GET">
            <div class="search-bar">
                <input type="text" id="mySearch" class="search" onkeyup="myFunction()" name="search" placeholder="Search..."> <button><i class="fas fa-search" type="submit"></i></button>
            </div>

        </form>

        <div class="tambah-siswa">
            <a href="{{ route('rombels.create') }}"><button>Tambahkan +</button></a>
        </div>
    </div>

    @foreach ($rombels as $row)
        <div class="tabel-hadir">
            <table>
                <tr>
                    <th colspan="5">{{ $row->rombel }}</th>
                    <th colspan="1"><a href="{{ route('rombels.edit', $row->id) }}"><i class='bx bx-edit-alt'></i></a></th>
                    <th colspan="1">
                        <form action="{{ route('rombels.destroy', $row->id) }}" method="POST" style="border: 1px solid transparent;display: flex;justify-content: center;align-items: center;padding: 1px;margin-bottom: 0px;">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('anjay')"><i class='bx bx-trash'></i></button>
                        </form>
                    </th>
                </tr>

                <tr>
                    <th rowspan="2" width="50px">No</th>
                    <th rowspan="2">NIS</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2" width="90px">Rayon</th>

                </tr>
                <tr>
                    <th width="50px"></th>
                    <th width="50px"></th>
                    <th width="50px"></th>
                </tr>

                @if ($row->user->count() > 0)
                @php $no = 1 @endphp
                    @foreach ($row->user as $user)

                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->nis }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->rayon->rayon }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Tidak ada siswa</td>
                    </tr>
                @endif
            </table>
        </div>
    @endforeach
{{-- <div class="siswa-page">
    <div class="header-content">
        <div class="search-bar">
            <input type="text" id="mySearch" class="search" onkeyup="myFunction()" placeholder="Search..."> <i class="fas fa-search"></i>
        </div>

        <div class="tambah-siswa">
            <a href="{{ route('rombels.create') }}"><button type="button">Tambahkan +</button></a>
        </div>
    </div>

    <div class="table-content">
        <table>
            <tr>
                <th width="60px">No</th>

                <th width="80px">Rombel</th>

                <th width="60px">Aksi</th>
            </tr>
            @foreach ($rombels as $row)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $row->rombel }}</td>

                <td class="btn-aksi">



                    <form method="POST" action="{{ route('rombels.destroy', $row->id) }}">
                        <a href="{{ route('rombels.edit', $row->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('BAPA')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </table>
    </div>

    <div class="overlay" id="gambar-siswa">
        <a href="#" class="close"><i class="far fa-times-circle"></i></a>
        <img class="rounded mx-auto d-block" src="{{ asset('img/images.png') }}">
    </div>
</div> --}}

@endsection
