<?php 
namespace NbAdds\Modules;

defined( 'ABSPATH' ) || exit;
/**
 * Global Nbaddons_Load class.
 *
 * @since 1.0.0
 */
class Nbaddons_Load{
    private static $instance;

    public static function _get_url(){
        return \NbAdds\Nbaddons_Plugin::modules_url();
    }
    public static function _get_dir(){
        return \NbAdds\Nbaddons_Plugin::modules_dir();
    }

    public static function _version(){
        return \NbAdds\Nbaddons_Plugin::version();
    }

    public static function get_modules_dir( $dir ){
        if($dir == 'nbaddons-pro'){
            $file = \NextBeaverPro\Nbaddons_Plugin::modules_dir();
        }else{
            $file = \NbAdds\Nbaddons_Plugin::modules_dir();
        }
        return $file;
    }

    public static function get_fileds_dir( $dir ){
        if($dir == 'nbaddons-pro'){
            $file = \NextBeaverPro\Nbaddons_Plugin::fileds_dir();
        }else{
            $file = \NbAdds\Nbaddons_Plugin::fileds_dir();
        }
        return $file;
    }

    public static function get_class( $k, $dir ){
        if($dir == 'nbaddons-pro'){
            $class = '\NextBeaverPro\Modules\NBA_'. Nbaddons_Help::_make_classname($k);
        }else{
            $class = '\NbAdds\Modules\NBA_'. Nbaddons_Help::_make_classname($k);
        }
        return $class;
    }
    public function _init() {         
        
        add_action( 'init', [ $this, '_register_widgets' ] );
        add_filter( 'fl_builder_custom_fields', [ $this,  'register_fields' ]);

        if(current_user_can('manage_options')){
           // Nbaddons_Icons::__generate_font();
            Nbaddons_Icons::instance()->__init();
        }

    }

    public function register_fields( $fields ) {
        if(empty( $this->_fileds() ) || !is_array( $this->_fileds() )){
            return $fields;
        }
        foreach( $this->_fileds() as $k=>$v):
            
            $files = self::get_fileds_dir($type).$k.'.php';          
            if( file_exists($files) ){
                $fields[$k] = $files;
			}
        endforeach;
        return $fields;
	}

    public function _register_widgets( ) {
        if(empty( $this->_modules() ) || !is_array( $this->_modules() )){
            return;
        }
        $getServices = get_option('__next_beaver_active', '');
        $status = true;
        $active = [];
        
        if(is_array($getServices) && isset($getServices['addons']) ){
            $active = array_keys($getServices['addons']);
            $status = false;
        }

        foreach( $this->_modules() as $k=>$v):
            $type = isset($v['type']) ? $v['type'] : '';
            
            if(!in_array($k, $active ) && !$status){
                continue;
            }
            $files = self::get_modules_dir($type).$k.'/'.$k.'.php';  
            if( file_exists($files) ){
                require_once $files; 
			}
		endforeach;
    }
    
    public function _modules(){
		$modules = [
            'heading' => [ 'type' => 'nbaddons', 'name' => 'Heading', 'link' => 'heading'],
            'card' => [ 'type' => 'nbaddons', 'name' => 'Card', 'cate' => 'new', 'link' => 'card'],
            'business-hours' => [ 'type' => 'nbaddons', 'name' => 'Business Hours', 'link' => 'business-hour'],
            'icon-cap' => [ 'type' => 'nbaddons', 'name' => 'Icon Cap', 'link' => 'icon-cap'],
            'fun-fact' => [ 'type' => 'nbaddons', 'name' => 'Fun Fact', 'link' => 'fun-fact'],
            'button' => [ 'type' => 'nbaddons', 'name' => 'Button', 'link' => 'button'],
            'blog' => [ 'type' => 'nbaddons', 'name' => 'Blog', 'link' => 'blog'],
            'team' => [ 'type' => 'nbaddons', 'name' => 'Team', 'link' => 'team'],
            'review' => [ 'type' => 'nbaddons', 'name' => 'Review', 'link' => 'review'],
            'image-box' => [ 'type' => 'nbaddons', 'cate' => 'new', 'name' => 'Image Box', 'link' => 'image-box'],
            'progress-bar' => [ 'type' => 'nbaddons', 'cate' => 'new', 'name' => 'Progress Bar', 'link' => 'progress-bar'],
            'pricing' => [ 'type' => 'nbaddons', 'cate' => 'new', 'name' => 'Pricing', 'link' => 'pricing'],
            'info-box' => [ 'type' => 'nbaddons', 'cate' => 'new', 'name' => 'Info Box', 'link' => 'info-box'],
            'gallery' => [ 'type' => 'nbaddons', 'cate' => '', 'name' => 'Gallery', 'link' => 'gallery'],
            'image-slider' => [ 'type' => 'nbaddons', 'cate' => '', 'name' => 'Image Slider', 'link' => 'image-slider'],
            
        ];
        return apply_filters( 'nbaddons_modules_add', $modules);
    }
    

    public function _fileds(){
		$fileds = [
            'nx-input' => [ 'type' => 'nbaddons', 'name' => 'NX Input', 'cate' => 'new', 'link' => 'input'],
           
        ];
        return apply_filters( 'nbaddons_fileds_add', $fileds);
    }
    
    public function cate(){
        $cate = [
            'nx-basic' => 'DeskAddons',
        ];

        return apply_filters( 'nbaddons_cate_add', $cate);
    }

    public static function instance(){
		if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
	}
}