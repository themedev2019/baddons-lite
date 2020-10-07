<?php
namespace NbAdds;
defined( 'ABSPATH' ) || exit;

final class Nbaddons_Plugin{

    private static $instance;

    private $template;

    public function __construct(){
        Nbaddons_Loader::_run(); 
    }
  
    public static function version(){
        return '1.0.1';
    }
 
    public static function php_version(){
        return '5.6';
    }

	public static function plugin_file(){
		return  NBADDONS_FILE_ ;
	}
 
	public static function plugin_url(){
		return trailingslashit(plugin_dir_url( self::plugin_file() ));
	}

	public static function plugin_dir(){
		return trailingslashit(plugin_dir_path( self::plugin_file() ));
    }
    
	public static function fileds_url(){
		return self::plugin_url() . 'fileds/';
	}

	public static function fileds_dir(){
		return self::plugin_dir() . 'fileds/';
	}

	public static function modules_url(){
		return self::plugin_url() . 'modules/';
	}

	public static function modules_dir(){
		return self::plugin_dir() . 'modules/';
	}
  
    public function init(){
		// Check if Beaver installed and activated.
		if ( ! class_exists( 'FLBuilder' ) ) {
			add_action( 'admin_notices', [Utilities\Nbaddons_Admin::instance(), '_missing_beaver'] );
			return;
        }     
		
        if ( version_compare( PHP_VERSION, self::php_version(), '<' ) ) {
			add_action( 'admin_notices', [Utilities\Nbaddons_Admin::instance(), '_check_php_version'] );
			return;
		}
        // check permission for manage user
        if(current_user_can('manage_options')){
            add_action( 'admin_menu', [Utilities\Nbaddons_Admin::instance(), '_admin_menu']);           
        }

        add_action( 'init', [Utilities\Nbaddons_Admin::instance(), 'init']);

       // call modules 
		Modules\Nbaddons_Load::instance()->_init();
		
		// load advance filter data render
        Apps\Features\Nbaddons_Load::instance()->_init();

        // load proactive
        Apps\Proactive\Nbaddons_Init::instance()->_init();

    }

    public static function instance(){
        if ( is_null( self::$instance ) ){
            self::$instance = new self();
            do_action( 'nbaddons/loaded' );
        }
        return self::$instance;
    }

}