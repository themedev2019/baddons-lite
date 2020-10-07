<?php
namespace NbAdds\Modules;

class NBA_Image_Box extends \FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Image Box', 'nbaddons'),
            'description'   => __('Image Box will make your life easier.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'image-box/',
            'url'           => Nbaddons_Load::_get_url() . 'image-box/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'image-box.svg',
        ));

       
        $this->add_css('nxbb-image', $this->url . 'css/image.css', Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'image-box/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'image-box/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Image_Box', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'layout_data' => array(
                'title' => __(' Data', 'nbaddons'),
                'fields' => [
                    'align_body' => array(
						'type'       => 'align',
						'label'      => __( 'Align', 'nbaddons' ),
						'default'    => 'center',
						'responsive' => true,
						'preview'    => array(
							'type'      => 'css',
							'selector'  => '{node} .nxbb-image-box .nxadd-image-box',
							'property'  => 'text-align',
							'important' => true,
						),
                    ),
                    'photo_source_data' => array(
						'type'    => 'select',
						'label'   => __( 'Image', 'nbaddons' ),
						'default' => 'library',
						'options' => array(
							'no' => __( 'No image', 'nbaddons' ),
							'library' => __( 'Media Library', 'nbaddons' ),
							'url'     => __( 'URL', 'nbaddons' ),
						),
						'toggle'  => array(
							'library' => array(
                                'fields' => array( 'photo'),
							),
							'url'     => array(
                                'fields' => array( 'photo_url_data'),
							),
						),
						
                    ),
                    'photo'        => array(
						'type'        => 'photo',
						'label'       => __( 'Library', 'nbaddons' ),
						'connections' => array( 'photo' ),
						'show_remove' => true,
						
					),
					'photo_url_data'    => array(
						'type'        => 'text',
						'label'       => __( 'Image URL', 'nbaddons' ),
						'placeholder' => 'http://www.example.com/my-photo.jpg',
						
                    ),
                    
                    'title_text_data'      => array(
						'type'    => 'text',
                        'label'   => __( 'Enter Title', 'nbaddons' ),
                        'default' => 'American Blues',
						'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxadd-card-area .nxadd-card-title',
						),
                    ),
                    
                    'details_text_data'      => array(
                        'type'    => 'textarea',
                        'label'   => __( 'Enter details', 'nbaddons' ),
                        'default' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradise',
                        'rows'        => 13,
						'wpautop'     => false,
						'connections' => array( 'string' ),
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxadd-card-area .card-des',
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
            'title_data_style' => array(
                'title' => __('Title', 'nbaddons'),
                'fields' => [
                    'typography_title_data' => array(
						'type'       => 'typography',
						'label'      => __( 'Title Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-image-box .nxadd-image-box .nxadd-box-body .nxadd-image-box-title',
						),
                    ),
                    'color_title_data'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-image-box .nxadd-image-box .nxadd-box-body .nxadd-image-box-title',
							'property' => 'color',
						),
                    ),

                    'spacing_title_data'             => array(
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
                            'selector' => '{node} .nxbb-image-box .nxadd-image-box .nxadd-box-body .nxadd-image-box-title',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ),

            'details_data_style' => array(
                'title' => __('Details', 'nbaddons'),
                'fields' => [
                    'typography_details_data' => array(
						'type'       => 'typography',
						'label'      => __( 'Details Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-image-box .nxadd-des',
						),
                    ),
                    'color_Details_data'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-image-box .nxadd-des',
							'property' => 'color',
						),
                    ),

                    'spacing_details_data'             => array(
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
                            'selector' => '{node} .nxbb-image-box .nxadd-des',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ),

            'button_style' => array(
                'title' => __('Button', 'nbaddons'),
                'fields' => [
                    'typography_button' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-image-box .nxadd-image-box .nxadd-box-body .nx-link-icon',
						),
                    ),
                    'color_button'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-image-box .nxadd-image-box .nxadd-box-body .nx-link-icon',
							'property' => 'color',
						),
                    ),

                    'bgcolor_button'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-image-box .nxadd-image-box .nxadd-box-body .nx-link-icon',
							'property' => 'background-color',
						),
                    ),
                    'border_button'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-image-box .nxadd-image-box .nxadd-box-body .nx-link-icon',
						),
                    ),

                    'padding_button' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            'em',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-image-box .nxadd-image-box .nxadd-box-body .nx-link-icon',
                            'property' => 'padding',
                        ),
                        
                    ),
                ]
            ),
        ]
    )
));

do_action('nbaddons/extra/method/render/tab');