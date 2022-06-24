@extends('admin.layouts.app')
@section('content')
<style>
    .profil-page {
        top: 64px;
        left: 300px;
        bottom: 0;
        right: 0;
        position: absolute;
        padding: 20px 50px;
    }

    .profile {
        background-color: black;
        width: 100%;
        height: auto;
        padding: 20px;
        border-radius: 20px;
        border: 2px solid purple;
        box-shadow: 0px 0px 10px black;
        color: white;
        column-count: 2;
        margin-top: 100px;
    }

    .foto-profil {
        width: 300px;
        height: 236px;
        background-color: white;
        position: relative;
        transition: .5s ease-in-out;
        border-radius: 20px;
    }
    .foto-profil img {
        border-radius: 20px;
        border: 2px solid white;
    }
    .foto-profil:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(to bottom, black, purple);
        z-index: 5;
        transition: .5s all;
        opacity: 0;
        border-radius: 20px;
    }
    .foto-profil:hover:before {
        opacity: .7;
    }
    .foto-profil .foto-info {
        font-size: 30px;
        font-weight: bold;
        position: relative;
        z-index: 5;
        color: white;
        transition: .5s all;
        margin-top: -160px;
        opacity: 0;
    }
    .foto-profil:hover .foto-info {
        opacity: 1;
    }
    .foto-info input {
        display: none;
    }

    .info-profil {
        position: relative;
        width: 100%;
        margin-left: -100px;
    }

    .info-profil input{
        width: 100%;
        background: transparent;
        border: none;
        border-bottom: 2px solid purple;
        font-size: 30px;
    }

    .info-profil button {
        background-image: radial-gradient(purple, black);
        padding: 10px 20px;
        border-radius: 10px;
        border: 2px solid white;
        margin-top: 50px;
        transition: .5s;
    }
    .info-profil button:hover {
        transform: scale(1.04);
        box-shadow: 0px 0px 10px white;
    }

</style>

<div class="profil-page">
    <div class="profile">
        <form action="{{ route('edit-profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="foto-profil" align="center">
                <img id="avatar" src="{{  asset('storage/' . Auth::user()->avatar) }}" alt="">
                <div class="foto-info">
                    <label for="file-input">
                        <h1 style="cursor: pointer">Pilih Foto</h1>
                        <input type="file" name="avatar" id="file-input">
                    </label>
                </div>
            </div>

            <div class="info-profil">
                <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Nama">

                <button>Simpan</button>
            </div>

        </form>
    </div>
    <script>
        document.querySelector('#file-input').addEventListener('change', function(event) {
         if (event.target.files.length > 0) {
            const src = URL.createObjectURL(event.target.files[0]);
            const preview = document.querySelector("#avatar");
            preview.src = src;
         }
      });
    </script>
</div>
@endsection
