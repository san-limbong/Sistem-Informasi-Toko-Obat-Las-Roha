<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Extension -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
	<link rel="canonical" href="https://demo-basic.adminkit.io/" />
	<link href="/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	@if(!empty($title))
	<title>{{ $title }}</title>
	@else
	<title>Pengelola Toko</title>
	@endif
</head>

<body>
	<div class="wrapper">
		{{-- Sidebar --}}
		@include('pengelolatoko.partials.sidebar')
		{{-- End Sidebar --}}
		<div class="main">
			{{-- Header/Navbar --}}
			@include('pengelolatoko.partials.navbar')
			{{-- End --}}
			<main class="content">
				@yield('content')
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<strong>SILAS-2022</strong> &copy;
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="/js/app.js"></script>
	<script src="/js/functional.js"></script>

	{{-- input mata uang --}}
	<script type="text/javascript">
		var harga = document.getElementById('harga');
		harga.addEventListener('keyup',function (e) {
			harga.value= formatHarga(this.value,'Rp. ');        
		})
	
		function formatHarga(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			harga = split[0].substr(0,sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);
	
			if(ribuan){
				separator = sisa ? '.' : '';
				harga += separator + ribuan.join('.');
			}
			harga = split[1] != undefined ? harga + ',' + split[1] : harga;
			return prefix == undefined ? harga : (harga ? 'Rp. ' + harga : '');
		}
	</script>

	<script>
		function previewImage(){
        const gambar = document.querySelector('#gambar')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
	</script>
</body>

</html>