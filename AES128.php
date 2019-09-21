<?php
class Cryptor
{
  /*
    @author: Abdul Haris
  */
  protected $method = 'aes-128-ctr'; // default cipher method jika tidak ada
  private $key;

  protected function iv_bytes()
  {
    return openssl_cipher_iv_length($this->method);
  }

  public function __construct($key = FALSE, $method = FALSE)
  {

    if(!$key) {
      $key = php_uname(); // default encryption key if jika tidak ada
    }
    if(ctype_print($key)) {
      // convert ASCII keys ke binary format
      $this->key = openssl_digest($key, 'SHA256', TRUE);
    } else {
      $this->key = $key;
    }
    if($method) {
      if(in_array(strtolower($method), openssl_get_cipher_methods())) {
        $this->method = $method;
      } else {
        die(__METHOD__ . ": unrecognised cipher method: {$method}");
      }
    }
  }



  public function encrypt($data)
  {
    $iv = openssl_random_pseudo_bytes($this->iv_bytes());
    return bin2hex($iv) . openssl_encrypt($data, $this->method, $this->key, 0, $iv);
  }

  // decrypt encrypted string
  public function decrypt($data)
  {
    $iv_strlen = 2  * $this->iv_bytes();
    if(preg_match("/^(.{" . $iv_strlen . "})(.+)$/", $data, $regs)) {
      list(, $iv, $crypted_string) = $regs;
      if(ctype_xdigit($iv) && strlen($iv) % 2 == 0) {
        return openssl_decrypt($crypted_string, $this->method, $this->key, 0, hex2bin($iv));
      }
    }
    return FALSE; // failed to decrypt
  }

}

// $plaintext = "Test dengan class terbaru";

//   $encryption_key = 'CKXH2U9RPY3EFD70TLS1ZG4N8WQBOVI6AMJ5';
//   $cryptor = new Cryptor($encryption_key);
//   $crypted_token = $cryptor->encrypt($plaintext);
//   echo $crypted_token."<br/>";

//   $decrypted_token = $cryptor->decrypt($crypted_token);
//   echo $decrypted_token

?>