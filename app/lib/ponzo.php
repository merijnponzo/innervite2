<?php

class Ponzo{

    protected static $themejson; 
    /*
     *  init variables within construct
     */

    public function __construct()
    {
       
    }
    public static function loadJson()
    {
        $string = file_get_contents(get_template_directory()."/theme/blocks.json");
        if ($string === false) {
            $json = [];
        }
        $json_decoded = json_decode($string, true);
        if ($json_decoded !== null) {
            $json = $json_decoded;
        }
        self::$themejson = $json;
    }
    public static function dump(){
        var_dump(self::$themejson);
    }
    public static function blockTheme($component, $theme){
        $themes =  self::$themejson;
        if(isset($themes['blocks'][$component][$theme])){
           return $themes['blocks'][$component][$theme]; 
        } else {
            return [];
        }
    }
    // create escaped html entities (two levels deep)
    public static function blockSafeHtml($unescapedAr,$needle){
        $ar = $unescapedAr;
        foreach( $ar as $key => $row ):
            if($key === $needle){
                $ar[$key] = htmlentities($row);
            }
            foreach( $row as $nested_key => $nested_row ):
                if ($nested_key === $needle) {
                    $ar[$key][$nested_key] = htmlentities($nested_row);
                }
            endforeach;
        endforeach;
        return $ar;
    }


    public static function init(){
        add_action( 'init',array( 'Ponzo', 'loadJson' ) );
    }
    
}