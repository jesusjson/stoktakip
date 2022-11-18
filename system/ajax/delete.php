<?php
include_once('../main.php');
use iplikciNedim\rıfkı\rıfkı;
$id = $_POST['id'];
$kullanicilar = rıfkı::table('kullanıcılar') -> where('id',$id) -> delete();


if($kullanicilar){
    echo "Silme işlemi başarılı!";
}else{
    echo "Silme işlemi başarısız!";
}

?>