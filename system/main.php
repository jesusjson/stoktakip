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
/** Site Ayarları Son */


?>