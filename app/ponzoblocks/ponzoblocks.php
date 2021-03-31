<?php
// load blocks class
require "blocks.php";
require "register.php";

class Ponzoblocks
{


    protected static $themejson; 
    private static $version;
    private static $themedir;
    private static $themeurl;

    /*
     *  init variables within construct
     */

    public function __construct()
    {
        self::$themedir = get_template_directory();
        self::$themeurl = get_template_directory_uri();
        self::$version = '0.0.4';
    }

    /*
     *
     *  Add ponzoblocks to admin
     *
     *  @type    action (init)
     *  @date    8/05/19
     *  @since    0.0.1
     *
     *  @param    N/A
     *  @return    N/A
     */
    public static function PonzoblocksAssets()
    {
        wp_enqueue_script(
            'ponzoblocks-script',
            self::$themeurl . '/ponzoblocks/dist/ponzoblocks.bundle.js',
            array(),
            self::$version
        );
        wp_enqueue_style(
            'ponzoblocks-style',
            self::$themeurl . '/ponzoblocks/dist/ponzoblocks.css',
            array(),
            self::$version
        );
    }
   
     /*
     *
     *  Load a json file with blockthemes
     *  @param    N/A
     *  @return    N/A
     */
    public static function loadJson()
    {
        $string = file_get_contents(self::$themedir."/ponzoblocks/blocks.json");
        if ($string === false) {
            $json = [];
        }
        $json_decoded = json_decode($string, true);
        if ($json_decoded !== null) {
            $json = $json_decoded;
        }
        self::$themejson = $json;
    }

    /*
    *
    *  For debugging only
    *  @param    N/A
    *  @return    N/A
    */
    public static function dump(){
        var_dump(self::$themejson);
    }

    /*
    *
    *  Get current block theme
    *  @param    N/A
    *  @return    N/A
    */
    public static function blockTheme($component, $theme){
        $themes =  self::$themejson;
        if(isset($themes['blocks'][$component][$theme])){
           return $themes['blocks'][$component][$theme]; 
        } else {
            return [];
        }
    }
    // 
    /*
    *
    *  Parse data to htmlentities with JSON_HEX_QUOT filters
    *  this wont produce EOT errors within Vue
    *  @param    N/A
    *  @return    N/A
    */
    public static function blockData($block,$key){
        if(isset($block['data'][$key])){
            return htmlentities(json_encode($block['data'][$key], JSON_HEX_QUOT), ENT_QUOTES);
        }else{
            return 'no block data found';
        }
    }

    // 
    /*
    *
    *  Mount preview components
    *  @param    N/A
    *  @return    N/A
    */
    public static function isPreview($block){
        if($block['is_preview']){
            echo  '<script>window.PonzoGutenberg("'.$block['id'].'")</script>';
        }
    }

     // 
    /*
    *
    *  Load the blockthemes and Ponzoblocks assets
    *  @param    N/A
    *  @return    N/A
    */
    public static function init(){
        add_action( 'init',array( 'Ponzoblocks', 'loadJson' ) );
        
        // load ponzoblocks assets
        if (is_admin()) {
            add_action('enqueue_block_assets', array('Ponzoblocks', 'PonzoblocksAssets'));
        }
    }
}

