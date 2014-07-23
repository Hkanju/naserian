<?php
class CustomUrlRule extends CBaseUrlRule {

var $skey = "key123456789"; // you can change it

    public function createUrl($manager, $route, $params, $ampersand) {
       $paramString = array();
       foreach ($params as $key => $value) {
          $paramString[] = $key;
          $paramString[] = $value;
       }
    
       $paramString = implode(",", $paramString);
       $paramStringEncoded = $this->encode($paramString);
       return $route . '/' . $paramStringEncoded;
    }

    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo) {
       $pathParams = explode("/", $pathInfo);
       if (isset($pathParams[2])) {
          $paramStringDecoded = $this->decode($pathParams[2]);
          $params = explode(",", $paramStringDecoded);
          for ($i = 0; $i < count($params); $i+= 2) {
             $_GET[$params[$i]] = $params[$i + 1];
             $_REQUEST[$params[$i]] = $params[$i + 1];
          }
       }
       return $pathInfo;
   }

public function safe_b64encode($string) {

$data = base64_encode($string);
$data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
return $data;
}

public function safe_b64decode($string) {
$data = str_replace(array('-', '_'), array('+', '/'), $string);
$mod4 = strlen($data) % 4;
if ($mod4) {
$data .= substr('====', $mod4);
}
return base64_decode($data);
}

public function encode($value) {

if (!$value) {
return false;
}
$text = $value;
$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
return trim($this->safe_b64encode($crypttext));
}

public function decode($value) {

if (!$value) {
return false;
}
$crypttext = $this->safe_b64decode($value);
$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
return trim($decrypttext);
}

}
?>
