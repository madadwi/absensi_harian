<style>
    .gambar1 {
        position: absolute;
        width: 300px;
        height: auto;
        top: 100px;
        left: 20px;
    }
    .gambar2 {
        position: absolute;
        width: 300px;
        height: auto;
        top: 250px;
        right: 50px;
    }
</style>

@yield('content')

<div class="gambar1">
    <img src="{{ asset('img/Saly-42.png') }}">
</div>
<div class="gambar2">
    <img src="{{ asset('img/Saly-26.png') }}">
</div>