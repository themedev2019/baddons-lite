<?php
namespace NbAdds\Modules;

class NBA_Icon_Cap extends \FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Icon Cap', 'nbaddons'),
            'description'   => __('Beautiful icon cap for designing web pages.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'icon-cap/',
            'url'           => Nbaddons_Load::_get_url() . 'icon-cap/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'icon-cap.svg',
        ));

       
        $this->add_css('nxbb-iconcap', $this->url . 'css/icon-cap.css', Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'icon-cap/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'icon-cap/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Icon_Cap', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'layout' => array(
                'title' => __('Layout', 'nbaddons'),
                'fields' => [
                    'layout_type' => array(
                        'type'    => 'select',
						'label'   => __( 'Select layout', 'nbaddons' ),
						'default' => 'nx-top-layout',
						'options' => array(
							'nx-top-layout' => __( 'Top', 'nbaddons' ),
							'nx-bottom-layout' => __( 'Bottom', 'nbaddons' ),
							'nx-left-layout'     => __( 'Left', 'nbaddons' ),
							'nx-right-layout'     => __( 'Right', 'nbaddons' ),
                        ),
                       
                    ),
                ] 
            ),
            'badge' => array(
                'title' => __('Badge', 'nbaddons'),
                'fields' => array(
                    'badge_title' => [
                        'type' => 'text',
                        'label'   => __( 'Enter badge name', 'nbaddons' ),
                        'default' => 'Pro',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-badge',
						),
                    ]
                )
            ),
            'title' => array(
                'title' => __('Title', 'nbaddons'),
                'fields' => array(
                    'icon_title' => [
                        'type' => 'text',
                        'label'   => __( 'Enter title name', 'nbaddons' ),
                        'default' => 'Easy to Use',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-wrapper .nxadd-icon-caps-title-wrap .nxadd-icon-caps-title',
						),
                    ],
                    'link_url'  => array(
						'type'          => 'link',
						'label'         => __( 'Link URL', 'nbaddons' ),
						'show_target'   => true,
						'show_nofollow' => true,
						
						'connections'   => array( 'url' ),
					),
                )
            ),
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
            'layout_style' => array(
                'title' => __('Layout', 'nbaddons'),
                'fields' => [
                    'align_body' => array(
						'type'       => 'align',
						'label'      => __( 'Align', 'nbaddons' ),
						'default'    => 'center',
						'responsive' => true,
						'preview'    => array(
							'type'      => 'css',
							'selector'  => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-wrapper',
							'property'  => 'text-align',
							'important' => true,
						),
                    ),
                    'bgcolor_body'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-wrapper',
							'property' => 'background-color',
						),
                    ),
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
                            'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-wrapper',
                            'property' => 'padding',
                        ),
                       
                    )

                ]

            ),
            'badge_style' => array(
                'title' => __('Badge', 'nbaddons'),
                'fields' => [
                    'typography_badge' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-badge',
						),
                    ),
                    'color_badge'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-badge',
							'property' => 'color',
						),
                    ),
                    
                    'border_badge'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-badge',
						),
                    ),
                    
                    'padding_badge' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            'em',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-badge',
                            'property' => 'padding',
                        ),
                        
                    ),
                    'position_top_badge'             => array(
						'type'       => 'unit',
						'label'      => __( 'Top', 'nbaddons' ),
                        'responsive' => true,
                        'slider'     => true,
                        'units'      => array(
							'px',
							'vw',
							'%',
						),
						'slider'     => array(
							'px' => array(
								'min'  => 0,
								'max'  => 1000,
								'step' => 10,
							),
						),
						'preview'    => array(
							'type'     => 'css',
                            'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-badge',
                            'property' => 'top',
                            'important' => true,
						),
                    ),
                    'position_left_badge'             => array(
						'type'       => 'unit',
						'label'      => __( 'Left', 'nbaddons' ),
                        'responsive' => true,
                        'slider'     => true,
                        'units'      => array(
							'px',
							'vw',
							'%',
						),
						'slider'     => array(
							'px' => array(
								'min'  => 0,
								'max'  => 1000,
								'step' => 10,
							),
						),
						'preview'    => array(
							'type'     => 'css',
                            'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-badge',
                            'property' => 'left',
                            'important' => true,
						),
                    ),
                    'bgcolor_badge'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-badge',
							'property' => 'background-color',
						),
                    ),
                ]

            ),
            'title_style' => array(
                'title' => __('Title', 'nbaddons'),
                'fields' => [
                    'typography_title' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-wrapper .nxadd-icon-caps-title-wrap .nxadd-icon-caps-title',
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
							'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-wrapper .nxadd-icon-caps-title-wrap .nxadd-icon-caps-title',
							'property' => 'color',
						),
                    ),
                    
                ]

            ),
            'icon_style' => array(
                'title' => __('Icon', 'nbaddons'),
                'fields' => [
                    'typography_icon' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-wrapper .nxadd-icon .nxbb-icon',
						),
                    ),
                    'color_icon'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-wrapper .nxadd-icon .nxbb-icon',
							'property' => 'color',
						),
                    ),
                    'spacing_icon'             => array(
						'type'       => 'dimension',
                        'label'      => __( 'Spacing', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-icon-caps-area .nxadd-icon-caps-wrapper .nxadd-icon',
                            'property' => 'margin',
                        ),
                    ),
                    
                ]

            )
        ]
    )
));

do_action('nbaddons/extra/method/render/tab');