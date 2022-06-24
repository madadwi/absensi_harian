<section class="admin-siswa">
    @yield('siswa-page')
</section>

<link type="text/css" href="/css/admin/siswa-page.css" rel="stylesheet" />

<div class="siswa-page">
    <div class="header-content">
        <div class="search-bar">
            <input type="text" id="mySearch" class="search" onkeyup="myFunction()" placeholder="Search..."> <i class="fas fa-search"></i>
        </div>

        <div class="tambah-siswa">
            <a href="/admin/tambah"><button>Tambahkan +</button></a>
        </div>
    </div>

    <div class="table-content">
        <table>
            <tr>
                <th width="60px">No</th>
                <th width="120px">Foto</th>
                <th width="120px">NIS</th>
                <th>Nama</th>
                <th width="90px">Rombel</th>
                <th width="80px">Rayon</th>
                <th>Username & Password</th>
                <th style="display: none">Email</th>
                <th style="display: none">Agama</th>
                <th style="display: none">JK</th>
                <th width="60px">Aksi</th>
            </tr>
            <tr>
                <td rowspan="2">1</td>
                <td  rowspan="2" class="foto-siswa"><a href="#gambar-siswa"><img src="{{ asset('img/pp.jpg') }}"></a></td>
                <td  rowspan="2">12008125</td>
                <td  rowspan="2">Richal Zacky Aflacha</td>
                <td rowspan="2">RPL XI-3</td>
                <td rowspan="2">Suk 1</td>
                <td>richalzacky</td>
                <td style="display: none">richalzackyaflacha@gmail.com</td>
                <td style="display: none">Islam</td>
                <td style="display: none">L</td>
                <td  rowspan="2" class="btn-aksi"><form>
                        <a class="" href="/admin/edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </form>

                    <button type="submit"  onclick="klik()">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
                <tr>
                    {{-- Tabel Password --}}
                    <td>12345678</td>
                </tr>
            </tr>
        </table>
    </div>

    <div class="overlay" id="gambar-siswa">
        <a href="#" class="close"><i class="far fa-times-circle"></i></a>
        <img class="rounded mx-auto d-block" src="{{ asset('img/pp.jpg') }}">
    </div>
</div>