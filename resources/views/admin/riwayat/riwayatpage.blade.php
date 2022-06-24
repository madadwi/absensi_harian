@extends('admin.layouts.app')
@section('content')

<link type="text/css" href="/css/admin/absensi-page.css" rel="stylesheet" />

<style>
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
</style>

<div class="absen-page">
    <div class="header-content">
        <form action="/riwayat-page" method="GET">
            <div class="search-bar">
                <input type="text" id="mySearch" class="search" onkeyup="myFunction()" name="search" placeholder="Search..."> <button><i class="fas fa-search" type="submit"></i></button>
            </div>

        </form>
    </div>

    <div class="table-content">
        <table>
            <tr>
                <th width="60px">No</th>
                <th width="100px">Bukti</th>
                <th width="160px">NIS</th>
                <th width="120px">Nama</th>
                <th width="120px">Rombel</th>
                <th width="100px">Rayon</th>
                <th width="100px">Ket</th>
                <th width="120px">Absen</th>
                <th width="120px">Pulang</th>
                <th width="120px">Tanggal</th>
            </tr>
            @foreach ($absen as $row)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        @if(!is_null($row->proof))
                            <img src="{{ asset( 'storage/' . $row->proof ) }}" alt="">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $row->user->nis }}</td>
                    <td>{{ $row->user->name }}</td>
                    <td>{{ $row->user->rombel->rombel }}</td>
                    <td>{{ $row->user->rayon->rayon }}</td>
                    <td>{{ $row->present }}</td>
                    <td>{{ $row->hadir }}</td>
                    <td>{{ $row->pulang ?? '-' }}</td>
                    <td>{{ $row->tanggal }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
