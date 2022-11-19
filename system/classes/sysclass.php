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


    public static function login(){
        if(isset($_POST['girisButton'])){
            $tc = $_POST['girisTc'];
            $password = md5(sha1($_POST['girisPassword']));

            if(!$tc or !$password){
                echo "Lütfen alanları doldur!";
            }else{
                $personelCek = self::table('users') -> whereRaw('tc = ? and password = ?',[$tc,$password]) -> get();

                if($personelCek){
                    $_SESSION['personalTc'] = $personelCek[0] -> tc;
                    $_SESSION['personalAd'] = $personelCek[0] -> nameSurname;
                    $_SESSION['userAuth'] = $personelCek[0] -> userAuth;
                    header('Location: ../index.php');
                }else{
                    echo "Lütfen bilgilerini kontrol et!";
                }
            }
        }
    }

    
        


} 

?>