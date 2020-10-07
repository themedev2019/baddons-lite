<?php
namespace NbAdds\Modules;

class NBA_Info_Box extends \FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Info Box', 'nbaddons'),
            'description'   => __('Info Box will make your life easier.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'info-box/',
            'url'           => Nbaddons_Load::_get_url() . 'info-box/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'info-box.svg',
        ));

       
        $this->add_css('nxbb-info', $this->url . 'css/info.css', Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'info-box/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'info-box/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Info_Box', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'layout' => array(
                'title' => __('Layout', 'nbaddons'),
                'fields' => [
                    'layout_type' => array(
                        'type'    => 'select',
						'label'   => __( 'Select layout', 'nbaddons' ),
						'default' => 'nx-info-top',
						'options' => array(
							'nx-info-top' => __( 'Top', 'nbaddons' ),
							'nx-info-bottom' => __( 'Bottom', 'nbaddons' ),
							'nx-info-left'     => __( 'Left', 'nbaddons' ),
							'nx-info-right'     => __( 'Right', 'nbaddons' ),
                        ),
                       
                    ),
                ]
            ),

            'layout_data_info' => array(
                'title' => __(' Data', 'nbaddons'),
                'fields' => [
                    'align_body' => array(
						'type'       => 'align',
						'label'      => __( 'Align', 'nbaddons' ),
						'default'    => 'center',
						'responsive' => true,
						'preview'    => array(
							'type'      => 'css',
							'selector'  => '{node} .nxbb-info-box-wrapper .nxadd-info-box',
							'property'  => 'text-align',
							'important' => true,
						),
                    ),
                    'icon_type' => array(
						'type'    => 'select',
						'label'   => __( 'Icon type', 'nbaddons' ),
						'default' => 'library',
						'options' => array(
							'no' => __( 'No icon', 'nbaddons' ),
							'icon' => __( 'Icon', 'nbaddons' ),
							'custom' => __( 'Custom', 'nbaddons' ),
						),
						'toggle'  => array(
							'icon' => array(
                                'fields' => array( 'info_icons'),
                            ),
                            'custom' => array(
                                'fields' => array( 'info_icons_custom'),
							),
							
						),
						
                    ),
                   
                    'info_icons' => array(
                        'type'     => 'icon',
                        'label'    => __( 'Select Icon', 'nbaddons' ),
                        'default' => 'nx-icon nx-icon-cart-plus',
                       
                    ),

                    'info_icons_custom'      => array(
						'type'    => 'text',
                        'label'   => __( 'Custom icon', 'nbaddons' ),
                        'default' => 'icon nx-icon-cart-plus',
						
                    ),
                    
                    'title_text_info'      => array(
						'type'    => 'text',
                        'label'   => __( 'Enter Title', 'nbaddons' ),
                        'default' => 'American Blues',
						'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-title',
						),
                    ),
                    
                    'details_text_info'      => array(
                        'type'    => 'textarea',
                        'label'   => __( 'Enter details', 'nbaddons' ),
                        'default' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradise',
                        'rows'        => 13,
						'wpautop'     => false,
						'connections' => array( 'string' ),
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-des',
						),
                    ),
                    
                   
                    'button_type' => array(
                        'type'    => 'select',
                        'label'   => __( 'Button', 'nbaddons' ),
                        'default' => 'library',
                        'options' => array(
                            'no'     => __( 'No select', 'nbaddons' ),
                            'icon'     => __( 'Icon', 'nbaddons' ),
                            'text' => __( 'Text', 'nbaddons' ),
                            'text-icon' => __( 'Text with Icon', 'nbaddons' ),
                        ),
                        'toggle'  => array(
                            
                            'library' => array(
                                'icon' => array( 'select_icons'),
                            ),

                            'text' => array(
                                'fields' => array( 'button_text' ),
                            ),

                            'text-icon' => array(
                                'fields' => array( 'select_icons', 'button_text' ),
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

                    'button_text' => [
                        'type' => 'text',
                        'label' => __( 'Text', 'nbaddons' ),
                        'default' => 'Buy Now',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxadd-card-area .nxadd-btn span',
						),
                    ],

                    'link_url_data'  => array(
						'type'          => 'link',
						'label'         => __( 'Link URL', 'nbaddons' ),
						'show_target'   => true,
						'show_nofollow' => true,
						
						'connections'   => array( 'url' ),
					),

                ]
            )

        )
    ),
    'style' => array(
        'title'         => __('NX Style', 'nbaddons'),
        'sections' => [
            'info_icon_style' => array(
                'title' => __('Icon', 'nbaddons'),
                'fields' => [
                    'typography_icon_info' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon',
						),
                    ),
                    'color_icon_info'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon',
							'property' => 'color',
						),
                    ),
                    'bgcolor_icon_info'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon',
							'property' => 'background-color',
						),
                    ),
                    'border_icon_info'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon',
						),
                    ),

                    'padding_icon_info' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            'em',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon',
                            'property' => 'padding',
                        ),
                        
                    ),
                    'spacing_icon_info'             => array(
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
                            'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                    
                    
                ]

            ),
            
            
            'title_info_style' => array(
                'title' => __('Title', 'nbaddons'),
                'fields' => [
                    'typography_title_info' => array(
						'type'       => 'typography',
						'label'      => __( 'Title Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-title',
						),
                    ),
                    'color_title_info'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-title',
							'property' => 'color',
						),
                    ),

                    'spacing_title_info'             => array(
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
                            'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-title',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ),

            'details_info_style' => array(
                'title' => __('Details', 'nbaddons'),
                'fields' => [
                    'typography_details_info' => array(
						'type'       => 'typography',
						'label'      => __( 'Details Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-des',
						),
                    ),
                    'color_details_info'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-des',
							'property' => 'color',
						),
                    ),

                    'spacing_details_info'             => array(
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
                            'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nxadd-des',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ),

            'button_info_style' => array(
                'title' => __('Button', 'nbaddons'),
                'fields' => [
                    'typography_button_info' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nx-info-body .nx-link-icon',
						),
                    ),
                    'color_button_info'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nx-info-body .nx-link-icon',
							'property' => 'color',
						),
                    ),

                    'bgcolor_button_info'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nx-info-body .nx-link-icon',
							'property' => 'background-color',
						),
                    ),
                    'border_button_info'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nx-info-body .nx-link-icon',
						),
                    ),

                    'padding_button_info' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            'em',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-info-box-wrapper .nxadd-info-box .nx-info-body .nx-link-icon',
                            'property' => 'padding',
                        ),
                        
                    ),
                ]
            ),

        ]
    )
));

do_action('nbaddons/extra/method/render/tab');