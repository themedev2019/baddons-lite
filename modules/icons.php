<?php 
namespace NbAdds\Modules;
defined( 'ABSPATH' ) || exit;
/**
 * Global Nbaddons_Icons class.
 *
 * @since 1.0.0
 */
class Nbaddons_Icons{
    private static $instance;

    public function __init() {        
        add_filter( 'fl_builder_core_icon_sets', [$this, 'set_icon']);
        add_filter( 'fl_builder_icon_sets', [$this, 'set_icon_config']);
    }

    public function set_icon( $icons ){
        $icons['nxbb-icons'] = [
            'name'   => 'DeskAddons Icons',
			'prefix' => 'nx-icon',
        ];
        return $icons;
    }

    public function set_icon_config( $icons){
        
        $icons['nxbb-icons'] = [
            'name'   => 'DeskAddons Icons',
            'prefix' => 'nx-icon',
            'icons' => self::get_icons( 'nx-icons-nx.js', false)
        ];

        return $icons;
    }

    public static function __generate_font(){
		global $wp_filesystem;
		require_once ( ABSPATH . '/wp-admin/includes/file.php' );
		WP_Filesystem();
		$css_file =  \NbAdds\Nbaddons_Plugin::plugin_dir() . 'assets/css/icon/nx-icon.css';
		if ( $wp_filesystem->exists( $css_file ) ) {
			$css_source = $wp_filesystem->get_contents( $css_file );
		} 
		
		preg_match_all( "/\.(nx-icon-.*?):\w*?\s*?{/", $css_source, $matches, PREG_SET_ORDER, 0 );
		$iconList = [];
		foreach ( $matches as $match ) {
            $icon = str_replace('nx-icon-', '', $match[1]);
            $icons = explode(' ', $icon);
            //$iconList[] = 'nx-icon-'.current($icons);
            $icon_val = current($icons);
            $iconList['nx-icon nx-icon-'.$icon_val] = ucfirst( str_replace( [' ', '-', '_'], ' ', $icon_val) );
		}
		$icons = new \stdClass();
		$icons->icons = $iconList;
        $icon_data = json_encode($icons);
        
        //$icon_data = json_encode($iconList);
        
		$file = \NbAdds\Nbaddons_Plugin::plugin_dir() . 'assets/script/js/nx-icons.js';
		global $wp_filesystem;
		require_once ( ABSPATH . '/wp-admin/includes/file.php' );
		WP_Filesystem();
		if ( $wp_filesystem->exists( $file ) ) {
			$content =  $wp_filesystem->put_contents( $file, $icon_data) ;
		} 
		
    }
    
    public static function get_icons( $files = 'nx-icons.js', $type = true){
        global $wp_filesystem;
        require_once ( ABSPATH . '/wp-admin/includes/file.php' );
        WP_Filesystem();
        
        $icons = [];
        
        $file = \NbAdds\Nbaddons_Plugin::plugin_dir() . 'assets/script/js/'.$files;

        if ( $wp_filesystem->exists( $file ) ) {
            $css_source = $wp_filesystem->get_contents( $file );
            $decode = json_decode($css_source, true);
            if($type){
                $value = isset($decode['icons']) ? $decode['icons'] : '';
                if( is_array($value) && !empty($value) ){
                    $icons = $value;
                }else{
                    $icons = $decode;
                }
            }else{
                $icons = $decode;
            }
           
        } 
        
        return apply_filters( 'nbaddons_icons/library_add', $icons);
    }
    public static function instance(){
		if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
	}
}