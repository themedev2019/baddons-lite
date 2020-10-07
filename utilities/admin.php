<?php
namespace NbAdds\Utilities;

defined( 'ABSPATH' ) || exit;

use \NbAdds\Modules\Nbaddons_Load as Nbaddons_Load;

class Nbaddons_Admin{
	
    private static $instance;

    public function init() {        
        if(current_user_can('manage_options')){
            add_filter( 'plugin_action_links_' . plugin_basename( \NbAdds\Nbaddons_Plugin::plugin_file() ), [ $this , '_action_links'] );
            add_filter( 'plugin_row_meta', [ $this, '_plugin_row_meta'], 10, 2 );
            add_action( 'admin_enqueue_scripts', [ $this , '_admin_global_scripts'] );
            // admin script
            add_action( 'admin_enqueue_scripts', [ $this , '_admin_scripts'] );
           
            //admin bar render
            add_action( 'wp_before_admin_bar_render',   [ $this , '_before_admin_bar_render' ], 1000000 );

            // notices load
            Nbaddons_Notice::instance()->_init();

        }

        add_action( 'wp_enqueue_scripts', [ $this , '_admin_global_scripts'] );   
        // public script
        add_action( 'wp_enqueue_scripts', [ $this , '_public_scripts'] );

    }
    public static function _version(){
        return \NbAdds\Nbaddons_Plugin::version();
    }
    public static function _plugin_url(){
        return \NbAdds\Nbaddons_Plugin::plugin_url();
    }
    public static function _plugin_dir(){
        return \NbAdds\Nbaddons_Plugin::plugin_dir();
    }

    public function _admin_global_scripts(){
       // next icon
        wp_register_style( 'nbaddons-icon-nx', self::_plugin_url() . 'assets/css/icon/nx-icon.css', false, self::_version() );
        
        // settings style
        wp_register_style( 'nbaddons-settings-css', self::_plugin_url() . 'assets/css/nx-setting.css', false, self::_version() );
        // modal style
        wp_register_style( 'nbaddons-modal-css', self::_plugin_url() . 'assets/css/modal-css/modal-popup.css', false, self::_version() );
        // settings js
        wp_register_script( 'nbaddons-settings-js', self::_plugin_url() . 'assets/script/nx-setting.js', [ 'jquery'], self::_version(), true );
        // modal js
        wp_register_script( 'nbaddons-modal-js', self::_plugin_url() . 'assets/script/modal-js/modal-popup.js', ['jquery'], self::_version(), true );
        

        // next laibray css
        wp_register_style( 'nbaddons-popup-css', self::_plugin_url() . 'assets/css/nx-library/nx-popup.css', false, self::_version() );
        
        // next laibary js
        wp_register_script( 'nbaddons-popup-js', self::_plugin_url() . 'assets/script/nx-library/nx-popup.js', ['jquery'], self::_version(), true );
        
        // public js
        wp_register_script( 'nbaddons-public', self::_plugin_url() . 'assets/script/public.js', ['jquery'], self::_version(), true );
        //public css
        wp_register_style( 'nbaddons-public', self::_plugin_url() . 'assets/css/public.css', false, self::_version() );
        
        
        // next popup
        wp_register_style( 'nbaddons-popup-nx', self::_plugin_url() . 'assets/css/nx-library/nx-popup.css', false, self::_version() );
        wp_register_script( 'nbaddons-popup-nx', self::_plugin_url() . 'assets/script/nx-library/nx-popup.js', [ ], self::_version(), true );
        
        // next mixin gallery
        wp_register_style( 'nbaddons-mixin-nx', self::_plugin_url() . 'assets/css/nx-library/nx-mix-gallery.css', false, self::_version() );
        wp_register_script( 'nbaddons-mixin-nx', self::_plugin_url() . 'assets/script/nx-library/nx-mixin-gallery.js', [ ], self::_version(), true );
        
        // next slider
        wp_register_style( 'nbaddons-slider-nx', self::_plugin_url() . 'assets/css/nx-library/nx-slider.css', false, self::_version() );
        wp_register_script( 'nbaddons-slider-nx', self::_plugin_url() . 'assets/script/nx-library/nx-slider.js', [ ], self::_version(), true );
        
        // next focus
        wp_register_style( 'nbaddons-focus-nx', self::_plugin_url() . 'assets/css/nx-library/nx-focus.css', false, self::_version() );
        wp_register_script( 'nbaddons-focus-nx', self::_plugin_url() . 'assets/script/nx-library/nx-focus.js', [ ], self::_version(), true );
        
        // next animation
        wp_register_style( 'nbaddons-animation-nx', self::_plugin_url() . 'assets/css/nx-animation.css', false, self::_version() );
        wp_register_script( 'nbaddons-animation-nx', self::_plugin_url() . 'assets/script/nx-library/nx-animation.js', [ ], self::_version(), true );
        
         // next grid
         wp_register_style( 'nbaddons-grid-nx', self::_plugin_url() . 'assets/css/nx-grid.css', false, self::_version() );
         
         // nx play js
         wp_register_script( 'nbaddons-play-nx', self::_plugin_url() . 'assets/script/nx-library/nx-video-play.js', [ ], self::_version(), true );
        
    }

