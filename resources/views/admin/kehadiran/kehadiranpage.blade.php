@extends('admin.layouts.app')
@section('content')
<link type="text/css" href="/css/admin/kehadiran-page.css" rel="stylesheet" />

<div class="kehadiran-page">
    <div class="header-content">
        <form action="/kehadiran-page" >
            <div class="search-bar">
                <input type="text" id="mySearch" class="search" onkeyup="myFunction()" name="search" placeholder="Search..."> <button><i class="fas fa-search" type="submit"></i></button>
            </div>
        </form>

        <div class="haritanggal">
            <ul>
                <li id="hari"></li>
                <li>, </li>
                <li id="tanggal"></li>
            </ul>
        </div>

        <!-- JS hari, tanggal, bulan, tahun -->
        <script>
            var tw = new Date();
            if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
            else(a = tw.getTime());
            tw.setTime(a);
            var tahun = tw.getFullYear();
            var hari = tw.getDay();
            var bulan = tw.getMonth();
            var tanggal = tw.getDate();
            var hariarray = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
            var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            document.getElementById("hari").innerHTML = hariarray[hari] + " ";
            document.getElementById("tanggal").innerHTML = +tanggal + " " + bulanarray[bulan] + " " + tahun + " ";
        </script>

        @foreach ($rombels as $rombel)
            <div class="table-content">
                <table>
                    <tr class="th1">
                        <th colspan="7">{{ $rombel->rombel }}</th>
                    </tr>
                    <tr class="th2">
                        <th width="40px">No</th>
                        <th width="80px">Bukti</th>
                        <th width="210px">NIS</th>
                        <th>Nama</th>
                        <th width="100px">Rayon</th>
                        <th width="100px">Ket</th>
                        <th width="120px">Jam</th>
                    </tr>
                    @if ($rombel->user->count() > 0)
                    @php $no = 1 @endphp
                        @foreach ($rombel->user as $user)

                            @foreach ($user->absens as $absen)

                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        @if(!is_null($absen->proof))
                                            <img src="{{ asset($absen->proof) }}" alt="">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $absen->user->nis }}</td>
                                    <td>{{ $absen->user->name }}</td>
                                    <td>{{ $absen->user->rayon->rayon }}</td>
                                    <td>{{ $absen->present }}</td>
                                    <td>{{ $absen->hadir }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        <tr>
                            <td colspan="999999999">Tidak Ada Siswa</td>
                        </tr>
                    @endif
                </table>
            </div>
        @endforeach
    </div>
</div>
@endsection
