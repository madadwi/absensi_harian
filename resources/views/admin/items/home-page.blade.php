<section class="admin-home">
    @yield('home-page')
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link type="text/css" href="/css/admin/home-page.css" rel="stylesheet" />

<div class="home-page">
    <div class="clock">
		<ul>
		    <li class="hours"></li>
		    <li class="point">:</li>
		    <li class="min"></li>
		    <li class="ap"></li>
		</ul>
	</div>

    <!-- JS Jam AM/PM -->
		<script type="text/javascript">
			$(document).ready(function() {

			setInterval(function() {
			    // Create a newDate() object and extract the hours of the current time on the visitor's
			    var hours = new Date().getHours() % 12;
			    //At 00 hours we need to show 12 am
			    if (hours === 0) {
			      hours = 12
			    }
			    // Add a leading zero to the hours value
			    $(".hours").html((hours < 10 ? "0" : "") + hours);
			  }, 1000);
			});

			setInterval(function() {
			  	// Create a newDate() object and extract the minutes of the current time on the visitor's
			  	var minutes = new Date().getMinutes();
			  	// Add a leading zero to the minutes value
			  	$(".min").html((minutes < 10 ? "0" : "") + minutes);
			}, 1000);

			setInterval(function() {
			  	var time = new Date().getHours();
			  	var mid = 'AM';
			  	if (time > 12) {
			    	mid = 'PM';
			  	}
			  	$(".ap").html(mid);
			}, 1000);
		</script>

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
			if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
			else (a=tw.getTime());
			tw.setTime(a);
			var tahun= tw.getFullYear ();
			var hari= tw.getDay ();
			var bulan= tw.getMonth ();
			var tanggal= tw.getDate ();
			var hariarray=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
			var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			document.getElementById("hari").innerHTML = hariarray[hari]+" ";
			document.getElementById("tanggal").innerHTML = +tanggal+" "+bulanarray[bulan]+" "+tahun+" ";
		</script>

    <div class="cek-absen" align="center">
        <h1>Klik tombol untuk melihat daftar kehadiran!</h1>

        <a href="/admin/absen"><button>Cek Absen</button></a>

        <h3 class="copyright">&copy; Absensi Harian
        	<script>document.write(new Date().getFullYear())</script>
        </h3>
    </div>
</div>