    public function _admin_scripts(){
        $screen = get_current_screen();
        wp_enqueue_style( 'nbaddons-icon-nx' );
        wp_enqueue_style( 'nbaddons-animation-nx' );

        if( in_array($screen->id, [ 'toplevel_page_nbaddons', 'plugins']) ){
            wp_enqueue_style('nbaddons-settings-css');
            wp_enqueue_script('nbaddons-settings-js');
        }
        if( in_array($screen->id, [ 'edit-nbaddons', 'nbaddons']) ){
            wp_enqueue_style('nbaddons-modal-css');
            wp_enqueue_script('nbaddons-modal-js');
        }

        wp_register_style( 'baddons_ads', self::_plugin_url() . 'assets/css/ads.css', false, self::_version() );
        wp_enqueue_style('baddons_ads');
        
    }


    public function _public_scripts(){

        wp_enqueue_style( 'nbaddons-icon-nx' );
        wp_enqueue_style( 'nbaddons-animation-nx' );
        wp_enqueue_style( 'nbaddons-grid-nx' );

        wp_enqueue_script('nbaddons-public');
        wp_enqueue_style( 'nbaddons-public' );
       
    }

    public function _scripts_elementor(){
       
    }
 
    public function _admin_menu(){
        add_menu_page(
            esc_html__('DeskAddons', 'nbaddons'),
            esc_html__('DeskAddons', 'nbaddons'),
            'read',
            'nbaddons',
            [$this, 'next_beaver'],
            'dashicons-feedback',
           100
        );
        add_submenu_page( 'nbaddons', esc_html__( 'Features', 'nbaddons' ), esc_html__( 'Features', 'nbaddons' ), 'manage_options', 'nbaddons', [ $this ,'next_beaver'], 1);
        
        if ( ! did_action( 'desksaddonsPro/loaded' ) ) {
            //add_submenu_page( 'nbaddons', esc_html__( 'Get Pro', 'nbaddons' ), esc_html__( 'Get Pro', 'nbaddons' ), 'manage_options', 'admin.php?page=nbaddons&tab=get-pro', '', 100);
        }
    }
  
    public function next_beaver(){
        
        $widgets = [];
        $widgets_pro = [];
        $message_status = 'No';
        $message_text = '';
        $active_tab = isset($_GET['tab']) ? Nbaddons_Help::sanitize($_GET['tab']) : 'modules';
        if($active_tab == 'modules'):
            if(isset($_POST['nextbb-feed-submit'])){
                $addons = isset($_POST['baddons']) ? Nbaddons_Help::sanitize($_POST['baddons']) : [];
                if(update_option('__next_beaver_active', $addons)){
                    $message_status = 'yes';
                    $message_text = __('Saved data.', 'nbaddons');
                }
            }
      
            $widgets =  Nbaddons_Load::instance()->_modules();
            $getServices = get_option('__next_beaver_active', []);
        endif;

        if($active_tab == 'get-pro'){
            $widgets = [
                'flip-box' => [ 'type' => 'nbaddons', 'cate' => 'pro', 'name' => 'Flip Box', 'link' => 'flip-box'],
                'dual-button' => [ 'type' => 'nbaddons', 'cate' => 'pro', 'name' => 'Dual Button', 'link' => 'dual-button'],
                'advance-heading' => [ 'type' => 'nbaddons', 'name' => 'Advance Heading', 'cate' => 'pro', 'link' => 'advance-heading'],
                'instagram' => [ 'type' => 'nbaddons', 'name' => 'Instagram', 'cate' => 'pro', 'link' => 'instagram'],
                'promo-box' => [ 'type' => 'nbaddons', 'name' => 'Promo Box', 'cate' => 'pro', 'link' => 'promo-box'],
                'video-gallery' => [ 'type' => 'nbaddons', 'name' => 'Video Gallery', 'cate' => 'pro', 'link' => 'video-gallery'],
                'price-list' => [ 'type' => 'nbaddons', 'name' => 'Price List', 'cate' => 'pro', 'link' => 'price-list'],
                'blog-slider' => [ 'type' => 'nbaddons', 'name' => 'Blog Slider', 'cate' => 'pro', 'link' => 'blog-slider'],
                'hover-image' => [ 'type' => 'nbaddons', 'name' => 'Hover Image', 'cate' => 'pro', 'link' => 'hover-image'],
                'timer' => [ 'type' => 'nbaddons', 'name' => 'Timer', 'cate' => 'pro', 'link' => 'timer'],
                'image-comparison' => [ 'type' => 'nbaddons', 'name' => 'Image Comparison', 'cate' => 'pro', 'link' => 'image-comparison'],
                'pie-chart' => [ 'type' => 'nbaddons', 'name' => 'Pie Chart', 'cate' => 'pro', 'link' => 'pie-chart'],
                'step-flow' => [ 'type' => 'nbaddons', 'name' => 'Step Flow', 'cate' => 'pro', 'link' => 'step-flow'],
                'shop' => [ 'type' => 'nbaddons', 'name' => 'Shop', 'cate' => 'pro', 'link' => 'shop'],
                'shop-slider' => [ 'type' => 'nbaddons', 'name' => 'Shop Slider', 'cate' => 'pro', 'link' => 'shop-slider'],
                
            ];
            
        }
        // include files
        include ( self::_plugin_dir().'apps/views/settings/admin/settings.php');
    }
    
