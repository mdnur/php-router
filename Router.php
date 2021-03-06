<?php 
namespace OurApplication\Routing;
class Router{
    private static $nomatch =true;
    private static function getUrl(){
        return $_SERVER['REQUEST_URI'];
    }
    private static function process($pattern,$callback){
        $pattern = rtrim($pattern,'/');
        $pattern = "~^{$pattern}/?$~";
        $params = self::getMatches($pattern);
        if($params){
            self::$nomatch =false;
            $functionArguments =array_slice($params,1);
            if (is_callable($callback)) {
           
                // if (is_array($callback)) {
                //    $className = $callback[0];
                //    $functionName = $callback[1];
                //     $instance = $className::getInstance();
                //     $instance->$functionName($functionArguments);
                // }else{
                    var_dump($functionArguments);
                    print_r( $callback(...$functionArguments));
                    $callback(...$functionArguments);
                // }
                
            }
        }
    }
    Public static function getMatches($pattern){
        $url = self::getUrl();
        if (preg_match($pattern,$url,$matches)) {
           return $matches;
        }
        return false;
    }
    public static function get($pattern,$callback){
        if ($_SERVER['REQUEST_METHOD'] != 'GET') {
            return;
        }
        self::process($pattern,$callback);
    }
    public static function post($pattern,$callback){
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return;
        }
        self::process($pattern,$callback);
    }

    public static function delete($pattern,$callback){
        if ($_SERVER['REQUEST_METHOD'] != 'DELETE') {
            return;
        }
        self::process($pattern,$callback);
    }

    public static function put($pattern,$callback){
        if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
            return;
        }
        self::process($pattern,$callback);
    }
    

    public static function cleanup(){
        if(self::$nomatch){
            echo("No routes matches");
        }
    }
    
}
