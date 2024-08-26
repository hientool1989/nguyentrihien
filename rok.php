
error_reporting(0);
system('clear');

function clearScreen() {
if (PHP_OS === 'WINNT') {system('cls');} else {system('clear');}}
$denden = "\033[1;30m";                                                          $red = "\033[1;31m";                                                             $green = "\033[1;32m";                                                           $yellow = "\033[1;33m";                                                          $blue = "\033[1;34m";                                                            $res = "\033[1;35m";                                                             $nau = "\033[1;36m";                                                             $trang = "\033[1;37m";                                                           $cam = "\033[1;38;5;208m";                                                       $hongnhac = "\033[1;38;5;218m";                                                  $xam = "\033[1;38;5;250m";                                                       $den = "\033[1;38;5;0m";                                                         $xanhla = "\033[1;38;5;2m";                                                      $xanhduong = "\033[1;38;5;4m";                                                   $tim = "\033[1;38;5;5m";                                                         $xanhngoc = "\033[1;38;5;6m";                                                    $hongdam = "\033[1;38;5;201m";                                                   $reset = "\033[0m";                                                              $colors = [$den, $xanhla, $xanhduong, $tim, $xanhngoc, $hongdam, $xam, $hongnhac, $denden, $red, $green, $yellow, $blue, $res, $nau, $trang, $cam];




function token(){global $utoken;
file_put_contents('token.txt',"$utoken|\n", FILE_APPEND);}




function HAMTONG($host, $tsm = null, $data = null, $requestType = "POST") {
$mr = curl_init();
if ($tsm !== null && !is_array($tsm)) {$tsm = array($tsm);}
curl_setopt_array($mr, [
CURLOPT_URL => $host,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_TIMEOUT => 30,
CURLOPT_CUSTOMREQUEST => $requestType,
CURLOPT_HTTPHEADER => is_array($tsm) ? $tsm : [$tsm],
CURLOPT_POSTFIELDS => ($data !== null && $requestType !== "GET") ? $data : null]);
$response = curl_exec($mr);
curl_close($mr);
return $response;}
function GOIPOST($host, $tsm = null, $data = null) {return HAMTONG($host, $tsm, $data, "POST");}
function GOIGET($host, $tsm = null) {return HAMTONG($host, $tsm, null, "GET");}
function GOIPUT($host, $tsm = null, $data = null) {return HAMTONG($host, $tsm, $data, "PUT");}
function bv($vanban){$str = strlen($vanban);
for($ii=0;$ii<=$str;$ii++){echo $vanban[$ii]; usleep(2000);}
return 1;}
function mothai () {echo "                                                               \r";}



$a2 = "device:Xiaomi 2201117TG";
$a3 = "versionCode:187";
$a5="Content-Type:application/json; charset=UTF-8";


function login () {global $tsm1;
$login = GOIPOST("http://tuberocket.app:3000/api/signIn", $tsm1, null);
return explode('"', explode('token":"', $login)[1])[0];}
function tk () {global $tsm2;
return GOIGET("http://tuberocket.app:3000/api/member", $tsm2, null);}
function video () {global $tsm2;
return GOIGET("http://tuberocket.app:3000/api/video", $tsm2, null);}
function nhanxu () {global $id, $delay, $tsm3;
$data='{"id":"'.$id.'","playCount":0,"playSecond":'.$delay.',"boost":0,"status":""}';
return GOIPUT("http://tuberocket.app:3000/api/video", $tsm3, $data);}




