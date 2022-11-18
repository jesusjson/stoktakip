<?php
/**
 * session veri
 * 
 */

/**
 * Input keys
 * kadi, sifre,sifreTekrar,mail
 * 
 * girisButton
 * kayitButton
 * 
 * 
 */

/**
 * Message Keys
 * 
 * basariliGiris, basarisizGiris, basariliKayit, basarisizKayit, mevcutMail, mevcutKadi, gecersizMail, bosAlan ,sifreUyusmama
 * 
 */
/**
 * Tablo / Sutun Keys
 * tablo
 * kadi, sifre,mail
 * 
 */

/**
 * Yonlendir keys
 * girisSayfa
 * index
 * 
 */

/**
 * 
 * Mitat
 * 
 * @author Jesu
 * @version 0.0.1
 * 
 * 
 * @github jesusjson
 * @instagram owshitjesu
 * @discord server https://discord.gg/kemirgenhub
 * @discord name jesudeyeter
 * 
 * 
 * @desc Mitat her seferinde kayıt sistemi yapmakdan yorulan arkadaşlarım için yazmış
 * olduğum bir framework sistemi yavaş yavaş geliştiricem <3
 * 
 * [!] Sistemi yaparken Uğur Kılcı abimden ilham aldım üstüne birkaç özellik ekledim.
 * @ugurkılcı github https://github.com/ugurkilci/
 * @orjinal project https://github.com/ugurkilci/ukas/blob/master/ukas.php  
 *
 * 
 */

namespace iplikciNedim\mitat;

use Exception;
use PDO;
use PDOException;

class mitat{
    /** Degiskenler */
    protected static $connection; 

    /** Veritabanı değişkenleri */
    protected static $host;
    protected static $database;
    protected static $charset;
    protected static $dbname;
    protected static $dbpass;

    /** Input değişkenleri */
    protected static $kadi;
    protected static $sifre;
    protected static $sifreTekrar;
    protected static $mail;
    protected static $girisButton;
    protected static $kayitButton;
    /** Input değişkenleri son */

    /** Message değişkenleri */
    protected static $basariliGiris;
    protected static $basarisizGiris;
    protected static $basariliKayit;
    protected static $basarisizKayit;
    protected static $mevcutMail;
    protected static $mevcutKadi;
    protected static $gecersizMail;
    protected static $bosAlan;
    protected static $sifDenk;
    /** Message değişkenleri son */

    /** Tablo / Sutun ayarları */
    protected static $tablo;
    protected static $kadiSutun;
    protected static $sifreSutun;
    protected static $mailSutun;
    /** Tablo / Sutun ayarları son  */

    /** Yonlendirme ayarları */
    protected static $yonlendirme;
    protected static $loginPagePath;
    protected static $indexPagePath;
    /** Yonlendirme ayarları son */

    /** Degiskenler son */

    
    function __construct()
    {
        self::__connect();
    }

    /** Giris Function */
    public static function mitatGiris(){
        $uyeCek = self::$connection -> prepare("SELECT * FROM ".self::$tablo." WHERE ".self::$kadiSutun." = ? and ".self::$sifreSutun." = ?");

        if(isset($_POST[self::$girisButton])){
            $kullaniciAdi = self::filter($_POST[self::$kadi]);
            $kullaniciSifre = self::filter($_POST[self::$sifre]);
            $sifrele = md5(sha1($kullaniciSifre));

            if(!$kullaniciAdi or !$sifrele){
                echo self::$bosAlan; /** Alanlar boş ise hata mesajı verir */
            }else{
                $uyeCek -> execute(array(
	                $kullaniciAdi,
	                $sifrele
	            ));
	            $fetch    = $uyeCek -> fetch(PDO::FETCH_ASSOC);
	            $rowcount = $uyeCek -> rowCount();
                if ($rowcount) { 
                    echo self::$basariliGiris;
	                $_SESSION["mitatKadi"] = $fetch[self::$kadiSutun]; 		// Üye kullanıcı adı
               		$_SESSION["mitatSifre"] = $fetch[self::$sifreSutun]; 		// Üye şifresi
	                $_SESSION["mitatMail"] = $fetch[self::$mailSutun]; 	// Üye epostası
	                
	                header("REFRESH:2;URL=" . self::$indexPagePath); // Yönlendir

	            }else{ // Giriş yapılmamışsa
	                echo self::$basarisizGiris; // Hata mesajı ver
	            }
            }
        }
    }

