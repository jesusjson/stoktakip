<?php

use iplikciNedim\rıfkı\rıfkı;

class System extends rıfkı{
    
    /** Kayıt function */
    public static function register(){
        if(isset($_POST['personelKayitButton'])){
           $tc = $_POST['kayitTc'];
           $nameSurname = $_POST['kayitAd'];
           $email = $_POST['kayitEmail'];
           $password = md5(sha1($_POST['kayitPassword']));
           $phone = $_POST['kayitTelefon'];
           $userAuth = $_POST['kayitAuth'];
           $salary = $_POST['kayitMaas'];
            
            if(!$tc or !$nameSurname or !$password){
                echo "Lütfen boş alan bırakmayınız";
            }else{

                if($tc < 11){
                    echo "Lütfen geçerli bir Tc Kimlik numarası giriniz";
                }else{
                    $tcKontrol = self::table('users') -> where('tc',$tc) -> get();

                    if($tcKontrol){
                        echo "Bu personel zaten mevcut";
                    }else{
                        $personelKayit = self::table('users') -> create([
                            'tc' => $tc,
                            'nameSurname' => $nameSurname,
                            'email' => $email,
                            'password' => $password,
                            'phone' => $phone,
                            'userAuth' => $userAuth,
                            'salary' => $salary

                        ]);

                        if($personelKayit){echo "Personel kaydı başarılı bir şekilde oluşturuldu";}else{echo "Kayıt yapılamadı";}

                    }
                }
                
            }
        }
    }

    
        


} 

?>