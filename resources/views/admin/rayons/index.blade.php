
@extends('admin.layouts.app')
@section('content')
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
        <form action="/rayons" method="GET">
            <div class="search-bar">
                <input type="text" id="mySearch" class="search" onkeyup="myFunction()" name="search" placeholder="Search..."> <button><i class="fas fa-search" type="submit"></i></button>
            </div>

        </form>

        <div class="tambah-siswa">
            <a href="{{ route('rayons.create') }}"><button>Tambahkan +</button></a>
        </div>
    </div>

    @foreach ($rayons as $rayon)
        <div class="tabel-hadir">
            <table>
                <tr>
                    <th colspan="5">{{ $rayon->rayon }}</th>
                    <th colspan="1"><a href="{{ route('rayons.edit', $rayon->id) }}"><i class='bx bx-edit-alt'></i></a></th>
                    <th colspan="1">
                        <form action="{{ route('rayons.destroy', $rayon->id) }}" method="POST" style="border: 1px solid transparent;display: flex;justify-content: center;align-items: center;padding: 1px;margin-bottom: 0px;">
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
                    <th rowspan="2" width="90px">Rombel</th>
                    <th colspan="4">Keterangan</th>
                </tr>
                <tr>
                    <th width="50px">H</th>
                    <th width="50px">S</th>
                    <th width="50px">I</th>
                </tr>

                @if ($rayon->user->count() > 0)
                    @foreach ($rayon->user as $user)
                        @php $no =  ++$i @endphp
                        <tr>
                            <td>{{ $no++ }}</td>

                            <td>{{ $user->nis }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->rombel->rombel }}</td>
                            <td>{{ $user->absens->where('present', 'Hadir')->count() }}</td>
                            <td>{{ $user->absens->where('present', 'Sakit')->count() }}</td>
                            <td>{{ $user->absens->where('present', 'Izin')->count() }}</td>
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

</div>
@endsection
<section class="admin-rayon">
    @yield('rayon-page')
</section>