    /** Kayıt function */
    public static function mitatKayit(){

        if(isset($_POST[self::$kayitButton])){
            $kullaniciAdi = self::filter($_POST[self::$kadi]);
            $kullaniciSifre = self::filter($_POST[self::$sifre]);
            $kullaniciMail = self::filter($_POST[self::$mail]);
            $kullaniciSifreT = self::filter($_POST[self::$sifreTekrar]);

            $sifrele = md5(sha1($kullaniciSifre));

            if(!$kullaniciAdi or !$kullaniciSifre or !$kullaniciMail or !$kullaniciSifreT){
                echo self::$bosAlan; /** Alanlar boş ise hata mesajı verir */
            }else{
                
                $mailKontrol = self::mailKontrol($kullaniciMail);

                if($mailKontrol == "1"){
                    $dbMailKontrol = self::$connection -> prepare("SELECT * FROM ".self::$tablo." WHERE ".self::$mailSutun." =: ".self::$mailSutun);
                    $dbMailKontrol -> execute([
                        $kullaniciMail
                    ]);

                    $epostasaydirma = $dbMailKontrol -> rowCount();

                    if($epostasaydirma > 0){
                        echo self::$mevcutMail; /** E-posta mevcutsa hata mesajı verir */
                    }else{
                        $dbKadiKontrol = self::$connection -> prepare("SELECT * FROM ".self::$tablo." WHERE ".self::$kadiSutun." =: ".self::$kadiSutun);
                        $dbKadiKontrol -> execute([
                            $kullaniciAdi
                        ]);

                        $kadisaydirma = $dbKadiKontrol -> rowCount();

                        if($kadisaydirma > 0){
                            echo self::$mevcutKadi; /** Kullanıcı adı mevcutsa hata mesajı verir */
                        }else{
                            if($kullaniciSifre == $kullaniciSifreT){
                                $sql = "INSERT INTO ".self::$tablo." SET ".self::$kadiSutun." = ?,".self::$mailSutun." = ?,".self::$sifreSutun." = ?";
                                $kayit = self::$connection -> prepare($sql);
                                $kayit -> execute([
                                    $kullaniciAdi,
                                    $kullaniciMail,
                                    $sifrele
                                ]);

                                $uyeCek = self::$connection -> prepare("SELECT * FROM ".self::$tablo." WHERE ".self::$kadiSutun." = ? and ".self::$sifreSutun." = ?");

                                if($kayit){
                                    $uyeCek -> execute([
                                        $kullaniciAdi,
                                        $sifrele
                                    ]);

                                    echo self::$basariliKayit; /** Kayıt başarılı ise mesaj döndürür */
                                    header("REFRESH:2;URL=".self::$loginPagePath);

                                }else{
                                    echo self::$basarisizKayit; /** Kayıt başarısız ise hata mesajı verir */
                                }
                                
                            }else{
                                echo self::$sifDenk; /** Şifreler denk değilse hata mesajı verir */
                            }
                        }
                    }

                }else{
                    echo self::$gecersizMail;
                }
            }
        }
    }

    

    /** Çıkış yapma */
    public static function mitatCikis(){
        session_destroy(); /** Session dataları yok ediyor */
		header("REFRESH:2;URL=".self::$loginPagePath); /** Çıkış yaptıkdan sonra login sayfasına atıyor */
    }


