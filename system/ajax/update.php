<?php
include_once('../main.php');
use iplikciNedim\rıfkı\rıfkı;


/** Kullanıcı Güncelle */
if(isset($_POST['kullaniciGuncelleTc'])){
    $id = $_POST['id'];
    $tc = $_POST['kullaniciGuncelleTc'];
    $ad = $_POST['ad'];
    $kullanicilar = rıfkı::table('kullanıcılar') -> where('id',$id) -> update([
        "tcNo" => $tc,
        "adSoyad" => $ad
    ]);
    if($kullanicilar){echo "Güncelleme işlemi başarılı!";}else{echo "Güncelleme işlemi başarısız!";}

}elseif (isset($_POST['siteGuncelleBaslik'])) {
    /** Site ayarları güncelle */
    $baslik = $_POST['siteGuncelleBaslik'];
    $url = $_POST['url'];
    $aciklama = $_POST['aciklama'];
    $anahtar = $_POST['anahtar'];
    $siteAyar = rıfkı::table('ayarlar') -> where('id','1') -> update([
        "title" => $baslik,
        "siteUrl" => $url,
        'anahtarKelime' => $anahtar,
        'siteAciklama' => $anahtar
    ]);
    if($siteAyar){echo "Site ayarları başarılı bir şekilde güncellendi!";}else{echo "Site ayarları güncellenemedi!";}
}





?>