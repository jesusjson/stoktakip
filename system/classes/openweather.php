<?php 

namespace iplikciNedim\OpenWeather;
/** api website url: https://openweathermap.org */
class OpenWeather{
    public static $apiKey;
    public static $city;
    public static $lang;
    public static $units;
    public static $data;
    

    /**
     * key - api keyiniz
     * lang - sistem diliniz
     * unit - sıcaklık biriminiz 
     */
    public static function start($key,$language = "tr",$unit = "metric"){
        self::$apiKey = $key;
        self::$lang = $language;
        self::$units = $unit;
        return new self;
    }


    /**Hava durumunu öğrenmek istediğiniz il*/
    public static function city($weatherCity){
        self::$city = $weatherCity;

        /** Geocode işlemi */
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.openweathermap.org/geo/1.0/direct?q=".$weatherCity."&limit=1&appid=".self::$apiKey,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $x = curl_exec($curl);
        curl_close($curl);
        
        $data = json_decode($x, FALSE);
        $lat = $data[0] -> lat;
        $lon = $data[0] -> lon;
        /** Geocode son */

        /****************************************************************************************************** */

        /** Bilgilerin çekilmesi */
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=".self::$apiKey."&units=".self::$units."&lang=".self::$lang,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $x = curl_exec($curl);
        curl_close($curl);
        self::$data = json_decode($x, FALSE);
        /** Bilgilerin çekilmesi son */

        return new self;
    }

    /**Hava durumunu return eder */
    public static function havadurum(){
        return self::$data -> weather[0] -> description;
    }

    /**Sıcaklığı return eder */
    public static function sicaklik(){
        return self::$data -> main -> temp;
    }

    /**Hissedilen sıcaklığı return eder */
    public static function hissedilen_sicaklik(){
        return self::$data -> main -> feels_like;
    }

    /**En düşük sıcaklığı return eder */
    public static function en_dusuk_sicaklik(){
        return self::$data -> main -> temp_min;
    }
    
    /**En yüksek sıcaklığı return eder */
    public static function en_yuksek_sicaklik(){
        return self::$data -> main -> temp_max;
    }
    
    /**Rüzgar hızını return eder */
    public static function ruzgar_hizi(){
        return self::$data -> wind -> speed;
    }

    /**Ülkeyi return eder */
    public static function ulke(){
        return self::$data -> sys -> country;
    }

    /**İli return eder */
    public static function il(){
        return self::$data -> name;
    }
    
    /**İkon kodunu return eder */
    public static function ikon(){
        return self::$data -> weather[0] -> icon;
    }

    /**Daha fazla bilgi için datayı return eder */
    public static function apiData(){
        return print_r(self::$data);
    }

}





?>