<?php


include_once('iplikcinedim.php');
use iplikciNedim\mitat\mitat;
use iplikciNedim\rıfkı\rıfkı;

/** Database bağlantı ayarları */
rıfkı::rıfkıAyarlar(
    "localhost",
    "stoktakip",
    "utf8",
    "root",
    "",
);


/** Site Ayarları */
$siteAyar = rıfkı::table('settings') -> where('id',"1") -> get();

$siteUrl = $siteAyar[0] -> url;
$siteAnahtarKelime = $siteAyar[0] -> wordKey;
$siteAciklama = $siteAyar[0] -> description;
$siteBaslik = $siteAyar[0] -> title;
$siteLogo = $siteAyar[0] -> logo;
/** Site Ayarları Son */




/** Ajax */
if(isset($_POST['personelDuzenleTc'])){
    /** Variables */
    $id = $_POST['id'];
    $tc = $_POST['personelDuzenleTc'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5(sha1($_POST['sifre']));
    $phone = $_POST['telefon'];
    $auth = $_POST['auth'];
    $salary = $_POST['maas'];

    $editPersonal = rıfkı::table('users') -> where('id',$id) -> update([
        'tc' => $tc,
        'nameSurname' => $name,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'userAuth' => $auth,
        'salary' => $salary
    ]);

    if($editPersonal){echo 'Düzenleme işlemi başarılı';}else{echo 'Düzenleme işlemi başarısız';}
}elseif(isset($_POST['personelDeleteId'])){
    $id = $_POST['personelDeleteId'];
    $deletePersonal = rıfkı::table('users') -> where('id',$id) -> delete();
    if($deletePersonal){
        echo '
       Silme işlem başaro
        ';
    }
}



/** Ajax */



?>