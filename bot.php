<html>
<head>
<title>V4R1ABLE - WordPress Tema Bilgileri Bot</title>
<meta name="generator" content="https://github.com/v4r1able" />
<meta name="author" content="V4R1ABLE" />
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap'); body { text-align:center; font-family:"Open Sans", sans-serif; margin:0; height:100%; } .v4-form { display:flex; justify-content:center; } .v4-form .v4-form-i { margin-left:30px; margin-bottom: 1rem; } .v4-form .v4-form-i .v4-form-c { display:block; padding: .375rem .75rem; } .buton { display: inline-block; font-weight: 400; text-align: center; white-space: nowrap; vertical-align: middle; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; border: 1px solid transparent; padding: 0.3rem 1.75rem; line-height: 1.2rem; border-radius: .25rem; cursor: pointer; color: white; background-color: #007bff; border-color: #007bff; } a { text-decoration:none; color:#007bff; } .v4-form .v4-form-i label { font-weight:800; display: inline-block; margin-bottom: .5rem; } .arama-yap { margin-top:45px; } .aranacak { margin-top:15px; } .alt { margin-top:15px; font-weight:800; } .alt .v4r1able { color:grey; } .alt .v4r1able:hover { color:#007bff; }
</style>
</head>
<body>
<div class="wp-tema-bulucu">
<img src="https://i1.wp.com/obir.ninja/wp-content/uploads/2020/12/cropped-obirninja_logo-1.png?w=350&ssl=1">
<form class="v4-form" action="" method="POST">
<div class="v4-form-i aranacak">
<label>Site Adresi</label>
<input class="v4-form-c" name="aranacak" type="text" placeholder="Site adresi yazın..." value="<?php if(isset($_POST["aranacak"])) { echo htmlspecialchars($_POST["aranacak"]); } ?>">
</div>

<div class="v4-form-i arama-yap">
<button class="buton" name="V4" type="submit">Arama Yap</button>
</div>
</form>
</div>
<?php
error_reporting(0);
// v4r1able - obir.ninja

function curl_v4($site) {
$curl_v4 = curl_init();
curl_setopt($curl_v4, CURLOPT_URL, $site);
curl_setopt($curl_v4, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36");
curl_setopt($curl_v4, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl_v4, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl_v4, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl_v4, CURLOPT_SSL_VERIFYPEER, false);

$gir_v4 = curl_exec($curl_v4);

return $gir_v4;
}

function ham_url_v4($url) {
$url = explode("/", $url);
$url = str_replace("https://", "", $url[2]);
$url = str_replace("http://", "", $url);
$url = str_replace("www.", "", $url);
        
return $url;
}

if(isset($_POST["V4"])) {

if(empty(trim($_POST["aranacak"]))) {
     echo 'Aranacak bir şey yazmalısınız.';
} else {
$aranacak = $_POST["aranacak"];


$gir_v4 = curl_v4($aranacak);

preg_match_all('@wp-content/themes/(.*?)/@', $gir_v4, $v4);

if(empty(trim($v4[1][0]))) { echo 'Sistem tema dizinini bulamadı.'; } else {

$tema_bilgisi = curl_v4($aranacak."wp-content/themes/".$v4[1][0]."/package.json");

$tema_bilgisi = json_decode($tema_bilgisi, true);

if(empty(trim($tema_bilgisi["name"]))) {
$tema_bilgisi = curl_v4(ham_url_v4($aranacak)."/wp-content/themes/".$v4[1][0]."/package.json");
$tema_bilgisi = json_decode($tema_bilgisi, true);
if(empty(trim($tema_bilgisi["name"]))) {
$tema_bilgisi = curl_v4(ham_url_v4($aranacak)."/wp-content/themes/".$v4[1][0]."/readme.txt");
if(empty(trim($tema_bilgisi))) {
    echo 'Tema sahibi tema bilgilerini silmiş ve tema notu bırakmamış';
} else {
    echo 'Tema sahibi tema bilgilerini silmiş ve şöyle bir not bırakmış:<pre>'.htmlspecialchars($tema_bilgisi).'</pre>'; 
}
} else {
    echo "Tema adı: ".htmlspecialchars($tema_bilgisi["name"])."<br>
    Tema versiyon: ".htmlspecialchars($tema_bilgisi["version"])."<br>
    Tema açıklaması: ".htmlspecialchars($tema_bilgisi["description"])."<br>
    Tema yazarı: ".htmlspecialchars($tema_bilgisi["author"])."<br>
    Tema lisansı: ".htmlspecialchars($tema_bilgisi["license"])."<br>
    Tema adresi: <a href='".htmlspecialchars($tema_bilgisi["homepage"])."' target='_blank'>".htmlspecialchars($tema_bilgisi["homepage"])."</a><br>";
}
} else {
   echo "Tema adı: ".htmlspecialchars($tema_bilgisi["name"])."<br>
   Tema versiyon: ".htmlspecialchars($tema_bilgisi["version"])."<br>
   Tema açıklaması: ".htmlspecialchars($tema_bilgisi["description"])."<br>
   Tema yazarı: ".htmlspecialchars($tema_bilgisi["author"])."<br>
   Tema lisansı: ".htmlspecialchars($tema_bilgisi["license"])."<br>
   Tema adresi: <a href='".htmlspecialchars($tema_bilgisi["homepage"])."' target='_blank'>".htmlspecialchars($tema_bilgisi["homepage"])."</a><br>";
}
} } }
?>
<div class="alt">
<a class="v4r1able" href="https://github.com/v4r1able" title="Github">V4R1ABLE</a> - <a href="https://obir.ninja">obir.ninja</a>
</div>
</body>
</html>
