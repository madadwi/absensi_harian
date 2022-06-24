<section class="admin-edit">
    @yield('edit-page')
</section>

{{-- <link type="text/css" href="/css/admin/edit-page.css" rel="stylesheet" /> --}}

<section class="admin-tambah">
    @yield('tambah-page')
</section>

{{-- <link type="text/css" href="/css/admin/edit-page.css" rel="stylesheet" /> --}}

<style>
    .edit-page {
        top: 64px;
        left: 300px;
        bottom: 0;
        right: 0;
        position: absolute;
        padding: 20px 50px;
    }

    .edit-page .bg-table {
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
    }

    .bg-table input {
        background-color: lightgrey;
        box-shadow: 0px 0px 10px grey;
        border: 2px solid purple;
        border-radius: 10px;
        color: black;
        font-weight: 800;
    }

    .bg-table .input1 {
        width: 100%;
    }

    .bg-table .judul-input {
        padding-left: 10px;
    }

    .bg-table select {
        background-color: black;
        border: 2px solid purple;
        border-radius: 10px;
        box-shadow: 0px 0px 5px grey;
    }

    .eye {
        position: absolute;
        color: black;
        margin-left: -35px;
        margin-top: 15px;
        cursor: pointer;
    }

    #show {
        display: none;
    }

    .bg-table-btn button{
        background-image: radial-gradient(purple, black);
        padding: 12px;
        border-radius: 20px;
        border: 2px solid white;
        text-shadow: 0px 0px 10px black;
        box-shadow: 0px 0px 10px grey;
        transition: .5s;
        font-weight: 500;
    }
    .bg-table-btn button:hover {
        background-image: radial-gradient(skyblue, blue);
        transform: scale(1.04);
    }

    .bg-table .btn-kembali {
        position: absolute;
        left: 70px;
        background-image: radial-gradient(grey, black);
        padding: 7px;
    }
    
</style>

<div class="edit-page">
    <form action="">
        <div class="bg-table">
            <table>
                <tr>
                    <td><h1>IDENTITAS</h1></td>
                </tr>
                <tr>
                    <td class="judul-input">NIS :</td>
                    <td style="padding-left: 15px;">Nama Lengkap :</td>
                </tr>
                <tr>
                    <td><input class="input1" type="number" name="nis" placeholder="Masukan NIS.."></td>
                    <td><input class="input1" style="margin-left: 5px;" type="text" name="nama" placeholder="Masukan Nama.."></td>
                </tr>
            </table>
        </div>    

        <div class="bg-table">
            <table>
                <tr>
                    <td><h1>KELAS</h1></td>
                </tr>
                <tr>
                    <td class="judul-input">Rombel :</td>
                    <td class="judul-input">Rayon :</td>
                </tr>
                <tr>
                    <td>
                        <select name="rombel" id="">
                            <option selected="selected">Pilih Rombel</option>
                            <option value="rplxi1">RPL XI-1</option>
                            <option value="rplxi2">RPL XI-2</option>
                            <option value="rplxi3">RPL XI-3</option>
                            <option value="rplxi4">RPL XI-4</option>
                            <option value="rplxi5">RPL XI-5</option>
                        </select>
                    </td>
                    <td>
                        <select name="rayon" id="">
                            <option selected="selected">Pilih Rayon</option>
                            <option value="suk1">Suk 1</option>
                            <option value="suk2">Suk 2</option>
                            <option value="taj1">Taj 1</option>
                            <option value="taj2">Taj 2</option>
                            <option value="taj3">Taj 3</option>
                            <option value="taj4">Taj 4</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <div class="bg-table">
            <table>
                <tr>
                    <td><h1>AKUN</h1></td>
                </tr>
                <tr>
                    <td class="judul-input">Username :</td>
                    <td class="judul-input">E-mail :</td>
                    <td class="judul-input">Password :</td>
                </tr>
                <tr>
                    <td><input class="input1" type="text" name="username" placeholder="Masukan Username.."></td>
                    <td><input class="input1" type="email" name="email" placeholder="Maukan Email.."></td>
                    <td>
                        <input class="input1"  id="password" type="password" name="password" placeholder="Masukan Password..">
                        <span class="eye" onclick="executePassword()">
                            <!--Icon mata-->
                            <i class="fas fa-eye" id="show"></i>
                            <i class="fas fa-eye-slash" id="hide"></i>
                        </span>
                    </td>
                </tr>
            </table>
        </div>

        <script>
            //JS animasi mata pada password
            function executePassword() {
                var x = document.getElementById('password');
                var y = document.getElementById('show');
                var z = document.getElementById('hide');

                if (x.type === 'password') {
                    x.type = "text";
                    y.style.display = "block";
                    z.style.display = "none";
                } else {
                    x.type = "password";
                    y.style.display = "none";
                    z.style.display = "block";
                }
            }
        </script>

        <div class="bg-table">
            <table>
                <tr>
                    <td><h1>Lainnya</h1></td>
                </tr>
                <tr>
                    <td  class="judul-input">Agama :</td>
                    <td  class="judul-input">Jenis Kelamin :</td>
                </tr>
                <tr>
                    <td>
                        <select name="agama" id="">
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
        </div>

        <div class="bg-table bg-table-btn" align="center">
            <button>Tambahkan Siswa</button>
            <a href=""><button class="btn-kembali"><i class="fas fa-arrow-circle-left"></i> Kembali</button></a>
        </div>
    </form>
</div>