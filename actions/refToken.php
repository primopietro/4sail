<?php
if(!isset($_SESSION)){session_start();}

require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/referral.php';


$sellerId = htmlspecialchars ($_POST['sellerId']);
$referrerId = $_SESSION['current_user']['user_id'];
$itemId = htmlspecialchars ($_POST['itemId']);

$aRef = new Referral();
$aSecondRef = new Referral();

$aRef->setItem_id($itemId);
$aRef->setRef_user_id($referrerId);
$aRef->setSell_user_id($sellerId);
$aRef->setRef_link(getToken());
$aRef = $aRef->addRef();

if($aRef != null){
    /*$aSecondRef->getObjectFromDB($aRef);*/
    $aSecondRef->getReferral($aRef);
    echo $aSecondRef->getRef_link();
}else{
    echo "fail";
}

function crypto_rand_secure($min, $max) {
    $range = $max - $min;
    if ($range < 0) return $min; // not so random...
    $log = log($range, 2);
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}

function getToken($length=32){
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    for($i=0;$i<$length;$i++){
        $token .= $codeAlphabet[crypto_rand_secure(0,strlen($codeAlphabet))];
    }
    return $token;
}

?>