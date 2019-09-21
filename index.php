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
<?php
  $chipermethod = array(
   "AES-128-CBC",
   "AES-128-CFB",
   "AES-128-CFB1",
   "AES-128-CFB8",
   "AES-128-OFB",
   "AES-192-CBC",
   "AES-192-CFB",
   "AES-192-CFB1",
   "AES-192-CFB8",
    "AES-192-OFB",
    "AES-256-CBC",
    "AES-256-CFB",
    "AES-256-CFB1",
    "AES-256-CFB8",
    "AES-256-OFB",
    "BF-CBC",
    "BF-CFB",
    "BF-OFB",
    "CAST5-CBC",
    "CAST5-CFB",
    "CAST5-OFB",
    "IDEA-CBC",
    "IDEA-CFB",
    "IDEA-OFB",
    "aes-128-cbc",
    "aes-128-ctr",
    "aes-128-cfb",
    "aes-128-cfb1",
    "aes-128-cfb8",
    "aes-128-ofb",
    "aes-192-cbc",
    "aes-192-cfb",
    "aes-192-cfb1",
    "aes-192-cfb8",
    "aes-192-ofb",
    "aes-256-cbc",
    "aes-256-cfb",
    "aes-256-cfb1",
    "aes-256-cfb8",
    "aes-256-ofb",
    "bf-cbc",
    "bf-cfb",
    "bf-ofb",
    "cast5-cbc",
    "cast5-cfb",
    "cast5-ofb",
    "idea-cbc",
    "idea-cfb",
    "idea-ofb"
);
?>
	
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
                <a class="nav-link" href="home.php" style="color: #F0FFFF">Home</a>
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
                          <h1 class="display-4" style="padding-bottom: 30px; padding-top: 70px; font-family: monospace;">S Y M M E T R I C<br>E N C R Y P T - A P P</h1>
                          <?php
                           session_start();
                           echo @$_SESSION['error']; ?>
                          <div class="info-form">
                              <form method="post" class="form-inlin justify-content-center">
                                   <div class="form-group">
                                      <label><h3>Select Algorithm</h3></label><br>
                                    <select name="method">
                                    <?php
                                    foreach ($chipermethod as $row) {
                                    echo "<option value='".$row."'>".$row."</option>";
                                    }
                                    ?>
                                  </select>
                                  </div>

                                  <div class="form-group">
                                      <label><h3>Encrypt</h3></label>
                                      <textarea name="plain-text" class="form-control" placeholder="Plain Text" rows="3" cols="50" style="font-size: 150%"></textarea>
                                  </div>
                                 
                                  <div class="form-group">
                                      <label><h3>Public Key</h3></label><br>
                                      <input type="password" name="public-key" required="required">
                                  </div>
                                  <div class="form-group">
                                      <label><h3>Re-Enter Public Key</h3></label><br>
                                      <input type="password" name="public-key2"  required="required">
                                  </div>
                              <input type="submit" name="submit" class="p-2 mb-2 bg-success text-white" style="font-size: 150%" value="Submit">
                              </form>
                       	</div>
      					
                          <br>
                         <div class="info-form">
                           <?php
                              if(isset($_POST['submit'])){
                                  $key       = $_POST['public-key'];
                                  $key2      = $_POST['public-key2'];
                                  
                                  if ($key == $key2) {
                                  include "AES128.php";
                                  $plaintext = $_POST['plain-text'];
                                  $method = $_POST['method'];
                                  $aes = new Cryptor($key,$method);
                                  // $aes->key="google.com";
                                  $enkrip = $aes->encrypt($plaintext);
                                  $_SESSION['public-key'] = $key;
                                  $_SESSION['method'] = $method;
                                  
                                  
                                  if($enkrip){
                                    echo "<div class='form-group'>
                                        <label><h3>Result</h3></label>
                                        <textarea type='text-area' class='form-control' placeholder='Result' rows='4' cols='50' readonly='readonly'>".$enkrip."</textarea></div>";
                                    

                                    $_SESSION['error'] = "";
                                    
                                    }else{
                                      echo "<div class='form-group'><label><h2>Result</h2></label><textarea type='text-area' class='form-control' placeholder='Result' rows='4' cols='50'></textarea></div>";
                                    }
                                  }else{
                                    echo '<script language="javascript">';
                                    echo 'alert("Public key yang anda masukan salah!")';
                                    echo '</script>';
                                    $_SESSION['error'] = "Public key yang anda masukan salah!";
                                  }
                              }
                            ?>
                  				</div>
                          <a href="decrypt.php" class="btn btn-outline-secondary btn-sm" type="s" role="button" style="font-size: 130%">
                              Decrpyt
                          </a><br><br><br><br>
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