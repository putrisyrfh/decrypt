<!DOCTYPE html>
<!-- @author: Imam Taufiq Ponco Utomo,Putri Syarifah Tinur, Silma Novshienza -->
<html>
<head>
  <title>Symmetric Encryption</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
</head>
<body>
<div class="pos-f-t">
          <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
              <h4 class="text-white">Collapsed content</h4>
              <span class="text-muted">Toggleable via the navbar brand.</span>
            </div>
          </div>
          <nav class="navbar navbar-dark bg-success">
            <ul class="nav nav-pills" style="font-size: 150%;">
              <li class="nav-item">
                <a class="nav-link" href="#" style="color: #F0FFFF">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php" style="color: #F0FFFF">Encrypt</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="decrypt.php" style="color: #F0FFFF">Decrypt</a>
              </li>
              </li>
            </ul>
          </nav>
        </div>

        <section id="cover">
          <div id="cover-caption">
              <div id="container" class="container">
                  <div class="row text-success">
                      <div class="col-sm-6 offset-sm-3 text-center">
                          <h1 class="display-4" style="padding-bottom: 30px; padding-top: 70px; font-family: monospace;">S Y M M E T R I C<br>E N C R Y P T I O N</h1>
                          <p>Pada sistem symmetric, kunci yang digunakan untuk encrypt dan decrypt adalah sama dengan menggunakan kunci publik, sehingga user yang saling berkomunikasi menggunakan sistem symmetric harus saling berkirim kunci yang sama karena jika mereka tidak menggunakan kunci yang sama maka pesan tidak dapat terbuka di sisi penerima. Jika terdapat seseorang yang berada di tengah-tengah proses kirim terima kunci dan berhasil mendapatkan kunci tersebut maka semua pesan dapat terbuka. Berbeda dengan sistem asymmetric, user hanya perlu mengirimkan kunci publik supaya orang lain dapat berkomunikasi dengan dirinya. User tidak perlu takut penyerang dapat merekonstruksi private key dari kunci publik yang didapatkannya.</p>
                          <br>
                          <br>
                          <p> Kompleksitas pendistribusian kunci  pada symmetric lebih tinggi dibandingkan dengan asymmetric. Setiap satu kunci pada  symmetric digunakan oleh dua user atau satu grup untuk berkomunikas. Akan tetapi, sistem symmetric lebih cepat dalam komputasi dan ciphertext yang dihasilkan lebih sedikit sehingga tidak membebani bandwith pada saat proses pengiriman pesan</p><br><br>
                       </div>
                   </div>
               </div>
          </div>
       	</section>
		<!-- Footer -->
		<footer class="bg-success">
		<!-- Copyright -->
		 <div class="footer-copyright text-center py-4" style="color: #F0FFF0; font-size: 150%">©Cimput (Cima Imam Putri) 2019 Copyright:
		 	<a href="https://ais.uinjkt.ac.id" style="color: #FFFF00">Symmetric Encryption - SI-6B 2019</a>
		 </div>
		<!-- Copyright -->

		</footer>
		<!-- Footer -->
</body>
<style type="text/css">
	html,
body{
	height: 100%;
}
#container {
  border: 5px dashed #556B2F;
  font-style: cursive;
}
#cover { 
  background: #F0FFFF url('gambar/bg1.jpg') center center no-repeat;
  background-size: cover;
  height: 100%;
  text-align: center;
  display: flex;
  align-items: center;
}

#cover-caption {
  width: 100%;
}
</style>
</html>