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
                <a class="nav-link" aria-current="page" href="/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href=/absenn><i class="fas fa-table"></i> Absensi</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/riwayat"><i class="fas fa-history"></i> Riwayat Absensi</a>
            </li> --}}

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
    <img class="rounded mx-auto d-block" src="{{ Auth::user()->avatar }}">
</div>
