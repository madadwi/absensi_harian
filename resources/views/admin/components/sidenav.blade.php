<link type="text/css" href="/css/admin/sidenavbar.css" rel="stylesheet" />

<div class="side-navbar">
    <div class="profile-pict">
        <div class="picture">
            <a href="#image-admin" id="back-image"><img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded mx-auto d-block"></a>
        </div>

        <h1>{{ Auth::user()->name }}</h1>
    </div>

    <div class="content-nav">
        <ul class="nav flex-column ">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=/absen-page><i class="fas fa-table"></i> Absensi</a>
            </li>
            <li class="nav-item">
                <button class="dropdown-btn"><i class="fas fa-users"></i> Data Siswa
                    <i class="fa fa-caret-down" style="margin-left: 30px;"></i>
                </button>
                <div class="dropdown-container">
                    <ul>
                        <li><a href="/kehadiran-page">&#10022; Kehadiran</a></li>
                        <li><a href="/students">&#10022; Siswa</a></li>
                        <li><a href="/rayons">&#10022; Rayon</a></li>
                        <!-- <li><a href="/guru">&#10022; admin</a></li> -->

                    </ul>
                </div>
                <!-- <a class="nav-link" href="#"><i class="fas fa-users"></i> Data Siswa</a> -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/rombels"><i class="fas fa-server"></i> Data Rombel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/riwayat-page"><i class="fas fa-history"></i> Riwayat Absensi</a>
            </li>
            <li class="nav-item">
                <button class="dropdown-btn"><i class="fas fa-cog"></i> Pengaturan
                    <i class="fa fa-caret-down" style="margin-left: 30px;"></i>
                </button>
                <div class="dropdown-container">
                    <ul>
                        <li><a href="{{ route('students.create') }}">&#10022; Tambah Siswa</a></li>
                        <li><a href="/edit-page">&#10022; Edit Profile</a></li>
                        
                    </ul>
                </div>
                <!-- <a class="nav-link" href="#"><i class="fas fa-users"></i> Data Siswa</a> -->
            </li>
        </ul>
    </div>
</div>

<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>

<div class="overlay" id="image-admin">
    <a href="#" class="close"><i class="far fa-times-circle"></i></a>
    <img class="rounded mx-auto d-block" src="{{ asset('storage/' . Auth::user()->avatar) }}">
</div>
