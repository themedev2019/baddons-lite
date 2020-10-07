<?php
namespace NbAdds\Modules;

class NBA_Business_Hours extends \FLBuilderModule {

   
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Business Hours', 'nbaddons'),
            'description'   => __('Business hours will make your life easier.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'business-hours/',
            'url'           => Nbaddons_Load::_get_url() . 'business-hours/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'business-hour.svg',
        ));

        $this->add_css('nxbb-business', $this->url . 'css/business.css', Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'business-hours/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'business-hours/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Business_Hours', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'heading' => [
                'title' => __('Heading', 'nbaddons'),
                'fields' => [
                    'heading_text' => [
                        'type' => 'text',
                        'label' =>  __('Title', 'nbaddons'),
                        'default' => 'Business Hours',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hour-title h3',
						),
                    ],
                   
                ]
            ],
            'items_hours' => [
                'title' => __('Items', 'nbaddons'),
                'fields' => [
                    'items_title' => [
                        'type' => 'text',
                        'label' =>  __('Title', 'nbaddons'),
                        'default' => [
                            'Saturday',
                            'Sunday',
                            'Friday'
                        ],
                        'multiple'      => true,
                        
                    ],
                    'items_time' => [
                        'type' => 'text',
                        'label' =>  __('Time', 'nbaddons'),
                        'default' => [
                            '10:00AM - 7:00PM',
                            '10:00AM - 7:00PM',
                            'close'
                        ],
                        'multiple'      => true,
                        
                    ],
                    'close_hours' => [
                        'type' => 'text',
                        'label' =>  __('Close Hours - enter title name', 'nbaddons'),
                        'default' => 'Saturday',
                        
                    ]
                ]
            ],
           

        )
    ),
    'style' => array(
        'title'         => __('NX Style', 'nbaddons'),
        'sections' => [
            'heading_style' => [
                'title' => __('Heading', 'nbaddons'),
                'fields' => [
                    'typography_heading_hour' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title h3',
						),
                    ),
                    'color_heading_hours'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title h3',
							'property' => 'color',
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
                       
                    ),
                    'business_bg_color' => array(
                        'type'        => 'color',
                        'label'       => __( 'Color', 'nbaddons' ),
                        'show_reset'  => true,
                        'show_alpha'  => true,
                        'default' => '#2575fc',
                        'preview' => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title',
                            'property' => 'background-color',
                        ),
                        'connections' => array( 'color' ),
                    ),
                    'business_bg_gradient' => array(
                        'type'    => 'gradient',
                        'label'   => __( 'Gradient', 'nbaddons' ),
                        'preview' => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title',
                            'property' => 'background-image',
                        ),
                    ),
                    'business_padding' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title',
                            'property' => 'padding',
                        ),
                    ),
                    'business_border' => array(
                        'type'       => 'border',
                        'label'      => __( 'Border', 'nbaddons' ),
                        'responsive' => true,
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title',
                        ),
                    ),
                    'business_shadow' => array(
                        'type'        => 'shadow',
                        'label'       => __( 'Box Shadow', 'nbaddons' ),
                        'show_spread' => true,
                        'preview'     => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title',
                            'property' => 'box-shadow', 
                        ),
                    ),
                    'business_spacing'             => array(
                        'type'       => 'unit',
                        'label'      => __( 'Spacing', 'nbaddons' ),
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
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title',
                            'property' => 'margin-bottom',
                            'important' => true,
                        ),
                    ),
                ]
            ],
            'items_hours_style' => [
                'title' => __('Items', 'nbaddons'),
                'fields' => [
                    'typography_item_hour' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner .nxadd-business-hour-single-item span',
						),
                    ),
                    'color_item_hours'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner .nxadd-business-hour-single-item span',
							'property' => 'color',
						),
                    ),
                    'business_bgitem_type' => array(
                        'type'    => 'select',
                        'label'   => __( 'Background', 'nbaddons' ),
                        'default' => 'none',
                        'options' => array(
                            'transparent'      => _x( 'None', 'Background type.', 'nbaddons' ),
                            'color'     => _x( 'Color', 'Background type.', 'nbaddons' ),
                            'gradient'  => _x( 'Gradient', 'Background type.', 'nbaddons' ),
                           
                        ),
                        'toggle'  => array(
                            'color'     => array(
                                'fields' => array( 'business_bgitem_color' ),
                            ),
                            'gradient'  => array(
                                'fields' => array( 'business_bgitem_gradient' ),
                            ),
                            
                        ),
                        'preview' => array(
                            'type' => 'none',
                        ),
                    ),
                    'business_bgitem_color' => array(
                        'type'        => 'color',
                        'label'       => __( 'Color', 'nbaddons' ),
                        'show_reset'  => true,
                        'show_alpha'  => true,
                        'preview' => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item',
                            'property' => 'background-color',
                        ),
                        'connections' => array( 'color' ),
                    ),
                    'business_bgitem_gradient' => array(
                        'type'    => 'gradient',
                        'label'   => __( 'Gradient', 'nbaddons' ),
                        'preview' => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item',
                            'property' => 'background-image',
                        ),
                    ),
                    'business_item_padding' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item',
                            'property' => 'padding',
                        ),
                    ),
                    'business_item_border' => array(
                        'type'       => 'border',
                        'label'      => __( 'Border', 'nbaddons' ),
                        'responsive' => true,
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item',
                        ),
                    ),
                    'business_item_shadow' => array(
                        'type'        => 'shadow',
                        'label'       => __( 'Box Shadow', 'nbaddons' ),
                        'show_spread' => true,
                        'preview'     => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item',
                            'property' => 'box-shadow', 
                        ),
                    ),
                    'business_item_spacing'             => array(
                        'type'       => 'unit',
                        'label'      => __( 'Spacing', 'nbaddons' ),
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
                            'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item',
                            'property' => 'margin-bottom',
                            'important' => true,
                        ),
                    ),
                ]
            ],
            'close_style' => [
                'title' => __('Close Hour', 'nbaddons'),
                'fields' => [
                    'typography_close_hour' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner .nxadd-business-hour-single-item.nx-business-close span',
						),
                    ),
                    'color_close_hours'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-business-hours-wrapper .nxadd-business-hours-inner .nxadd-business-hour-single-item.nx-business-close span',
							'property' => 'color',
						),
                    ),
                ]
            ]
            
        ]
    )
));

do_action('nbaddons/extra/method/render/tab');