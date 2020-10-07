<?php
namespace NbAdds\Modules;

class NBA_Button extends \FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Button', 'nbaddons'),
            'description'   => __('Beautiful button design makes the website beautiful', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'button/',
            'url'           => Nbaddons_Load::_get_url() . 'button/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'button.svg',
        ));

       
        $this->add_css('nxbb-button', $this->url . 'css/button.css', Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'button/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'button/icon/' . $icon;
		}

		if ( file_exists( $path ) ) {
			return file_get_contents( $path );
		} else {
			return '';
		}
	}
     
    public function update($settings)
    { 
        return $settings;
    }

       
    public function delete()
    {
    
    }

    
    public function next_extra_method( $id, $settings, $module )
    {
        do_action('nbaddons/extra/method/render/css', $id, $settings, $module);
    }
}

/**
 * Register the module and its form settings.
 */

\FLBuilder::register_module('\NbAdds\Modules\NBA_Button', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'title' => [
                'title' => __('Button', 'nbaddons'),
                'fields' => [
                    'tile_text' => [
                        'type' => 'text',
                        'label' =>  __('Title', 'nbaddons'),
                        'default' => 'Buy Now',
                        
                    ],
                    'link_url'  => array(
						'type'          => 'link',
						'label'         => __( 'Link URL', 'nbaddons' ),
						'show_target'   => true,
						'show_nofollow' => true,
						'preview'       => array(
							'type' => 'none',
						),
						'connections'   => array( 'url' ),
					),
                   
                ]
            ],
            'icon' => array(
                'title' => __('Icon', 'nbaddons'),
                'fields' => [
                    'card_icon' => array(
                        'type'    => 'select',
                        'label'   => __( 'Choose type', 'nbaddons' ),
                        'default' => 'library',
                        'options' => array(
                            'no'     => __( 'No select', 'nbaddons' ),
                            'library'     => __( 'Library', 'nbaddons' ),
                            'class' => __( 'Paste class', 'nbaddons' ),
                        ),
                        'toggle'  => array(
                            
                            'library' => array(
                                'fields' => array( 'select_icons'),
                            ),

                            'class' => array(
                                'fields' => array( 'button_class'),
                            ),

                        ),
                        'preview' => array(
                            'type' => 'none',
                        ),
                    ),
                    
                    'select_icons' => array(
                        'type'     => 'icon',
                        'label'    => __( 'Select Icon', 'nbaddons' ),
                        'default' => 'nx-icon nx-icon-cart-plus',
                        
                    ),

                    'button_class' => array(
                        'type'    => 'text',
                        'label'   => __( 'Class name', 'nbaddons' ),
                        'default' => 'nx-icon nx-icon-cart-plus',
                        
                    ),

                ]

            ),

        )
    ),
    'style' => array(
        'title'         => __('NX Style', 'nbaddons'),
        'sections' => [
            'button_styles' => [
                'title' => __('Button', 'nbaddons'),
                'fields' => [
                    'padding_body' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-button-area .nxbb-single-btn a',
                            'property' => 'padding',
                        ),
                       
                    ),
                    'button_border'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-button-area .nxbb-single-btn a',
						),
                    ),
                    'business_bg_type' => array(
                        'type'    => 'select',
                        'label'   => __( 'Background', 'nbaddons' ),
                        'default' => 'color',
                        'options' => array(
                            'transparent'      => _x( 'None', 'Background type.', 'nbaddons' ),
                            'color'     => _x( 'Color', 'Background type.', 'nbaddons' ),
                            'gradient'  => _x( 'Gradient', 'Background type.', 'nbaddons' ),
                           
                        ),
                        'toggle'  => array(
                            'color'     => array(
                                'fields' => array( 'business_bg_color' ),
                            ),
                            'gradient'  => array(
                                'fields' => array( 'business_bg_gradient' ),
                            ),
                            
                        ),
                        'preview' => array(
                            'type' => 'none',
                        ),
                    ),
                    'business_bg_color' => array(
                        'type'        => 'color',
                        'label'       => __( 'Color', 'nbaddons' ),
                        'show_reset'  => true,
                        'show_alpha'  => true,
                        'default' => '#2575fc',
                        'preview' => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-button-area .nxbb-single-btn a',
                            'property' => 'background-color',
                        ),
                        'connections' => array( 'color' ),
                    ),
                    'business_bg_gradient' => array(
                        'type'    => 'gradient',
                        'label'   => __( 'Gradient', 'nbaddons' ),
                        'preview' => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-button-area .nxbb-single-btn a',
                            'property' => 'background-image',
                        ),
                    ),
                ]
            ],
            'content_style' => array(
                'title' => __('Content', 'nbaddons'),
                'fields' => [
                    'typography_title' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-button-area .nxbb-single-btn  a',
						),
                    ),
                    'color_title'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-button-area .nxbb-single-btn  a',
							'property' => 'color',
						),
                    ),
                    'spacing_icon'             => array(
						'type'       => 'dimension',
                        'label'      => __( 'Icon Spacing', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-button-area .nxbb-single-btn  a .nxadd-icon',
                            'property' => 'margin',
                        ),
                    ),
                    
                ]

            ),

        ]
    )
));

do_action('nbaddons/extra/method/render/tab');