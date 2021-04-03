<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	  <meta content="width=device-width, initial-scale=1.0" name="viewport">
	  
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link href="assets/style.css" rel="stylesheet">
		
	</head>
<body background = "assets/img/Bg.png">
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container-fluid img">
  	<a class="navbar-brand" href="#"><img src="assets/img/logo.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Travel Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">About Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
	<div class ="container-fluid layout">
	   <div class="row">
	    <div class="col-lg-5">
    	<h2>Pendaftaran Rute Penerbangan</h2>
    	<div class = "form-user">
		<form action="" method="POST" id="formItem">
				<!-- Masukan data maskpai. -->
				<div class ="container">
				<div class= "row col-form-label">
				<label class=" col-sm-2 col-form-label">Maskapai:</label>
						<input class="col-sm-6" type="text" class="maskapai input" name="maskapai" placeholder=" Garuda Indonesia, Lion Air, Citilink, etc.">
				</div>
				</div>
				<!-- Masukan data bandara asal. -->
				<div class ="container">
				<div class= "row ">
                <label class=" col-sm-2">Bandara Asal:</label>
                <select class="col-sm-6" name="AsalPenerbangan">
                    <option value="Soekarno-Hatta (CGK)">Soekarno-Hatta (CGK)</option>
                    <option value="Husein Sastranegara (BDO)">Husein Sastranegara (BDO)</option>
                    <option value="Abdul Rachman Saleh (MLG)">Abdul Rachman Saleh (MLG)</option>
                    <option value="Juanda (SUB)">Juanda (SUB)</option>
				</select>
				</div>
				</div>
				
				<!-- Masukan data bandara tujuan. -->
				<div class ="container">
				<div class= "row ">
				<label class=" col-sm-2">Bandara Tujuan:</label></td>
				<select class="col-sm-6" name="TujuanPenerbangan">
                    <option value="Ngurah Rai (DPS)">Ngurah Rai (DPS)</option>
                    <option value="Hasanuddin (UPG)">Hasanuddin (UPG)</option>
                    <option value="Inanwatan (INX)">Inanwatan (INX)</option>
                    <option value="Sultan Iskandarmuda (BTJ)">Sultan Iskandarmuda (BTJ)</option>
				</select>
				</div>
				</div>

				<!-- Masukan data harga tiket. -->
				<div class ="container">
				<div class= "row col-form-label">
				<label class=" col-sm-2 col-form-label">Harga Tiket:</label></td>
				<input class="col-sm-6" type="text" class="tiket" name="hargaTiket" placeholder="IDR"> <br>
				</div>
				</div>
				<br>
				<br>
				<!-- Tombol Kirim/Submit -->
				<div class ="container">
				<div class= "row ">
				<button class="btn btn-dark btn-lg col-sm-2" type="submit" value="submit" name="submit">Submit</button>
				</div>
				</div>
        </form>
		</div>

		<?php
		function totalHarga($a, $b){
		$total = $a + $b;
		return $total;
		}
    	$berkas = "assets/data/data.json"; //Variabel berisi nama berkas di mana data dibaca dan ditulis.
    	$dataCustomer = array(); //Variabel array kosong untuk menampung data customer dari berkas.
    	$dataJson = file_get_contents($berkas);
		$dataCustomer = json_decode($dataJson, true);
		
    	if(isset($_POST['submit'])){
			print_r ($dataBaru);
			//Memasukkan data customer dari form ke dalam array $databaru.
			$dataBaru = array(
			'maskapai' => $_POST['maskapai'],
			'AsalPenerbangan' => $_POST['AsalPenerbangan'],
			'TujuanPenerbangan' => $_POST['TujuanPenerbangan'],
			'hargaTiket' => $_POST['hargaTiket'],
			);
			
			array_push($dataCustomer,$dataBaru); //Menambahkan data baru ke dalam data yang sudah ada dalam berkas. 
			
			//Mengkonversi kembali data customer dari array PHP menjadi array Json dan menyimpannya ke dalam berkas.
			$dataJson = json_encode($dataCustomer, JSON_PRETTY_PRINT);
			file_put_contents($berkas, $dataJson);
			}
		?>
		</div>
		<div class="col-lg-7">
    	<h1> Daftar Rute Tersedia </h1>
		
        <table class = "table table-dark""style="width:90%" border ="1">
			<tr>
			<thead >
				<!-- Header tabel data Customer. -->
				<th>Maskapai</th>
				<th>Asal Penerbangan</th>
				<th>Tujuan Penerbangan</th>
				<th>Harga Tiket</th>
				<th>Pajak</th>
				<th>Total Harga Tiket</th>
				</thead>
            </tr>
		<?php
			sort ($dataCustomer);
    		for ($i=0; $i < count($dataCustomer); $i++){
		
		
			$AsalPenerbangan = $dataCustomer[$i]['AsalPenerbangan'];

			$pajakAsal =0;
			if( $AsalPenerbangan == 'Soekarno-Hatta (CGK)') {
			$pajakAsal = 50000;
			}
			elseif ($AsalPenerbangan == 'Husein Sastranegara (BDO)') {
			$pajakAsal = 30000;
			}
			elseif ($AsalPenerbangan == 'Abdul Rachman Saleh (MLG)') {
			$pajakAsal = 40000;
			}
			elseif ($AsalPenerbangan == 'Juanda (SUB)') {
			$pajakAsal = 40000;
			}

			$pajakTujuan =0;
			$TujuanPenerbangan = $dataCustomer[$i]['TujuanPenerbangan'];
			if ($TujuanPenerbangan == 'Ngurah Rai (DPS)') {
			$pajakTujuan = 80000;
			}
			elseif ($TujuanPenerbangan == 'Hasanuddin (UPG)') {
		   $pajakTujuan = 70000;
	   		}
			elseif ($TujuanPenerbangan == 'Inanwatan (INX)') {
			$pajakTujuan =90000;
			}
			elseif ( $TujuanPenerbangan == 'Sultan Iskandarmuda (BTJ)' ) {
		   $pajakTujuan =70000;
			   }
		

		$pajak = totalHarga ($pajakAsal,$pajakTujuan);
		
		$maskapai = $dataCustomer[$i]['maskapai'];
		
		$HargaTiket = $dataCustomer[$i]['hargaTiket']; 
		
		
		
		//	Baris untuk menampilkan data customer.
		
		echo "<tr>
				<td>".$maskapai."</td> <!-- Data nama. -->
				<td>".$AsalPenerbangan."</td> <!-- Data nomor hp. -->
				<td>".$TujuanPenerbangan."</td> <!-- Data jenis kelamin. -->
				<td>".$HargaTiket."</td> <!-- Data jenis kelamin. -->
				<td>". $pajak."</td> <!-- Data item3. -->
				<td>". totalHarga ($HargaTiket,$pajak)."</td> <!-- Data item3. -->
			</tr>";
		}
		?>
		</table>
	 	</div>
	</div>
</div>
</body>

<footer>
    <label class="footer"> Created By Riskafian Medika Imzhagi</label>
</footer>

</html>
