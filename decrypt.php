<!DOCTYPE html>
<html>
<head>
	<title>Simetric Encryption</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

  <?php
    session_start();
  ?>
	<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container">
            <div class="row text-success">
               <div class="col-sm-6 offset-sm-3 text-center">
                    <h1 class="display-4" style="padding-bottom: 30px; padding-top: 70px; font-family: monospace;">S Y M M E T R I C<br>D E C R Y P T - A P P</h1>
                    <div class="info-form">
                        <form action="" method="post" class="form-inlin justify-content-center">
                            <div class="form-group">
                                <label><h2>Decrypt</h2></label>
                                <textarea class="form-control" name="ciphertext" placeholder="Chipper Text" required="required" style="font-size: 150%"></textarea>
                            </div>
                            <div class="form-group">
                                <label><h3>Public Key</h3></label><br>
                                <input type="password" name="public-key" required="required">
                            </div>
                           <input type="submit" name="submit" class="btn btn-success" value="Submit">
                        </form>
                  </div>
          
                    <br>
                   <div class="info-form">
                    <?php
                    if(isset($_POST['submit']) && $_POST['ciphertext']){ 
                    $key = $_POST['public-key'];
                    if ($key == @$_SESSION['public-key'])
                    {
                      include "AES128.php";
                      $method = $_SESSION['method'];
                      $aes = new Cryptor($key,$method);


                       // $ciphertext = $_SESSION['ciphertext'];
                       
                       $ciphertext = $_POST['ciphertext'];

                       // var_dump($_POST['ciphertext']);
                       // var_dump($_SESSION['ciphertext']);
                       $dekrip = $aes->decrypt($ciphertext);             
                    
                    if($dekrip){
                      echo "<div class='form-group'>
                          <label><h3>Result</h3></label>
                          <textarea type='text-area' class='form-control' placeholder='Result' rows='4' cols='50'>".$dekrip."</textarea></div>";
                      }else{
                        echo "<div class='form-group'><label><h2>Result</h2></label><textarea type='text-area' class='form-control' placeholder='Result' rows='4' cols='50'></textarea></div>";
                      }
                    }else{
                      echo '<script language="javascript">';
                      echo 'alert("Public key yang anda masukan salah!")';
                      echo '</script>';
                    }
                   }
                  ?>
                    <a href="index.php" class="btn btn-outline-secondary btn-sm" role="button" onclick="" style="font-size: 130%">
                        Encrypt
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
  font-style: "Courier New", Courier, monospace;
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