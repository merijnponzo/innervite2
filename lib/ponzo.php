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
    public static function init(){
        add_action( 'init',array( 'Ponzo', 'loadJson' ) );
    }
    
}