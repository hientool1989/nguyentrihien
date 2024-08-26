error_reporting(0);
system("clear");



$a1 = "content-type:application/json;charset=utf-8";
$a2 = "t:VFZSamVVNUVVWGhPUkVFeVRWRTlQUT09";

function clear() {system("clear");}

function tong(){global $authu, $ser, $nana, $xyxy;
file_put_contents('tong.txt',"$authu|$ser|$nana|PROXY=$xyxy\n", FILE_APPEND);}



function DNGLK() {global $tsm99, $xyxy, $proxy;
$link= "https://gateway.golike.net/api/users/me";
if ($xyxy == false) {return GOIGET($link, $tsm99, null, null);}
if ($xyxy == true) {return GOIGET($link, $tsm99, null, $proxy);}}


function chekxy () {global $xyxy;
$date = "ip_proxy=".$xyxy."&selected_proxy=https";
$tet = GOIPOST("https://proxy.mkvn.net/checkproxy/Checkproxy.php", null, $date, null);
$met = $tet['combinedResponse'];
return $met;}




















while (true) {

echo "NHAP AUTHOZATION (GOLIKE) : ";
$authu = trim(fgets(STDIN));system('clear');
if ($authu == false) {break;}


echo "NHAP USER_ANGET : ";
$ser = trim(fgets(STDIN));system('clear');
if ($ser == false) {break;}



while (true) {
echo "NHAP PROXY ( KHONG NHAP BAM ENTER BO QUA ) : ";
$xyxy = trim(fgets(STDIN));system('clear');
if ($xyxy == false) {break;}

$met = chekxy();
if (strpos($met, 'DIE') == true) {echo "PROXY KHONG HOAT DONG HOAC LOI\n";sleep(2);@system('clear');continue;}
elseif (strpos($met, 'LIVE') == true) {echo "PROXY NAY HOAT DONG TOT\n";sleep(2);@system('clear');}



$proxyParts = explode(":", $xyxy);
if (count($proxyParts) === 4) {
$proxy = array(
'ip' => $proxyParts[0],
'port' => $proxyParts[1],
'user' => $proxyParts[2],
'pass' => $proxyParts[3]);break;}else{continue;}}





$a3 = "authorization: $authu";
$a4 = "user-agent: $ser";
$tsm99 = array($a1, $a2, $a3, $a4);
$result   = DNGLK();
$login = $result['jsonData'];
$ketqua = $login['status'];
if ($ketqua == 200) {} else {echo "AUTHOZATION HOAC USER_ANGEN\n";sleep(2);clear();continue;}
$nana = $login['data']['username'];
echo "DA LUU TAI KHOAN GOLIKE $nana VAO FILE\n";sleep(2);clear();

tong();



continue;} ///// while





















































function GOIGET($host, $tsm = null, $data = null, $proxy = null, $requestType = "GET") {
return HAMTONG($host, $tsm, $data, $proxy, $requestType, false);}
function GOIPOST($host, $tsm = null, $data = null, $proxy = null, $requestType = "POST") {
return HAMTONG($host, $tsm, $data, $proxy, $requestType, false);}
function KHONGCOOKIE($host, $tsm = null, $data = null, $proxy = null, $requestType = "POST") {
return HAMTONG($host, $tsm, $data, $proxy, $requestType, false);}
function LAYCOOKIE($host, $tsm = null, $data = null, $proxy = null, $requestType = "POST", $cookieFile = 'cookie.txt') {
return HAMTONG($host, $tsm, $data, $proxy, $requestType, true, $cookieFile);}
















function HAMTONG($host, $tsm = null, $data = null, $proxy = null, $requestType = "POST", $useCookies = false, $cookieFile = "cookie.txt") {
$ch = curl_init();
$curlOptions = array(
CURLOPT_URL => $host,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_HEADER => true,
CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_TIMEOUT => 30,
CURLOPT_CUSTOMREQUEST => $requestType,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTPHEADER => $tsm ?? array(),
CURLOPT_POSTFIELDS => $data ?? '',
CURLOPT_PROXY => $proxy['ip'] ?? null,
CURLOPT_PROXYPORT => $proxy['port'] ?? null,
CURLOPT_PROXYUSERPWD => isset($proxy['user'], $proxy['pass']) ? "{$proxy['user']}:{$proxy['pass']}" : null);


if ($useCookies) {
$curlOptions[CURLOPT_COOKIEJAR] = $cookieFile;
$curlOptions[CURLOPT_COOKIEFILE] = $cookieFile;}

curl_setopt_array($ch, $curlOptions);
$response = curl_exec($ch);
$error = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
curl_close($ch);
$header = substr($response, 0, $headerSize);
$body = substr($response, $headerSize);
$jsonData = json_decode($body, true);
if (json_last_error() !== JSON_ERROR_NONE) $jsonData = null;
return array(
'combinedResponse' => $header . "\n" . $body,
'jsonData' => $jsonData,
'html' => $body,
'error' => $error,
'httpCode' => $httpCode);}