    public function get_pro(){
        _e( 'get Pro' );
    }
  
    public function _action_links($links){
        $links[] = '<a class="next-highlight-b" href="' . admin_url( 'admin.php?page=nbaddons' ).'"> '. __('Settings', 'nbaddons').'</a>';
		$links[] = '<a class="next-highlight-a" href="" target="_blank"> '. __('Buy Now', 'nbaddons').'</a>';
	    return $links;
    }


    public function _plugin_row_meta(   $links, $file  ){
        if ( strpos( $file, basename( \NbAdds\Nbaddons_Plugin::plugin_file() ) ) ) {
            $new_links = array(
                'demo' => '<a class="next-highlight-b" href="http://products.ddesks.com/deskaddons/" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>'. __('Live Demo', 'nbaddons').'</a>',
                'doc' => '<a class="next-highlight-b" href="" target="_blank"><span class="dashicons dashicons-media-document"></span>'. __('User Guideline', 'nbaddons').'</a>',
                'support' => '<a class="next-highlight-b" href="" target="_blank"><span class="dashicons dashicons-editor-help"></span>'. __('Support', 'nbaddons').'</a>',
                'pro' => '<a class="next-highlight-a" href="" target="_blank" class="next-pro-plugin"><span class="dashicons dashicons-cart"></span>'. __('Get Pro', 'nbaddons').'</a>'
            );
            $links = array_merge( $links, $new_links );
        }
        return $links;
    }

	public function _before_admin_bar_render(){
		global $wp_admin_bar;
		$wp_admin_bar->add_menu( array(
			'id'     => 'nxbb-builder',
			'parent' => 'top-secondary',
			'title'  => __( 'DeskAddons', 'nbaddons' ) ,
			'meta'   => array( 'class' => 'nxbb-builder' ),
			'href'   =>  esc_attr( admin_url( 'admin.php?page=nbaddons' ) )
		) );
		
	}
	
	public function _missing_beaver(){
        if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		if ( file_exists( WP_PLUGIN_DIR . '/beaver-builder-lite-version/fl-builder.php' ) ) {
			$btn['label'] = esc_html__('Activate WP Beaver', 'nbaddons');
			$btn['url'] = wp_nonce_url( 'plugins.php?action=activate&plugin=beaver-builder-lite-version/fl-builder.php&plugin_status=all&paged=1', 'activate-plugin_beaver-builder-lite-version/fl-builder.php' );
		} else {
			$btn['label'] = esc_html__('Install WP Beaver', 'nbaddons');
			$btn['url'] = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=beaver-builder-lite-version' ), 'install-plugin_beaver-builder-lite-version' );
		}

		Nbaddons_Notice::push(
			[
				'id'          => 'nxbeaver-version',
				'type'        => 'info',
				'dismissible' => true,
				'btn'		  => $btn,
				'message'     => __( '<b>DeskAddons</b> work with WP Beaver Plugin, which is currently not install or active this plugin', 'nbaddons' ),
			]
		);
	}
  
    public function _check_version(){
        $btn['label'] = esc_html__('Update Beaver Builder', 'nbaddons');
        $btn['url'] = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=beaver-builder-lite-version' ), 'upgrade-plugin_beaver-builder-lite-version' );
        
        Nbaddons_Notice::push(
			[
				'id'          => 'nxbeaver-version',
				'type'        => 'error',
				'dismissible' => true,
				'btn'		  => $btn,
				'message'     => sprintf( esc_html__( 'DeskAddons requires Beaver Builder version %1$s+, which is currently NOT RUNNING.', 'nbaddons' ), '2.3.2.5' ),
			]
		);
    }
   
    public function _check_php_version(){
        Nbaddons_Notice::push(
			[
				'id'          => 'unsupported-php-version',
				'type'        => 'error',
				'dismissible' => true,
				'message'     => sprintf( __( '<b>DeskAddons</b> requires PHP version %1$s+, which is currently NOT RUNNING on this server.', 'nbaddons' ), '5.6'),
			]
		);
    }
	public static function instance(){
		if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
	}

}