function timao() {global $delay, $colors;
$width = 30; // Chiều dài của vùng di chuyển
$startTime = microtime(true); // Thời gian bắt đầu
$duration = $delay; // Thời gian tối đa (30 giây)
$direction = 1; // Hướng di chuyển (1 = từ trái qua phải, -1 = từ phải qua trái)
$position = 0; // Vị trí hiện tại của dòng chữ
while ((microtime(true) - $startTime) < $duration) {
$elapsedTime = microtime(true) - $startTime;
$remainingTime = $duration - $elapsedTime;
$deo = max(0, floor($remainingTime));
if ($direction == 1) {
$spaces = str_repeat(' ', $position);
$text = $spaces . "VUI LONG DOI [ $deo GIAY / $duration ]";
if ($position >= $width) {
$direction = -1;}
} else {
$spaces = str_repeat(' ', $width - $position);
$text = $spaces . "VUI LONG DOI [ $deo GIAY / $duration ]";
if ($position <= 0) {
$direction = 1;}}
$quay = $colors[array_rand($colors)];
echo $quay."$text\r";
usleep(30000); mothai();
$position += $direction;}
echo str_repeat(' ', $width + 30) . "\r";}


function banne(){global $cam,$res,$res,$yellow,$trang,$blud,$nau,$green,$denden;
$hj1=$red."
$res
$red                  ████   ██ ██████ ██    ██
$yellow                  ██ ██  ██   ██   ██    ██
$trang                  ██  ██ ██   ██   ████████
$blud                  ██   ████   ██   ██    ██
$res                  ██    ███   ██   ██    ██
";

$hj2=$nau."───────────────────────────────────────────────────────\n";
$hj3=$green."              KENH  : TOOL KIẾM TIỀN ONLINE \n";
$hj4=$trang."              YOUTUBE :  NGUYEN TRI HIEN \n";
$hj5=$cam."              TOOOOOL :     TUBEROCKET \n";
$hj6=$denden."───────────────────────────────────────────────────────\n\n";
bv($hj1);
bv($hj2);
bv($hj3);
bv($hj4);
bv($hj5);
bv($hj6);}



echo "MUON CHAY BAO NHIEU JOB THI TOOL TAT : ";
$soluong = trim(fgets(STDIN));system('clear');





while (true) {
$motoken2 = explode("\n", @file_get_contents('token.txt'));
$motoken1 = $motoken2[0];
$motoken  = explode('|', $motoken1)[0];
if ($motoken == false) {
echo "NHAP TOKEN : ";
$utoken = trim(fgets(STDIN));system('clear');
$dem = strlen($utoken);
if ($dem < 10) {@system('clear');continue;}

token();
continue;} else {
$token  = explode('|', $motoken1)[0];}




while (true) {$mi++;


$a1 = "token:$token";
$tsm1 = array ($a1, $a2, $a3);


$token = login();
if ($token == false) {break;}


$a4 = "token: $token";
$tsm2 = array ($a4);
$tsm3 = array ($a4, $a5);




$tk = tk();
$mai  = explode('"', explode('email":"', $tk)[1])[0];

if ($mi == 1) {
$coin = explode(',"', explode('coin":', $tk)[1])[0];
$go=$trang."$mai ".$denden."|| $nau$coin\n\n";
banne();
bv($go);
}




$hok = "0";$koko = "0";
while (true) {
$job   = video();
$id    = explode('"', explode('videoId":"', $job)[1])[0];

if ($id == false) {$koko++;
if ($koko > 10) {mothai();break;}
echo "HET JOB .............\r";
continue;}

$delay = explode('}', explode('playSecond":', $job)[1])[0];
timao();




$nhantien = nhanxu();
if (strpos($nhantien, 'Success!!') == true){$jjj++;$hok++;
$poi = explode('}', explode('coin":', $nhantien)[1])[0];
$tien = $cam."THANH CONG ".$red."+ $yellow$delay XU ".$hongnhac."|| ".$trang."HIEN CO ".$blud.": $yellow$poi ".$denden."XU ".$xanhngoc."[ $green$jjj JOB ".$xanhngoc."]\n";
bv($tien);
if ($hok > 10) {break;}

if ($jjj == $soluong || $jjj > $soluong) {echo $cam."DA CHAY DU $soluong JOB \n";exit;}


continue;
} else {continue;}}




}

}
