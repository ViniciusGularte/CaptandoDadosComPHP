<?php
class Log{

    //Captando ip do usuario(Não é 100 % preciso)
    public static function ipCliente()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        } else {

            $ip = $_SERVER['REMOTE_ADDR'];

        }

        return $ip;

    }
    //Captando pagina anterior a atual do usuario
    public static function paginaAnterior()
    {

       $pagina_anterior =  $_SERVER['HTTP_REFERER'];

       return $pagina_anterior;

    }
    //Captando pagina atual do usuario
    public static function paginaAtual()
    {
        $pagina_atual =  $_SERVER["REQUEST_URI"];
        return $pagina_atual;
    }
    //Captando sistema Operacional do usuario 
    public static function sistemaOperacional()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $os_array = array(
            'windows nt 10'      =>  'Windows 10',
            'windows nt 6\.3'     =>  'Windows 8.1',
            'windows nt 6\.2'     =>  'Windows 8',
            'windows nt 6\.1'     =>  'Windows 7',
            'windows nt 6\.0'     =>  'Windows Vista',
            'windows nt 5\.2'     =>  'Windows Server 2003/XP x64',
            'windows nt 5\.1'     =>  'Windows XP',
            'windows xp'         =>  'Windows XP',
            'windows nt 5\.0'     =>  'Windows 2000',
            'windows me'         =>  'Windows ME',
            'win98'              =>  'Windows 98',
            'win95'              =>  'Windows 95',
            'win16'              =>  'Windows 3.11',
            'macintosh|mac os x' =>  'Mac OS X',
            'mac_powerpc'        =>  'Mac OS 9',
            'linux'              =>  'Linux',
            'ubuntu'             =>  'Ubuntu',
            'iphone'             =>  'iPhone',
            'ipod'               =>  'iPod',
            'ipad'               =>  'iPad',
            'android'            =>  'Android',
            'blackberry'         =>  'BlackBerry',
            'webos'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {
            if (preg_match('/' . $regex . '/i', $user_agent)) {
                return $value;
            }
        }

        return 'Unknown OS Platform';
    }
    //Captando navegador do usuario
    public static function navegadorUsuario()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser_array = array(
            'msie'       =>  'Internet Explorer',
            'firefox'    =>  'Firefox',
            'safari'     =>  'Safari',
            'chrome'     =>  'Chrome',
            'edge'       =>  'Edge',
            'opera'      =>  'Opera',
            'netscape'   =>  'Netscape',
            'maxthon'    =>  'Maxthon',
            'konqueror'  =>  'Konqueror',
            'mobile'     =>  'Handheld Browser'
        );

        foreach ($browser_array as $regex => $value) {
            if (preg_match('/' . $regex . '/i', $user_agent)) {
                return $value;
            }
        }

        return 'Unknown Browser';
    }
}