    /** Framework Kullanımı için gerekli ayarlar */
    public static function mitatAyarlar(
        $hostname,$database_name,$character_charset,$database_username,$database_password,
       
    ){
        /** Database Ayarları */
        self::$host = $hostname;
        self::$database = $database_name;
        self::$charset = $character_charset;
        self::$dbname = $database_username;
        self::$dbpass = $database_password;
        /** Database Ayarları Son */

        return new self;
    }

    /** Gerekli input ayarları */
    public static function mitatİnput($inputArray){
        try {
            self::$kadi = $inputArray['kadi'];
            self::$sifre = $inputArray['sifre'];
            self::$sifreTekrar = $inputArray['sifreTekrar'];
            self::$mail = $inputArray['mail'];
            self::$kayitButton = $inputArray['kayitButton'];
            self::$girisButton = $inputArray['girisButton'];
        } catch (Exception $e) {
            echo "[MİTAT ERROR]".$e -> getMessage();
        }
    }

    /** Gerekli Yonlendirme ayarları */
    public static function mitatYonlendir($yonlendir = true, $pathArray){
        try {
            self::$yonlendirme = $yonlendir;            
            self::$loginPagePath = $pathArray['girisSayfa'];
            self::$indexPagePath = $pathArray['index'];
        } catch (Exception $e) {
            echo "[MİTAT ERROR]".$e -> getMessage();
        }
    }

    /** Gerekli tablo ayarları */
    public static function mitatTablo($tablo,$tabloArray){
        try {
            self::$tablo = $tablo;
            self::$kadiSutun = $tabloArray['kadiSutun'];
            self::$sifreSutun = $tabloArray['sifreSutun'];
            self::$mailSutun = $tabloArray['mailSutun'];
        } catch (Exception $e) {
            echo "[MİTAT ERROR]".$e -> getMessage();
        }
    }
    /** Gerekli mesaj ayarları */
    public static function mitatMesaj($mesajArray){
        try {
            self::$basariliGiris = $mesajArray['basariliGiris'];
            self::$basarisizGiris = $mesajArray['basarisizGiris'];
            self::$basariliKayit = $mesajArray['basariliKayit'];
            self::$basarisizKayit = $mesajArray['basarisizKayit'];
            self::$mevcutKadi = $mesajArray['mevcutKadi'];
            self::$mevcutMail = $mesajArray['mevcutMail'];
            self::$gecersizMail = $mesajArray['gecersizMail'];
            self::$bosAlan = $mesajArray['bosAlan'];
            self::$sifDenk = $mesajArray['sifreUyusmama'];
        } catch (Exception $e) {
            echo "[MİTAT ERROR]".$e -> getMessage();
        }
    }
    

    /** Database bağlantısı */
    protected static function __connect(){
        
        try{
            self::$connection = new PDO("mysql:host=".self::$host."; dbname=".self::$database."; charset=".self::$charset, self::$dbname, self::$dbpass);
        }catch(PDOException $e){
            $data =(Object) [
                "type" => "501",
                "title" => "Connection Error!",
                "message" => "Veritabanı bağlantısı kurulamadı!",
                "code" => $e -> getMessage()
            ];
            
            return self::view("501",$data); /** errors/501 sayfasını çağrıyor*/
            exit();
        }
    }

    
    /** Hata sayfaları görüntüleme*/
    public static function view($page,$errorData){
        $file = "errors/".$page.".php";

        if(file_exists($file)){
            include_once($file);
        }elseif(file_exists("../".$file)){
            include_once("../".$file);
        }
        
    }

    /** Mail kontrol */
    protected static function mailKontrol($mail){
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	        return 1;
	    }else{
	        return 0;
	    }
    }

    /** Filtreleme */
    protected static function filter($val,$tf = "false"){
        if($tf == false){$val = strip_tags($val);} /**HTML TAGLARINI TEMİZLEME */
        $val = addslashes(trim($val)); /**SQL INJECTION KORUMASI */
        return $val;
    }

    

}



?>