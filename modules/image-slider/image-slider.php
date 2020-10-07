<?php
namespace NbAdds\Modules;

class NBA_Image_Slider extends \FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Image Slider', 'nbaddons'),
            'description'   => __('Image Slider will make your life easier.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'image-slider/',
            'url'           => Nbaddons_Load::_get_url() . 'image-slider/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'slider.svg',
        ));

        $this->add_css('nbaddons-slider-nx');
        $this->add_js('nbaddons-slider-nx');
       
        $this->add_css('nxbb-imageslider', $this->url . 'css/image-slider.css', Nbaddons_Load::_version(), true);
        $this->add_js('nxbb-imageslider', $this->url . 'js/image-slider.js', array(), Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'image-slider/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'image-slider/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Image_Slider', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'data_photos' => [
                'title' => __('Photos', 'nbaddons'),
                'fields' => [
                    'photos_data' => array(
                        'type'          => 'multiple-photos',
                        'label'         => __( 'Choose Photos', 'nbaddons' )
                    ),
                    'photos_size' => array(
                        'type'          => 'photo-sizes',
                        'label'         => __('Photo Sizes', 'nbaddons'),
                        'default'       => 'medium'
                    ),

                    'content_position' => array(
                        'type'          => 'button-group',
                        'label'         => __('Content Position', 'nbaddons'),
                        'default'       => 'nx-top',
                        'options' => [
                            'nx-top' => __('Top', 'nbaddons'),
                            'nx-bottom' => __('Bottom', 'nbaddons'),
                        ]
                    ),

                    'show_title' => array(
                        'type'          => 'button-group',
                        'label'         => __('Show Title', 'nbaddons'),
                        'default'       => 'yes',
                        'options' => [
                            'yes' => __('Yes', 'nbaddons'),
                            'no' => __('No', 'nbaddons'),
                        ]
                    ),
                    'show_alt' => array(
                        'type'          => 'button-group',
                        'label'         => __('Show Alt', 'nbaddons'),
                        'default'       => 'yes',
                        'options' => [
                            'yes' => __('Yes', 'nbaddons'),
                            'no' => __('No', 'nbaddons'),
                        ]
                    ),
                ]
            ],
            'slider_settings' => [
                'title' => __('Slider Settings', 'nbaddons'),
                'fields' => [
                    'nxbb_slide_width' => array(
                        'type'          => 'text',
                        'label'         => __('Item Size (PX)', 'nbaddons'),
                        'default'       => ''
                    ),
                    'nxbb_slide_spacing' => array(
                        'type'          => 'text',
                        'label'         => __('Spacing (PX)', 'nbaddons'),
                        'default'       => '20'
                    ),
                    'nxbb_slide_item' => array(
                        'type'          => 'text',
                        'label'         => __('Slide Item', 'nbaddons'),
                        'default'       => '3'
                    ),
                    'nxbb_slide_speed' => array(
                        'type'          => 'text',
                        'label'         => __('Slide Speed (ms)', 'nbaddons'),
                        'default'       => '1500'
                    ),
                    'nxbb_slide_vertical' => array(
                        'type'          => 'button-group',
                        'label'         => __('Vertical Mode', 'nbaddons'),
                        'default'       => 'no',
                        'options' => [
                            'no' => __('Default', 'nbaddons'),
                            'vertical' => __('Vertical', 'nbaddons'),
                        ]
                    ),
                    'nxbb_slide_dot' => array(
                        'type'          => 'button-group',
                        'label'         => __('Display dot control', 'nbaddons'),
                        'default'       => 'yes',
                        'options' => [
                            'yes' => __('Yes', 'nbaddons'),
                            'no' => __('No', 'nbaddons'),
                        ]
                    ),
                    'nxbb_slide_arrow' => array(
                        'type'          => 'button-group',
                        'label'         => __('Display arrow control', 'nbaddons'),
                        'default'       => 'yes',
                        'options' => [
                            'yes' => __('Yes', 'nbaddons'),
                            'no' => __('No', 'nbaddons'),
                        ],
                        'toggle'  => array(
                            
                            'yes' => array(
                                'fields' => array( 'nxbb_slide_arrow_left', 'nxbb_slide_arrow_right'),
                            )

                        ),
                    ),
                    'nxbb_slide_arrow_left' => array(
                        'type'     => 'icon',
                        'label'    => __( 'Left Icon', 'nbaddons' ),
                        'default' => 'nx-icon nx-icon-chevron-left',
                        
                    ),
                    'nxbb_slide_arrow_right' => array(
                        'type'     => 'icon',
                        'label'    => __( 'Right Icon', 'nbaddons' ),
                        'default' => 'nx-icon nx-icon-chevron-right',
                        
                    ),


                ]
            ]
        )
    ),
    'style' => array(
        'title'         => __('NX Style', 'nbaddons'),
        'sections' => [
            'content_style' => [
                'title' => __('Content', 'nbaddons'),
                'fields' => [
                    'padding_content'             => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-image-slider-wrapper .nxadd-slider-item',
                            'property' => 'padding',
                        ),
                    ),
                    'margin_content'             => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Margin', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-image-slider-wrapper .nxadd-slider-item',
                            'property' => 'margin',
                        ),
                    ),
                ]
            ],
            'item_style' => [
                'title' => __('Items', 'nbaddons'),
                'fields' => [
                    'border_item'             => array(
                        'type'       => 'border',
                        'label'      => __( 'Border', 'nbaddons' ),
                        'responsive' => true,
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-image-slider-wrapper .nx-item-slider',
                        ),
                    ),
                    
                    'margin_item'             => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Margin', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'default' => '10',
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-image-slider-wrapper .nx-item-slider',
                            'property' => 'margin',
                        ),
                    ),
                ]
            ],
            'title_style' => [
                'title' => __('Title', 'nbaddons'),
                'fields' => [
                    'typography_title' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-image-slider-wrapper .nxadd-image-slider-item .nxadd-entry-caption .nxadd-title',
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
							'selector' => '{node} .nxbb-image-slider-wrapper .nxadd-image-slider-item .nxadd-entry-caption .nxadd-title',
							'property' => 'color',
						),
                    ),
                    
                ]
            ],
            'details_style' => [
                'title' => __('Details', 'nbaddons'),
                'fields' => [
                    'typography_details' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-image-slider-wrapper .nxadd-image-slider-item .nxadd-entry-caption .nxadd-subtitle',
						),
                    ),
                    'color_details'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-image-slider-wrapper .nxadd-image-slider-item .nxadd-entry-caption .nxadd-subtitle',
							'property' => 'color',
						),
                    ),
                    
                ]
            ],
        ]
    )
));

do_action('nbaddons/extra/method/render/tab');